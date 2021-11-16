<?php


namespace Iayoo\OpenApi\Auth;


class Params
{
    protected $params;

    /**
     * @param mixed $params
     */
    public function setParams($params)
    {
        $this->params = $params;
    }

    /**
     * @return mixed
     */
    public function getParams()
    {
        return $this->params;
    }
    
}