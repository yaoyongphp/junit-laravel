<?php
namespace Ctocn\JunitLaravel\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
/**
 单元测试组件的服务提供者,用来加载junit组件的
 服务提供者作用：
 加载laravel组件运行的时候所需要一些key,参考laravel\config\app.php中的'providers' => [...],里面提供了很多的服务提供者；
 打开Illuminate\Auth\AuthServiceProvider::class和Illuminate\Database\DatabaseServiceProvider::class文件，
 因此可以看出laravel项目对于组件加载都是通过服务提供者加载的(register()注册和boot()加载)
 */

class JunitServiceProvider extends ServiceProvider
{
    //注册服务
    public function register()
    {
        //echo '这是junt 服务提供者';

        //注册组件路由
        $this->registerRoutes();
        //参考模仿laravel-admin组件(https://packagist.org/packages/encore/laravel-admin)；__DIR__.'/../../resources/views是自定义的资源目录地址；junit是指定的组件的名称
        /*
        $this->loadViewsFrom()方法是laravel\vendor\laravel\framework\src\Illuminate\Support\ServiceProvider.php的方法，$this->app['view']->addNamespace($namespace, $path);含义解释如下
        //app['view']实际是source\junit-laravel\laravel\vendor\laravel\framework\src\Illuminate\Foundation\Application.php中的'view' => [\Illuminate\View\Factory::class, \Illuminate\Contracts\View\Factory::class],中的\Illuminate\View\Factory::class类
        //app['view']->addNamespace()实际是Factory类的addNamespace()方法
        $this->app['view']->addNamespace($namespace, $path);

        laravel\vendor\laravel\framework\src\Illuminate\View\Factory.php中的addNamespace()方法解释如下：

        public function addNamespace($namespace, $hints)
        {
            // $this->finder->addNamespace()其实是source\junit-laravel\laravel\vendor\laravel\framework\src\Illuminate\View\ViewFinderInterface.php类中的addNamespace()方法
            $this->finder->addNamespace($namespace, $hints);

            return $this;
        }
        */
        $this->loadViewsFrom(
            __DIR__.'/../../resources/views', 'junit'
        );
    }

    //加载服务
    public function boot()
    {

    }

    // 参考模仿laravel-admin组件(https://packagist.org/packages/encore/laravel-admin)
    private function registerRoutes()
    {
        Route::group($this->routeConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__.'/../Http/routes.php');
        });
    }

    private function routeConfiguration()
    {
        return [
            //'domain' => config('telescope.domain', null), //定义访问路由的域名,没用到，注释掉
            //定义路由的命名空间
            'namespace' => 'Ctocn\JunitLaravel\Http\Controllers',
            //前缀
            'prefix' => 'junit',
            //中间件
            'middleware' => 'web',
        ];
    }
}
