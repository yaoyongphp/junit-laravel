# ctocn/junit-laravel

基于laravel5.8框架开发的junit-laravel单元测试组件

# 框架要求

Laravel >= 5.1 & PHP > 7.1.3 

# 安装方式

```yml
composer require "ctocn/sjunit-laravel"
```

# 配置方式
5.5手动配置laravel对于``Ctocn\JunitLaravel\Providers\JunitServiceProvider::class``服务放到config/app.php中

解释路由
```php
<?php
Route::get('/', 'JunitController@index');
Route::post('/', 'JunitController@store')->name('junit.store');
?>
```

