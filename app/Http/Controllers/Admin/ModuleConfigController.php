<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ModuleConfigFetch;
use App\Http\Requests\Admin\ModuleConfigSave;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;


class ModuleConfigController extends Controller
{
    public function fetch(ModuleConfigFetch $request)
    {
        $reqModule = $request->input('module');
        $reqKey = $request->input('key');
        $source = Collect(Config::get('admin'));
        $moduleData = $source->get($reqModule);
        $data = null;

        if ($moduleData !== null) {
            $moduleData = collect($moduleData);
            if ($reqKey) {
                $data = $moduleData->get($reqKey);
            } else {
                $data = $moduleData;
            }
        }

        return response([
            'data' => $data
        ]);
    }


    /**
     * save
     *
     * @param ModuleConfigSave $request
     * @return ResponseFactory|Response
     */
    public function save(ModuleConfigSave $request)
    {

        $requestModule = $request->get('module');
        $requestKey = $request->get('key');
        $requestValue = $request->get('value');
        $source = collect(Config::get('admin'));

        $moduleData = $source->get($requestModule) ?? [];
        $source->offsetSet($requestModule, array_merge($moduleData, [$requestKey => $requestValue]));

        $serializeSource = var_export($source->toArray(), 1);
        if (!File::put(base_path() . '/config/admin.php', "<?php\n return $serializeSource ;")) {
            abort(500, '修改失败');
        }
        if (function_exists('opcache_reset')) {
            if (opcache_reset() === false) {
                abort(500, '缓存清除失败，请卸载或检查opcache配置状态');
            }
        }
        Artisan::call('config:cache');
        return response([
            'data' => true
        ]);
    }

}