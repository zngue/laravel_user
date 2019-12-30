<?php
Route::namespace('Zngue\User\Controller')->prefix('api')->group(function () {
    //用户登录
    Route::prefix('login')->group(function (){
        Route::post('/','Login@login');
    });
    //用户注册
    Route::prefix('register')->group(function (){
        Route::post("/","User@add");
    });
    Route::prefix("user")->middleware([])->group(function (){
        Route::post('add','User@add');//注册 或者添加
        Route::post('edit','User@edit');//修改用户信息
        Route::get('getOne','User@getOne');//获取一条用户信息数据
        Route::post("del","User@delInfo");//删除用户
        Route::get("list","User@getUserList");//获取用户列表
    });
});


