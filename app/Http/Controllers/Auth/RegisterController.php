<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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

    // use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    

    public function __construct()
    {
        $this->middleware('auth');
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create()
    {
        // return User::create([
        //     'name' => $data['name'],
        //     'email' => $data['email'],
        //     'password' => bcrypt($data['password']),
        // ]);

        // $user
        //     ->roles()
        //     ->attach(Role::where('name', 'user')->first());
        //return $user;

        // $user = User::create([
        //     'name' => $data['name'],
        //     'email' => $data['email'],
        //     'password' => bcrypt($data['password']),
        // ]);
        // $role = Role::where('name', 'user')->first();
        // $user->roles()->attach($role);
        if (\Auth::user()->hasRole('admin')){
            return view('auth.register');
        }
        else{
            return redirect()->route('home');
        }
    }

    protected function store()
    {
        // $user = User::create([
        //     'name' => $data['name'],
        //     'email' => $data['email'],
        //     'password' => bcrypt($data['password']),
        // ]);
        // $role = Role::where('name', 'user')->first();
        // $user->roles()->attach($role);
        $user = new User();
        $user->name=Request()->name;
        $user->email=Request()->email;
        $user->password= bcrypt(Request()->password);
        // obtenemos con el metodo request los datos enviador desde el form
//        $user -> fill(request()->all());
        // obtenemos el rol asignado en el form
        $roles = request()->all();
        // obtenemos el role de la base de datos
        $role = Role::where('name', 'user')->first();
        // se guarda el usuario
//        $user->password = bcrypt(Request()->password);
//        $user->password = Hash::make(Request()->password);
//        dd($user);
        $user->save();
        // asignamos el rol al usuario en la base de datos con el metodo attach, de muchos a muchos declarado en el modelo users
        $user->roles()->attach($role);

        return redirect()->route('register.get')->with('infob', 'Usuario creado con exito');

    }
}
