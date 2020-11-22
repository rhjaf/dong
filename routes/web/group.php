<?php
use Illuminate\Support\Facades\Route;
$prefix = config('web.group.prefix');
/*Route::get(['prefix'=>'$prefix'],function () use($prefix){
    Route::get('/','GroupController@index')->name($prefix.'index');
});*/

Route::get('/','GroupController@index')->name($prefix.'index');
