<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    //

    protected $fillable = ['link','name','admin','avatar'];


    public function users(){
        return $this->belongsToMany(User::class);
    }


    public function  saveData($request){
        $group = new Group;
        $group->name = $request->name;
        $group->link = uniqid($request->name);
        $group->image = $request->image;
        $group->save();
    }
}
