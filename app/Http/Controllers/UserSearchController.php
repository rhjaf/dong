<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserSearchController extends Controller
{
    public function index()
    {
        return view('user.group');
    }

    public function autocomplete(Request $request)
    {
        $search = $request->get('term');

        $result = User::where('name', 'LIKE', '%'. $search. '%')->get();

        return response()->json($result);

    }
}
