<?php

namespace App\Http\Controllers;

use App\Http\Requests\usuario;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    protected $primaryKey = 'id';

        public function __construct()
        {
            $this->middleware(['auth','rol:Administrador']);
        }

    public function index()
    {
        $usuarios = User::orderBy('id','Desc')->get();
        return view('usuario\index')->with('usuarios',$usuarios);
    }


    public function create()
    {
        return view('usuario.create');
    }

    function store(usuario $request)
    {
        $usuarios=new User();
        $usuarios->name=$request->get('name');
        $usuarios->apellido=$request->get('apellido');
        $usuarios->telefono=$request->get('telefono');
        $usuarios->documento=$request->get('documento');
        $usuarios->rol=$request->get('rol');
        $usuarios->email=$request->get('email');
        $usuarios->password= Hash::make($request['password']);

        $usuarios->save();

        return redirect('/usuarios');
    }

    public function edit($id)
    {
        $usuario = User::findOrFail($id);
        return view('usuario.edit')->with('usuario',$usuario);
    }


    public function update(Request $request, $id)
    {
        $usuario= User::findOrfail($id);

        $usuario->name=$request->get('name');
        $usuario->apellido=$request->get('apellido');
        $usuario->telefono=$request->get('telefono');
        $usuario->documento=$request->get('documento');
        $usuario->email=$request->get('email');
        $usuario->rol=$request->get('rol');

        $usuario->save();

        return redirect('/usuarios');
    }


    public function destroy($id)
    {
        $usuario= User::findOrFail($id);
        $usuario->delete();
        return redirect('/usuarios');
    }
}
