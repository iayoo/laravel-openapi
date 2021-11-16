<?php


namespace Iayoo\OpenApi\Auth;


class Sign
{
    protected $params;

    protected $config;

    public function __construct(Params $params,Config $config)
    {
        $this->params = $params;
        $this->config = $config;
    }


    public function getSign(){
        $params = $this->params->getParams();
        ksort($params);
        $query_string = http_build_query($params);
        $string =  md5($query_string) . $this->config->getAppKey() . ":" . $this->config->getAppSecret();
        return md5($string);
    }

}