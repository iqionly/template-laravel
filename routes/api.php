<?php

use Illuminate\Support\Facades\Route;

Route::name('api.')
->group(function() {
    require 'auth.php';
    Route::middleware(['auth:sanctum', 'verified'])
    ->group(function() {
        include 'app.php';
    });
});
// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
