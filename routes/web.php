<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

include 'auth.php';

Route::middleware(['auth:sanctum', 'verified'])
->group(function() {
    Route::get('/', function () {
        return view('dashboard');
    });

    Route::name('user.')
    ->prefix('user')
    ->group(function(){
        require_once 'user.php';
    });

    Route::name('admins.')
    ->prefix('admins')
    ->group(function(){
        
        Route::name('managements.')
        ->prefix('managements')
        ->group(function() {
            require_once 'admins/managements/database.php';
            require_once 'admins/managements/user.php';
        });
        
        Route::name('settings.')
        ->prefix('settings')
        ->group(function() {
            require_once 'admins/setting.php';
        });
    });

});