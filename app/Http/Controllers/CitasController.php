<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Http\Requests\cita;
use App\Models\User;
use App\Models\Citas;
use Illuminate\Http\Request;
use App\Models\Servicios;

class CitasController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        $lista = Citas::orderBy('id','Desc')->get();
        $servicios = Servicios::all(['id','nombre']);
        $usuarios = User::all(['id','name', 'email']);
        return view('cita.index',compact('lista'))->with("servicios", $servicios)->with("usuarios", $usuarios);
    }

    public function consultar(Request $request){

        $id = $request->get('keyword');
        $ser = Servicios::findOrFail($id);
        return response()->json($ser);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /* public function create()
    {
        $servicios = Servicios::all(['id','nombre']);
        $usuarios = User::all(['id','name']);
        return view('cita.create')->with("servicios", $servicios)->with("usuarios", $usuarios);

    } */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $crear = Citas::create($request->all());

        return redirect()->back()->with('crear',$crear);
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //$editar = Citas::findOrFail($id);
        //$servicios = Servicios::all(['id','nombre']);
        /* $usuarios = User::all(['id','name']);
        return view('cita.edit',compact('editar'))->with("servicios", $servicios)->with("usuarios", $usuarios); */

        return view('cita.edit');
    }

    /**z
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(cita $request, $id)
    {
        $citaseditadas= Citas::where('id',$id)->update([
            'fecha'=>request()->input('fecha'),
            'hora'=>request()->input('hora'),
            'descripcion'=>request()->input('descripcion'),
            'Costo'=>request()->input('Costo'),
            'usuario_id'=>request()->input('usuario_id'),
            'servicio_id'=>request()->input('servicio_id'),
            'estado'=>request()->input('estado'),

            'updated_at'=>Carbon::now(),
        ]);
        return redirect()->route('cita.index')->with('citaseditadas',$citaseditadas);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
