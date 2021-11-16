<?php
namespace Iayoo\OpenApi\Exception;

class ParamsException extends \Exception
{
    protected $message = 'Params error';

    protected $code = 40000;
}