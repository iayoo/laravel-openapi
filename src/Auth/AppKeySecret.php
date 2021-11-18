<?php
namespace Iayoo\OpenApi\Auth;


use Iayoo\OpenApi\Exception\AuthException;
use Iayoo\OpenApi\Exception\ParamsException;
use Illuminate\Auth\AuthenticationException;

class AppKeySecret extends AuthFactory
{
    protected $sign;

    protected $header;

    protected $params;

    public function sign()
    {
        $params = $this->params;
        if ($this->config->isVerifyTimestamp()){
            $this->timestamp();
        }
        ksort($params);
        $query_string = urldecode(http_build_query($params));
        $string =  md5($query_string) . $this->config->getAppKey() . ":" . $this->config->getAppSecret();
        return md5($string);
    }

    public function init()
    {
        // TODO: Implement init() method.
        $this->setAppKey('test');
        $this->setAppSecret('test');
    }

    /**
     * @param mixed $params
     */
    public function setParams($params)
    {
        $this->params = $params;
    }

    /**
     * @param mixed $header
     */
    public function setHeader($header)
    {
        $this->header = $header;
    }

    /**
     * @param mixed $sign
     */
    public function setSign($sign)
    {
        $this->sign = $sign;
    }

    public function check(){
        if ($this->sign() !== $this->sign){
            $message = "";
            if ($this->config->config('debug')){
                $message = '正确签名为:' . $this->sign();
            }
            throw new AuthException("签名错误" . ($message?":{$message}":''));
        }
    }
}