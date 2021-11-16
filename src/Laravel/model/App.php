<?php
namespace Iayoo\OpenApi\Laravel\model;

use Illuminate\Database\Eloquent\Model;

class App extends Model
{
    public function getAppInfo($app_id){
        return $this->where('app_id',$app_id)->first();
    }
    
//    public function getApp
}