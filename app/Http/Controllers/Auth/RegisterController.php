<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\AuthCode;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
//    protected $redirectTo = RouteServiceProvider::HOME;
//    protected $redirectTo = "/home";

    protected $redirectTo = "/welcome";
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        info(__METHOD__);
        info($data);
        return Validator::make($data, [
            'member_id' => ['required', 'string', 'min:4', 'max:25', 'unique:users'], // member_id
//            'name' => ['required', 'string', 'max:255'],
//            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:4', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
//        return User::create([
//            'name' => $data['name'],
//            'email' => $data['email'],
//            'password' => Hash::make($data['password']),
//        ]);
        info(__METHOD__);
        info($data);
        return User::create([
            'member_id' => $data['member_id'],
            'password' => Hash::make($data['password']),
        ]);

//        if($user){
//            $auth_code = AuthCode::generateCode($user->id);
//            // 회원가입 후 /home 으로 리디렉션 될 때 auth_code 인증으로 Auth session 추가
//            return response()->json(["code" => 200, "auth_code" => $auth_code]);
//        } else {
//            // 회원가입 실패
//            return response()->json(["code" => 301]);
//        }
    }
}
