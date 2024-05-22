<?php

use Illuminate\Support\Facades\Route;

Route::get('/database', function () {
    return view('admins.managements.database');
})->name('database');