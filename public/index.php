<?php

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

/*
|--------------------------------------------------------------------------
| Composer Autoload
|--------------------------------------------------------------------------
|
| Memanggil autoload dari composer agar semua library Laravel tersedia.
|
*/
require __DIR__.'/../vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Bootstrap The Application
|--------------------------------------------------------------------------
|
| Membuat instance Laravel Application dari bootstrap/app.php
|
*/
$app = require_once __DIR__.'/../bootstrap/app.php';

/*
|--------------------------------------------------------------------------
| Run The HTTP Kernel
|--------------------------------------------------------------------------
|
| Tangkap request dari browser, jalankan kernel Laravel, kirim response,
| lalu terminate request.
|
*/
$kernel = $app->make(Kernel::class);

/* Tangkap Request */
$request = Request::capture();

/* Jalankan Request dan dapatkan Response */
$response = $kernel->handle($request);

/* Kirim Response ke Browser */
$response->send();

/* Terminasi Kernel */
$kernel->terminate($request, $response);
