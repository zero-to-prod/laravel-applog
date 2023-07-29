<?php
use Illuminate\Support\Facades\Route;
use Zerotoprod\AppLog\Http\Controllers\LogController;
use Zerotoprod\AppLog\Http\Controllers\LogShowController;

Route::get('applogs', fn() => view('applog::pages.home'))->name('home');
Route::get('applogs/php', fn() => view('applog::pages.php'))->name('php');
Route::get('applogs/phpinfo', fn() => view('applog::pages.phpinfo'))->name('phpinfo');
Route::get('applogs/logs', LogController::class)->name('logs');
Route::get('applogs/logs/{id}', LogShowController::class)->name('logs.show');
