# laravel open api

## 使用说明

### Laravel 安装

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

配置中间件

在`app\Kernel.php`文件中

```php
protected $middlewareGroups = [
        'api' => [
            // 在对应的目录下新增中间件
            \Iayoo\OpenApi\Laravel\Middleware\OpenApi::class,
        ],
    ];
```

配置应用模型model

新增的model要继承 `Iayoo\OpenApi\Laravel\model\App`

### Lumen 安装

安装

```
composer require iayoo/laravel-openapi:dev-master
```

配置 `bootstrap/app.php`, 在 `middleware` 中新增一项
```php
$app->middleware([
    // 新增中间件支持验证
    Iayoo\OpenApi\Lumen\Middleware\OpenApi::class
]);
``` 

并且需要保证 `$app->withFacades();` 是打开状态的

配置文件

拷贝 `iayoo/laravel-openapi/config/open_api.php` 到 `项目更目录/config/open_api.php`

在 `bootstrap/app.php` 新增配置
```
$app->configure('open_api');
```

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