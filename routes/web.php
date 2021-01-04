<?php

use App\Group;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

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
use Intervention\Image\Facades\Image;

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
    Route::get('/user/{user}/expenses',function (\App\User $user){
        return view('user.expenses',['user'=>$user]);
    })->name('user.expenses');
    Route::get('/user/{user}/expenses/{group}','UserController@makeExpense')->name('user.expenses.make');
    Route::post('/user/{user}/expenses/{group}/store',function (User $user,Group $group,Request $request) {
        // if the user was admin of the group or admin accepted the expense
        $validatedData = $request->validate(['name'=>'required|min:3','cost'=>'required','payer'=>'required','participants'=>'required']);
        $created_at = $request['created_at'];
        if(!$request['created_at'])
        {
            $created_at = Carbon::now()->toDateTimeString();
        }
        $expense_id = DB::table('expenses')->insertGetId([
            'created_at'=>$created_at,
            'group_id'=>$group->id,
            'name'=>$validatedData['name'],
            'cost'=>$validatedData['cost'],
            'payer'=>$validatedData['payer'],
            'participants'=>implode('!',$validatedData['participants']),
            'accepted'=>1
        ]);
        foreach ($validatedData['participants'] as $participant){
            if($participant!=$validatedData['payer']) {
                DB::table('debts')->insert([
                    'created_at' => $created_at,
                    'user_id' => $participant,
                    'expense_id' => $expense_id,
                    'recipient' => $validatedData['payer'],
                    'cost' => number_format((float)$validatedData['cost'] / sizeof($validatedData['participants']), 2, '.', '')
                ]);
            }
        }
        return back();
    })->name('user.expenses.store');
    Route::post('/user/{user}/expenses/{group}/create',function (User $user,Group $group,Request $request){
        // if the user wasn't admin of the group
        $validatedData = $request->validate(['name'=>'required|min:3','cost'=>'required','payer'=>'required','participants'=>'required']);
        $created_at = $request['created_at'];
        if(!$request['created_at'])
        {
            $created_at = Carbon::now()->toDateTimeString();
        }
        DB::table('expenses')->insert([
            'created_at'=>$created_at,
            'group_id'=>$group->id,
            'name'=>$validatedData['name'],
            'cost'=>$validatedData['cost'],
            'payer'=>$validatedData['payer'],
            'participants'=>implode('!',$validatedData['participants']),
            'accepted'=>0
        ]);
       return back();
    })->name('user.expenses.create');
    Route::put('/user/expenses/{expense}/accept',function (int $expense) {
                // the admin accept the expense created by other users of group
        DB::table('expenses')
            ->where('id', $expense)
            ->update(['accepted' => 1]);
        $exp = DB::table('expenses')->where('id', '=', $expense)->get()[0];
        $participants = explode('!',$exp->participants);
        foreach ($participants as $participant){
            if($participant!=$exp->payer) {
                DB::table('debts')->insert([
                    'created_at' => $exp->created_at,
                    'user_id' => $participant,
                    'expense_id' => $exp->id,
                    'recipient' => $exp->payer,
                    'cost' => number_format((float)$exp->cost / sizeof($participants), 2, '.', '')
                ]);
            }
        }
        return back();

    })->name('user.expenses.accept');

});


// Group Routes
Route::get('/group/{group}','GroupController@show')->name('group.show');

Route::middleware(['auth'])->group(function (){
    Route::get('/group','GroupController@index')->name('group.index');
    Route::get('/group/create','GroupController@create')->name('group.create');
    Route::post('/group','GroupController@store')->name('group.store');
    Route::put('/group/{group}/update','GroupController@update')->name('group.update');
    Route::delete('/group/{group}/destroy','GroupController@destroy')->name('group.destroy');
    Route::get('/group/{group}/edit', 'GroupController@edit')->name('group.edit');
    Route::put('/group/{group}/{user}/removeuser', 'GroupController@removeUser')->name('group.removeuser');
    Route::put('/group/{group}/adduser', 'GroupController@addUser')->name('group.adduser');
    Route::get('autocomplete', 'UserSearchController@autocomplete');
});



