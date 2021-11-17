# laravel open api

## 使用说明

安装

```
composer require iayoo/laravel-openapi:dev-master
```

配置 `config/app.php`, 在 `providers` 中新增一项
```php
'providers' => [
    ...
    \Iayoo\OpenApi\OpenApiProvider::class,
];
``` 

发布配置文件

```shell script
php artisan vendor:publish --provider="Iayoo\OpenApi\OpenApiProvider"
```

执行之后会在`config` 文件夹下生成 `open_api.php` 的配置文件，配置说明如下

```shell script
return [
    /*
    * --------------------------------------------------------------------------
    * Open-Api Configuration
    * --------------------------------------------------------------------------
    */
    // 应用数据模型
    'db_model' => '',
    // 多应用/但应用
    'app_mode' => 'multi',
    // 是否校验时间戳
    'verify_timestamp' => true,
    // 时间戳有效时长(单位:微秒)
    'timestamp_expire' => 120*1000,
];
```

配置应用模型model

新增的model要继承 `Iayoo\OpenApi\Laravel\model\App`





