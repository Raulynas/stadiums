<?php

namespace App\Http\Controllers;

use App\Models\User as ModelsUser;
use App\Models\Stadium;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{

    public function account(ModelsUser $user)
    {
        $stadiums = Stadium::get();
        return view("user/account", ["user" => $user], ["stadiums" => $stadiums]) ;
    }
}
