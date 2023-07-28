<?php
use Illuminate\Support\Facades\Route;
use Zerotoprod\AppLog\Http\Controllers\LogController;

Route::get('/logs', LogController::class);
