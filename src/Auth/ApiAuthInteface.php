<?php


namespace Iayoo\OpenApi\Auth;


interface ApiAuthInteface
{
    public function sign();

    public function init();
}