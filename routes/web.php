<?php

use Illuminate\Support\Facades\Route;

require 'auth.php';

Route::middleware(['auth:sanctum', 'verified'])
->group(function() {
    include 'app.php';
});