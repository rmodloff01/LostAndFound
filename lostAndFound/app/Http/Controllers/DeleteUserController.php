<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class DeleteUserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function deleteUser(Request $req){
        $deletedUser = json_decode($req['userObj']);
        User::Destroy($deletedUser->id);

        $MSG = "Removed account with email address";
        return view('success')->with('msg', $MSG)->with('passed', $deletedUser);
    }

    public function getUsers(){
        $users = User::all();
        return view('deleteViews/deleteUser')->with('users', $users);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
}
