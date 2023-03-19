<?php

namespace App\Console\Commands;

use App\Models\BaseServer;
use App\Models\ServerShadowsocks;
use App\Models\ServerTrojan;
use App\Models\ServerVmess;
use App\Services\NoticeService;
use App\Utils\Helper;
use Exception;
use Illuminate\Console\Command;
use Symfony\Component\Console\Output\ConsoleOutput;

class CheckServerGFW extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:server_gfw';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '检测服务器端口是否被墙';

    /**
     * @var ConsoleOutput
     */
    private $_out;

    protected $retryNum = 5;
    protected $sleep = 30;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->_out = new ConsoleOutput();
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $this->checkWalled();
    }

    /**
     * Detecting if the server port is walled
     *
     * @return void
     */
    protected function checkWalled()
    {
        $trojanNodes = ServerTrojan::where(ServerTrojan::FIELD_CHECK, true)->get();
        $vmessNodes = ServerVmess::where(ServerTrojan::FIELD_CHECK, true)->get();
        $shadowsocksNodes = ServerShadowsocks::where(ServerTrojan::FIELD_CHECK, true)->get();

        $allNodes = collect($trojanNodes)->merge($vmessNodes)->merge($shadowsocksNodes);
        $this->_out->writeln("nodes total: " . count($allNodes));
        $walledNodesList = [];

        /**
         * @var BaseServer $node
         */
        foreach ($allNodes as $node) {
            $host = $node['host'];
            $id = $node->getKey();
            $port = (int)$node->getAttribute(BaseServer::FIELD_PORT);
            $ips = (array)$node->getAttribute(BaseServer::FIELD_IPS);
            $type = $node->getType();
            $hosts = $ips ?: [$host];
            $num = 0;
            $walled = true;

            foreach ($hosts as $host) {
                $this->_out->writeln("test host: " . sprintf("%s:%d", $host, $port));
                while ($num < $this->retryNum) {
                    try {
                        $result = Helper::testPing($host, $port);
                        if ($result === true) {
                            $walled = false;
                            break;
                        }
                        $this->_out->writeln("retrying...");
                    } catch (Exception $e) {
                        $this->_out->writeln("interface error: " . $e->getMessage());
                    }
                    $num++;
                    sleep($this->sleep);
                }

                if ($walled) {
                    array_push($walledNodesList, ["host" => $host, "port" => $port, "type" => $type, "id" => $id]);
                }
            }
        }

        $walledNodesTotal = count($walledNodesList);
        $this->_out->writeln("result: ");
        $this->_out->writeln($walledNodesTotal . " nodes walled");
        $telegramBotEnable = (bool)config('v2board.telegram_bot_enable', 0);
        $walledMessages = [];

        foreach ($walledNodesList as $walledNode) {
            $id = (int)$walledNode["id"];
            $host = $walledNode["host"];
            $port = (int)$walledNode["port"];
            $type = $walledNode['type'];
            $walledMessage = sprintf("id:%d type:%s host:%s port:%d", $id, $type, $host, $port);
            array_push($walledMessages, $walledMessage);
            $this->_out->writeln($walledMessage);
        }

        if ($walledNodesTotal > 0 && $telegramBotEnable) {
            NoticeService::nodeGFWNotifyToAdmin($walledNodesTotal, $walledMessages);
        }
    }
}