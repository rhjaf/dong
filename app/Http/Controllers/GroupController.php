<?php

namespace App\Http\Controllers;

use App\Group;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class GroupController extends Controller
{
    public function __construct(Group $group)
    {
        $this->group = $group;
    }

    public function index(){
        return view('user.groups',['groups'=>Auth::user()->groups()]);
    }

    public function store(Request $request){

        $validatedData = $request->validate(['name'=>'required|unique:groups|min:5','avatar'=>'file:jpg,png']);
        if(\request()['avatar']){
            $avatar = $validatedData['avatar'];
            $filename = time().'.'.$avatar->getclientOriginalExtension();
            Image::make($avatar)->resize(300,300)->save(public_path('/uploads/avatars/').$filename);
            $validatedData['avatar'] = $filename;
        }
        $gr = Group::create(['name'=>$validatedData['name'],'link'=>uniqid($validatedData['name']),'avatar'=>$validatedData['avatar'],'admin'=>Auth::user()->id]);
        Auth::user()->groups()->attach($gr);
        session()->flash('group-create','گروه'.$validatedData['name']. ' ساخته شد!');
        return back();
    }

    public function removeUser(Group $group,User $user){
        $user->groups()->detach($group);
        session()->flash('remover-user-from-group','کاربر '.$user->name.'از گروه حذف شد');
        return back();
    }
    public function addUser(Group $group,Request $request){
        $group->users()->attach(User::where('name','=',$request['name'])->get());
        session()->flash('add-user-to-group','کاربر '.$request['name'].' به گروه اضافه شد');
        return back();
    }
    //add-user-to-group
    public function destroy(Group $group){
        $this->authorize('view',$group);
        $group->delete();
        session()->flash('group-delete','گروه پاك شد');
        return redirect()->route('user.groups',auth()->user());
    }

    public function edit(Group $group){
        $this->authorize('view',$group);
        return view('user.group',['group'=>$group,'users'=>$group->users()->paginate('6')]);
    }

    public function update(Group $group){
        $inputs = request()->validate([
            'name' => 'required|min:5|max:255',
            'avatar'=>'mimes:jpeg,png'
        ]);
        if(request('avatar')){
            $avatar = $inputs['avatar'];
            $filename = time().'.'.$avatar->getclientOriginalExtension();
            Image::make($avatar)->resize(300,300)->save(public_path('/uploads/avatars/').$filename);
            $inputs['avatar'] = $filename;
        }
        $group->update($inputs);
        session()->flash('group-update','گروه بروزرساني شد');
        return redirect()->route('user.groups',auth()->user());

    }
}
