<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});

Route::name('user.')
->prefix('user')
->group(function(){
    require 'user.php';
});

Route::name('admins.')
->prefix('admins')
->group(function(){
    
    Route::name('managements.')
    ->prefix('managements')
    ->group(function() {
        require 'admins/managements/database.php';
        require 'admins/managements/user.php';
    });
    
    Route::name('settings.')
    ->prefix('settings')
    ->group(function() {
        require 'admins/setting.php';
    });
});