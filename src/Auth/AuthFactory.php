<?php


namespace Iayoo\OpenApi\Auth;


use Iayoo\OpenApi\Exception\ParamsException;

abstract class AuthFactory implements ApiAuthInteface
{

    protected $params;

    protected $verifyTimestamp = false;

    protected $time_limit = 120*1000;

    /** @var Config */
    protected $config;

    public function __construct()
    {
        $this->init();
    }

    public function timestamp(){
        if (!isset($this->params['timestamp'])){
            throw new ParamsException("Timestamp Error");
        }
        if (((microtime(TRUE)*1000) - (int)$this->params['timestamp']) > $this->time_limit){
            throw new ParamsException("Timestamp Limit Error");
        }
    }

    /**
     * @param mixed $config
     */
    public function setConfig(Config $config)
    {
        $this->config = $config;
    }

    /**
     * @return mixed
     */
    public function getAppKey()
    {
        if (empty($this->app_key)){
            throw new ParamsException("app key Error");
        }
        return $this->app_key;
    }

    /**
     * @param mixed $app_key
     */
    public function setAppKey($app_key)
    {
        if (empty($app_key)){
            throw new ParamsException("app key Error");
        }
        $this->app_key = $app_key;
    }

    /**
     * @return mixed
     */
    public function getAppId()
    {
        if (empty($this->app_id)){
            throw new ParamsException("App Id Error");
        }
        return $this->app_id;
    }

    /**
     * @param mixed $app_id
     */
    public function setAppId($app_id)
    {
        if (empty($app_id)){
            throw new ParamsException("app id Error");
        }
        $this->app_id = $app_id;
    }

    /**
     * @return mixed
     */
    public function getAppSecret()
    {
        if (empty($this->app_secret)){
            throw new ParamsException("app secret Error");
        }
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
        if (empty($this->app_token)){
            throw new ParamsException("app token Error");
        }
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
    
}