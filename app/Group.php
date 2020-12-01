<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    //

    protected $fillable = ['link'];


    public function groups(){
        return $this->belongsToMany(User::class);
    }
}
