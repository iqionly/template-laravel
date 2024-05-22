<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admins\SettingController;

Route::get('/', [SettingController::class, 'index'])->name('index');

Route::post('/', [SettingController::class, 'store'])->name('update-config');