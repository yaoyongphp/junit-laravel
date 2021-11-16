<?php
namespace Ctocn\JunitLaravel\Http\Controllers;

use Illuminate\Routing\Controller;
/**
 * TestController控制器,需要继承一个laravel所提供的控制器
 */
class TestController extends Controller
{
    public function index()
    {
        return '这是测试junit的一个测试控制器，测试的目标是与laravel集成控制器和服务';
    }
}
