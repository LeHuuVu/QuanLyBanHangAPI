<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    function login(Request $req)
    {
        $user = User::where('email', $req->email)->first();
        if (!$user || !Hash::check($req->password, $user->password))
        {
            return ["error"=>"Wrong password or email address"];
        }
        return $user;
    }
    function register(Request $req)
    {
        $validate = Validator::make($req->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'SDT' => 'required',
            'Address' => 'required',
        ]);
        if ($validate->fails())
        {
            return $validate->errors();
        }
        try
        {
            $user = User::create(
                [
                    'name' => $req->name,
                    'email' => $req->email,
                    'password' => Hash::make($req->password),
                    'SDT' => $req->SDT,
                    'role' => '0',
                    'Address' => $req->Address,
                    'avatar' => 'https://quanlybanhangapi.herokuapp.com/public/avatar/Gdefault.png'
                ]
            );
            $user->save();
            return $user;
        }
        catch(Exception $e)
        {
            return $e;
        }
    }
}
