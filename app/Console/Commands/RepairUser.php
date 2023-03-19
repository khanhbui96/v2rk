<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Symfony\Component\Console\Output\ConsoleOutput;

class RepairUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'repair:user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '修复用户数据';

    /**
     * @var ConsoleOutput
     */
    private $_out;

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
     * @return int
     */
    public function handle()
    {
        $this->_repairOrderDay();
        return 0;
    }


    /**
     * repair order day
     */
    private function _repairOrderDay()
    {
        //根据用户有效期置换订单日
        $pageSize = 100;
        $userModel = User::where(User::FIELD_EXPIRED_AT, '>', time())
            ->where(User::FIELD_ORDER_DAY, null)->orderBy(USER::FIELD_ID, 'ASC');
        $count = $userModel->count();
        $page = 1;
        $pageTotal = intval(ceil($count / $pageSize));
        $this->_out->writeln("total user: " . $count);
        while ($page <= $pageTotal) {
            $users = $userModel->forPage($page, $pageSize)->get();
            foreach ($users as $user) {
                $email = $user->getAttribute(User::FIELD_EMAIL);
                $expiredAt = $user->getAttribute(User::FIELD_EXPIRED_AT);
                $orderDay = date('d', $expiredAt);
                $user->setAttribute(User::FIELD_ORDER_DAY, $orderDay);
                $this->_out->writeln("email: " . $email . ", order day: " . $orderDay);
                $user->save();
            }
            $page++;
        }
    }


    /**
     * repair user ip
     */
    private function _repairUserIp()
    {
        //根据用户有效期置换订单日
        $pageSize = 100;
        $userModel = User::where(User::FIELD_ID, '>', 0);
        $count = $userModel->count();
        $page = 1;
        $pageTotal = intval(ceil($count / $pageSize));
        $this->_out->writeln("total user: " . $count);
        while ($page <= $pageTotal) {
            $users = $userModel->forPage($page, $pageSize)->get();
            foreach ($users as $user) {
                $registerIp = $user->getAttribute(User::FIELD_REGISTER_IP);
                $lastLoginIp = $user->getAttribute(User::FIELD_LAST_LOGIN_IP);
                if ($registerIp && is_numeric($registerIp)) {
                    $user->setAttribute(User::FIELD_REGISTER_IP, long2ip($registerIp));
                }

                if ($lastLoginIp && is_numeric($lastLoginIp)) {
                    $user->setAttribute(User::FIELD_LAST_LOGIN_IP, long2ip($lastLoginIp));
                }

                $user->save();
            }
            $page++;
        }
        $this->_out->writeln("ok.");
    }
}