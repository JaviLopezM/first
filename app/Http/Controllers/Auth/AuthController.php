<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Database\Eloquent\Builder;
use Session;
use Redirect;
use App\http\Requests\UserRequest;




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
    public function index()
    {

        $users = User::paginate(5);
        $users->setPath('');

        return view('auth.list', compact('users'));
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
            'nombre' => 'required|max:255',
            'apellido' => 'max:255',
            'telefono' => 'max:255',
            'DNI' => 'required|max:10',
            'direccion' => 'max:800',
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
    public function show($id)
    {
        $user= User::find($id);

        return view('auth.perfil');
    }
    protected function store(Request $request)
    {
        $user = new User([
            'nombre' => $request['nombre'],
            'apellidos' => $request['apellidos'],
            'telefono' => $request['telefono'],
            'DNI' => $request['DNI'],
            'email' => $request['email'],
            'direccion' => $request['direccion'],
            'password' => bcrypt($request['password']),
        ]);
        $user->role = 'user';
        $user->save();
        
        Auth::login($user);
        return view('auth.perfil');
    }

    protected function create()
    {
        return view('auth.register');
    }

//    public function loginPath()
//    {
//        return view('auth');
//    }
    protected $redirectPath = '/';
//    public function redirectPath()

    public function edit($id)
    {
        $user= User::find($id);
        return view('auth.perfil',compact('user'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id,Request $request)
    {

        $reglas = array(
            'nombre' =>'unique:users',  // Deberá ser único en la tabla users
            'email' =>'email|unique:users',  // Deberá ser único en la tabla users

        );

//        $validator = Validator::make($request->all(),$reglas);
        $user= User::find($id);

        if ($request->input('nombre'))
            $user->nom=$request->input('nombre');
        if ($request->input('email'))
            $user->email=$request->input('email');
        if ($request->input('role'))
            $user->role=$request->input('role');

        // Grabamos el usuario en la tabla.
        $user->save();

        return Redirect::to('auth.perfil');
    }
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return view('auth.perfil');
    }

}
