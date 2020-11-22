<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


// languages
use App\Http\Controllers\LangController;

Route::get('en',"LangController@en")->name('en');
Route::get('fa','LangController@fa')->name('fa');

Route::get('test/{id}',"App\Http\Controllers\TestController@index");


Auth::routes();

Route::group(['middleware'=>'auth'],function (){
    Route::get('/home', 'HomeController@index')->name('home');
    require ('web/group.php');
    require ('web/user.php');
});


