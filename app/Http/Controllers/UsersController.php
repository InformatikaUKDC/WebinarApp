<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public $usersModel;
    public function __construct()
    {
        $this->usersModel = new User();
    }

    public function registration(Request $request)
    {
        $validate = $request->validate([
            'email' => 'unique:user'
        ]);

        if(!$validate){
            return response()->json($validate);
        }

        $user = $this->usersModel::create($request->all());
        $token = $user->crateToken('auth_token')->plainTextToken;
        return response()->json([
            'data' => $user,
            'token' => $token
        ], 201);
    }
}
