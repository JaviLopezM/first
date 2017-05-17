<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Support\Facades\Auth;
use Socialite;
use Validator;
use Session;
use Redirect;
use App\http\Requests\UserRequest;
use Illuminate\Http\Request;
//Classes per controlar les imatges
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Auth\Access\Response;

use App\Post;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;


class PersonalController extends Controller
{
    //
    public function getPerfil()
    {
        return view('auth.perfil', ['user' => Auth::user()]);
    }
    public function postActualizar(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required|max:120'
        ]);
        $user = Auth::user();
        $user->nombre = $request['nombre'];
        $user->apellidos = $request['apellidos'];
        $user->email = $request['email'];
        $user->direccion = $request['direccion'];
        $user->update();
        $file = $request->file('imagen');
        $filename = $request['nombre'] . '-' . $user->id . '.jpg';
        if ($file) {
            Storage::disk('local')->put($filename, File::get($file));
        }
        if ($request->user()->update()) {
            $message = 'Perfil actualizado';
        }
        return redirect('perfil')->with(['message' => $message]);
    }
    public function getImage($filename)
    {
        $file = Storage::disk('local')->get($filename);
        return new Response($file, 200);
    }
    public function getUsers(){
        $users = User::paginate(5);
        $users->setPath('');
        return view('auth.list', compact('users'));
    }
    public function destroyUser($id)
    {
        $user = User::findOrFail(id);
        $user->delete();

        return redirect('auth.list')->with('status', 'Succesfully delete user from lesson!');
    }
}
