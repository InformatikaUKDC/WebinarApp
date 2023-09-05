<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    public $usersModel;
    public $roleModel;
    public function __construct()
    {
        $this->usersModel = new User();
        $this->roleModel = new Role();
    }

    // register new user
    public function registration(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'email' => 'unique:tb_users'
        ], [
            'email' => [
                'unique' => 'Email sudah terdaftar'
            ]
        ]);

        if ($validate->fails()) {
            return response()->json($validate->errors(), 200);
        }

        $id_user = $this->roleModel->select('id')->where('role', '=', 'non-admin')->first();

        $user = $this->usersModel::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'no_wa' => $request->input('no_wa'),
            'gender' => $request->input('gender'),
            'address' => $request->input('address'),
            'institution' => $request->input('institution'),
            'role_id' => $id_user->id,
            'last_since' => new DateTime()
        ]);
        return response()->json([
            'data' => $user
        ], 201);
    }

    // login user
    public function login(Request $request)
    {
        try {
            $array_error = array();
            $validate = validator::make(
                $request->all(),
                [
                    'email' => 'required',
                    'password' => 'required'
                ],
                [
                    'email' => [
                        'required' => 'email harus diisi'
                    ],
                    'password' => [
                        'required' => 'password harus diisi'
                    ]
                ]
            );

            if ($validate->fails()) {
                array_push($array_error, $validate->errors());
            }

            //get email form database
            $email_user = $this->usersModel->where('email', '=', $request->input('email'))->first();
            if (Auth::attempt($request->only('email', 'password'))) {
                $user_auth = Auth::user();
                $token = $user_auth->createToken('authToken');
                $access_token = $token->plainTextToken;
                return response()->json([
                    'message' => 'Sukses login',
                    'data' => $email_user,
                    'access_token' => $access_token,
                    'token_expires' => config('sanctum.expiration')
                ], 200);
            }
            else {
                return response()->json([
                    'message' =>  'Gagal login',
                    'error' => 'Password salah'
                ], 200);
            }
        } catch (\Throwable $th) {
            array_push($array_error, 'Email tidak ditemukan');
            return response()->json([
                'message' =>  'Gagal login',
                'error' => $array_error
            ], 200);
        }
    }

    // logout user
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json('Akun berhasil logout', 200);
    }

    // view users
    public function viewUsers()
    {
        $users = $this->usersModel->paginate(10);
        return response()->json($users, 200);
    }
}
