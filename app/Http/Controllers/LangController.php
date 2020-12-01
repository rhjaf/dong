<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LangController extends Controller
{
    //
    public function en(){
        app()->setLocale('en');
        return redirect()->back();
    }
    public function fa(){
        App::setLocale('fa');
        return redirect()->back();
    }

}
