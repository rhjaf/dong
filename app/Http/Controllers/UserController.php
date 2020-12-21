<?php

namespace App\Http\Controllers;

use App\Group;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    //
    /*public function index(){
        $users = User::all();
        return view('admin.users.index',['users'=>$users]);
    }*/

    public function index() {
        return view('user.main');
    }


    public function show(User $user){
        return view('user.profile',['user'=>$user]);
    }


    public function update(User $user){

//        $validatedData = request()->validate(['name'=>'required|unique:groups|min:5','avatar'=>'file:jpg,png']);
        $validatedData = request()->validate([
            'name'=>['required','string','max:255','alpha_dash'],
            'email'=>['required','email','max:255'],
            'avatar'=>['file:jpg,png'],
//           'password'=>['min:6','max:255','confirmed'], we don't want to Enter password everytime we we want to edit profile

        ]);
        if(\request()['avatar']){
//            dd(\request());
            $avatar = $validatedData['avatar'];
            $filename = time().'.'.$avatar->getclientOriginalExtension();
            Image::make($avatar)->resize(300,300)->save(public_path('/uploads/avatars/').$filename);
            $validatedData['avatar'] = $filename;
        }
        $user->update($validatedData);
        return back(); //get back to view


    }

    public function userIsAdmin($group) {
        return Auth::user()->id = Group::find($group)->admin;
    }


    public function showGroups(User $user) {
        return view('user.groups',['groups'=>$user->groups()->paginate('5')]);
    }

    /*
    public function destroy(User $user){
        $user->delete();

        session()->flash('user-del',"User has been deleted");

        return back();
    }
    */
}
