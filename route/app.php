<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\facade\Route;

// Route::get('think', function () {
//     return 'hello,ThinkPHP6!';
// });

// Route::group('user',function(){
//     Route::get('', 'index');
//     Route::post('', 'create');
//     Route::delete(':id', 'destroy');
// })->prefix('UserController/');

// 资源路由
Route::resource('user', 'UserController');
