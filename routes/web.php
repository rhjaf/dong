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



// languages
use App\Http\Controllers\LangController;

Route::get('en',"LangController@en")->name('en');
Route::get('fa','LangController@fa')->name('fa');


Auth::routes();



Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/about',function (){
    return view('about');
})->name('about');



// User Routes
Route::put('/users/{user}/update','UserController@update')->name('user.profile.update');
Route::delete('/users/{user}/destroy','UserController@destroy')->name('users.destroy');

Route::group(['middleware'=>'auth'],function (){
    Route::get('/user', 'UserController@index')->name('user');
    // we passed a policy. 'can' is keyword
    Route::get('/user/{user}/profile','UserController@show')->name('user.profile.show');
    Route::get('/user/{user}/groups','UserController@showGroups')->name('user.groups');

});


// Group Routes
Route::get('/group/{group}','GroupController@show')->name('group.show');

Route::middleware(['auth'])->group(function (){
    Route::get('/group','GroupController@index')->name('group.index'); // fetch all posts
    Route::get('/group/create','GroupController@create')->name('group.create');
    Route::post('/group','GroupController@store')->name('group.store');
    Route::put('/group/{group}/update','GroupController@update')->name('group.update');
    Route::delete('/group/{group}/destroy','GroupController@destroy')->name('group.destroy');
    Route::get('/group/{group}/edit', 'GroupController@edit')->name('group.edit');
    Route::put('/group/{group}/{user}/removeuser', 'GroupController@removeUser')->name('group.removeuser');
    Route::put('/group/{group}/adduser', 'GroupController@addUser')->name('group.adduser');
    Route::get('autocomplete', 'UserSearchController@autocomplete');
//    Route::get('query', 'UserSearchController@index');
});



