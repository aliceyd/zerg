<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

use think\Route;

// Route::rule('路由表达式','路由地址','请求类型','路由参数（数组）','变量规则（数组）');
//GET,POST,DELETE,PUT,*
//三段式：模块，控制器，操作方法名
// Route::get('hello','sample/Test/hello');

Route::get('banner/:id','api/v1.Banner/getBanner');

