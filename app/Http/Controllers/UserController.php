<?php

namespace App\Http\Controllers;

use App\Models\User as ModelsUser;
use Illuminate\Http\Request;

class UserController extends Controller
{


    public function account(ModelsUser $user)
    {
        return view("user/account", ["user" => $user]) ;
    }
}
