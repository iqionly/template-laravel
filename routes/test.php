<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth.basic')->group(function() { 
    Route::get('/middleware-auth-basic', function () {
        return response()->json(['message' => 'Auth Basic Custom Works!']);
    });
});
