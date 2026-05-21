<?php

use Illuminate\Support\Facades\Route;

use Symfony\Component\HttpFoundation\Request;

Route::get('/', function () {
    return 'hello world';
});
