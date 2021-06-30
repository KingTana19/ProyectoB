<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;


use App\Models\Productos;
use App\Models\Servicios;
use App\Models\Citas;
use App\Models\Categorias;
use Illuminate\Http\Request;

class VistasContoller extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function producto()
    {
        $pro = Productos::all();
        $catego = Categorias::all(['id','nombre']);
        return view('Productos.productoss')->with('pro',$pro)->with('catego',$catego);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function servicio()
    {
        $servi = Servicios::all();
        return view('servicios.RealizarCita')->with('servi',$servi);
    }

    public function MisCitas()
    {
        $lista = Citas::join('users', 'citas.usuario_id', '=', 'users.id')
        ->join('servicios', 'citas.servicio_id', '=', 'servicios.id')
        ->select('servicios.*', 'users.*', 'citas.*')->where('users.id', '=', auth::user()->id)->get();

        return view('servicios.MisCitas',compact('lista'));
    }

}
