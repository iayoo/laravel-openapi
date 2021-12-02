<?php


namespace Iayoo\OpenApi\Auth;

use Iayoo\OpenApi\Exception\ParamsException;

class Config
{

    public function __construct()
    {
        $this->init();
    }

    /**
     * @var string app type
     * single: single app
     * multi: multi app , set 'multi' type , the config will init info from model or db
     */
    protected $app_mode = 'multi';

    protected $cache = false;

    protected $app_key;

    protected $app_id;

    protected $app_secret;

    protected $access_token;

    protected $app_token;

    protected $verify_timestamp = false;

    protected $timestamp_expire = 120*1000;


    public function init(){
        $this->initEnv();
    }

    public function initEnv(){}

    /**
     * @return bool
     */
    public function isVerifyTimestamp()
    {
        return $this->verify_timestamp;
    }

    /**
     * @param bool $verify_timestamp
     */
    public function setVerifyTimestamp($verify_timestamp)
    {
        $this->verify_timestamp = $verify_timestamp;
    }

    /**
     * @return float|int
     */
    public function getTimestampExpire()
    {
        return $this->timestamp_expire;
    }

    /**
     * @param float|int $timestamp_expire
     */
    public function setTimestampExpire($timestamp_expire)
    {
        $this->timestamp_expire = $timestamp_expire;
    }

    

    public function setFromAppId(){
        return $this->cache("open_api_{$this->app_id}");
    }

    /**
     * @return mixed
     */
    public function getAppKey()
    {
        return $this->app_key;
    }

    /**
     * @param mixed $app_key
     */
    public function setAppKey($app_key)
    {
        $this->app_key = $app_key;
    }

    /**
     * @return mixed
     */
    public function getAppId()
    {
        return $this->app_id;
    }

    /**
     * @param mixed $app_id
     */
    public function setAppId($app_id)
    {
        if(empty($app_id)){
            throw new ParamsException("应用ID不能为空");
        }
        $this->app_id = $app_id;
    }

    /**
     * @return mixed
     */
    public function getAppSecret()
    {
        return $this->app_secret;
    }

    /**
     * @param mixed $app_secret
     */
    public function setAppSecret($app_secret)
    {
        $this->app_secret = $app_secret;
    }

    /**
     * @return mixed
     */
    public function getAccessToken()
    {
        return $this->access_token;
    }

    /**
     * @param mixed $access_token
     */
    public function setAccessToken($access_token)
    {
        $this->access_token = $access_token;
    }

    /**
     * @return mixed
     */
    public function getAppToken()
    {
        return $this->app_token;
    }

    /**
     * @param mixed $app_token
     */
    public function setAppToken($app_token)
    {
        $this->app_token = $app_token;
    }
    
    
    public function get($key,$cache = false){
        if (!$cache){
            return $this->config($key);
        }
        if ($this->cache || $cache){
            return $this->cache($key);
        }
    }

    public function config($key){}

    public function cache($key){}

    public function initAppInfo(){}
}