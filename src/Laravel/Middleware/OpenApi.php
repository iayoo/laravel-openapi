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
        $apiAuth->check();
        return $next($request);
    }
}