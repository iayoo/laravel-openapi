<?php
namespace Iayoo\OpenApi\Laravel;

use Iayoo\OpenApi\Exception\AuthException;
use Iayoo\OpenApi\Exception\ParamsException;
use Iayoo\OpenApi\Laravel\model\App;
use Illuminate\Support\Facades\Cache;

class Config extends \Iayoo\OpenApi\Auth\Config
{
    
    
    
    public function config($key)
    {
        return config("open_api.{$key}");
    }

    public function cache($key)
    {
        return Cache::get($key);
    }

    public function initAppInfo(){
        $info = $this->cache("open_api_{$this->app_id}");
        if ($info){
            $this->setAppKey($info['app_key']);
            $this->setAppSecret($info['app_secret']);
            return true;
        }

        if ($this->app_mode == 'multi'){
            // 多app模式
            if(!class_exists($this->config('db_model'))){
                throw new ParamsException("model do not exists");
            }
            /** @var App $model */
            $model = app()->make($this->config('db_model'));
            $data = $model->getAppInfo($this->app_id);
            if (empty($data)){
                throw new AuthException();
            }
            Cache::add("open_api_{$this->app_id}",[
                'app_key'    => $data->app_key,
                'app_secret' => $data->app_secret,
            ]);
            $this->setAppKey($data->app_key);
            $this->setAppSecret($data->app_secret);
        }

    }

    public function initEnv()
    {
        $this->app_mode         = $this->config('app_mode');
        $this->verify_timestamp = $this->config('verify_timestamp');
        $this->timestamp_expire = $this->config('timestamp_expire');
    }
}