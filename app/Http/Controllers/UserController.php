<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Role_user;
class UserController extends Controller
{
    public function index()
    {
        $usuarios = Role_user::join('roles', 'roles.id', '=', 'role_user.role_id')
        ->join('users', 'users.id', '=', 'role_user.user_id')->paginate(10);
        // dd($usuarios);
        if (\Auth::user()->hasRole('admin')) {
            return view('user.index', compact('usuarios'));
        }
        else
        {
            return redirect()->route('home');
        }
    }

    public function edit($id)
    {
        $usuario = User::findOrFail($id);
        $rol = Role_user::where('user_id', $id)->first();
        if (\Auth::user()->hasRole('admin')) {
            return view('user.edit', compact('id', 'rol', 'usuario'));
        }
        else
        {
            return redirect()->route('home');
        }
    }

    public function update(Request $request, $id)
    {
        $usuario = User::findOrFail($id);
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$usuario->id,
            'rol' => 'required|not_in:0',
            'password' => 'confirmed',
        ]);

        $usuario->name = $request->name;
        $usuario->email = $request->email;
        // $rol->rol_id = $request->rol;
        
        if ($request->password!=null) {
            $usuario->password = bcrypt($request->password);
        }
        else
        {
            unset($usuario->password);
        }
        $usuario->save();
        $rol = Role_user::where('user_id', $id)->update(['role_id' => $request->rol]);
        // $rol->save()

        // $usuario = User::findOrFail($id);
        return redirect()->route('usuarios.index')->with('infob', 'El usuario "'.$usuario->name.'" fue actualizado exitosamento');
        
    }

    public function GetchangePwd()
    {
        return view('user.config');
    }

    public function changePwd(Request $request, $id)
    {
        $usuario = User::findOrFail($id);
        $this->validate($request, [
            'password' => 'required|string|min:6|confirmed',
        ]);

        $usuario->password = bcrypt($request->password);

        $usuario->save();

        return redirect()->route('config.get')->with('infob', 'Su contraseña fue cambiada exitosamento');
    }

    public function destroy($id)
    {
        $array = array('0'=>'Se ha eliminado el registro');
        // return($id);
        User::find($id)->delete();
        Role_user::where('user_id', $id)->delete();
        return response()->json($array);
    }
}
