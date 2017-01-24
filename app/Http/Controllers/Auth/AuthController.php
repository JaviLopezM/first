<?php

namespace App\Http\Controllers\Auth;

use App\User;
//use Illuminate\Contracts\Validation\Validator;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;







class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nom' => 'required|max:255',
            'cognoms' => 'required|max:255',
            'telefon' => 'required|max:255',
            'DNI' => 'required|max:10',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $user = new User([
            'nom' => $data['nom'],
            'cognoms' => $data['cognoms'],
            'telefon' => $data['telefon'],
            'DNI' => $data['DNI'],
            'email' => $data['email'],
            'adreça' => $data['adreça'],
            'password' => bcrypt($data['password']),
        ]);
        $user->role = 'user';
        $user->save();

        return $user;
    }

    public function loginPath()
    {
        return route('login');
    }
    public function redirectPath()
    {

        return route('home');
    }
}
