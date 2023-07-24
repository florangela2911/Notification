<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UsersCController extends Controller
{
    
    /**
     * Example function
     *
     * @return \Illuminate\Http\Response
     */

    public function usersC ()
    {
         // Function logic here

        $users = user::all();

        return view('.Users.usersC', compact('users'));
    }
    
}
