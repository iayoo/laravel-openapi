<?php
namespace Iayoo\OpenApi\Laravel\Middleware;

use Iayoo\OpenApi\Auth\AppKeySecret;
use Iayoo\OpenApi\Laravel\Config;
use Illuminate\Http\Request;

class OpenApi
{
    public function handle(Request $request, \Closure $next){
        $apiAuth = new AppKeySecret();
        $config = new Config();
        $config->setAppId($request->input('app_id'));
        $config->initAppInfo();
        $apiAuth->setConfig($config);
        $apiAuth->setHeader($request->header());
        $apiAuth->setParams($request->input());
        $apiAuth->setSign($request->header('sign'));
        $apiAuth->checkSign();
        return $next($request);
    }

    /**
     * Helper to get the config values.
     *
     * @param  string  $key
     * @param  string  $default
     *
     * @return mixed
     */
    protected function config($key, $default = null)
    {
        return config("open_api.$key", $default);
    }

    protected function initConfig(){
        if ($this->config('env_driver') == 'model'){

        }
    }
}