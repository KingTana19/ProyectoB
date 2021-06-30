<?php

namespace App\Http\Controllers;

use App\Http\Requests\servicio as servicioR;
use Carbon\Carbon;
use App\Models\Servicios;
use Illuminate\Http\Request;

class ServiciosController extends Controller
{
    public function __construct(){
        $this->middleware(['auth','rol:Administrador']);
     }

    public function index()
    {
        $lista = Servicios::orderBy('id','Desc')->get();
        return view('servicios.index',compact('lista'));
    }

    public function store(servicioR $request)
    {
       /*  $rura = $request['imagen']->store('update-productos','public'); *///Creamos esta linea para guarda las imagenes una
        //carpeta storange/app/nombre carpeta

        $servici = Servicios::insert([
            'nombre'=>request()->input('nombre'),
            'descripcion'=>request()->input('descripcion'),
            'precio'=>request()->input('precio'),
            'imagen'=>request()->input('imagen'),
            'estado'=>'activo',
            'created_at'=>Carbon::now(),
        ]);
        return redirect()->route('servicios.store')->with('servici',$servici);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function update(servicioR $request, $id)
    {
        $editar = Servicios::where('id',$id)->update([
            'nombre'=>request()->input('nombre'),
            'descripcion'=>request()->input('descripcion'),
            'precio'=>request()->input('precio'),
            'imagen'=>request()->input('imagen'),
            'estado'=>request()->input('estado'),
            'updated_at'=>Carbon::now(),
        ]);
        return redirect()->route('servicios.store')->with('editar',$editar);
    }

    public function destroy($id)
    {
        $elimi = Servicios::findOrFail($id)->delete();
        return redirect('/servicios')->with('elimi',$elimi);
    }
}
