<?php
use Illuminate\Support\Facades\Route;
$prefix = config('web.user.prefix');
Route::get('/','UserController@index')->name($prefix.'index');


