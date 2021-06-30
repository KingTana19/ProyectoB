<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Productos;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Http\Requests\producto as productoR;
use App\Models\Categorias;

class ProductoController extends Controller
{
    public function __construct(){
        $this->middleware(['auth','rol:Administrador']);
     }

     public function index()
     {
         $productos = Productos::orderBy('id','Desc')->get();
         $catego = Categorias::all(['id','nombre']);
         return view('Productos.index')->with('productos',$productos)->with('catego',$catego);
     }


     public function create()
     {
         return view('crud.create');
     }

     public function show($id)
    {
        //
    }

     public function store(productoR $request)
     {
         $rura = $request['imagen']->store('imagenes','public');//Creamos esta linea para guarda las imagenes una
         //carpeta storange/app/nombre carpeta

         $productos = Productos::insert([
             'Codigo'=>request()->input('Codigo'),
             'Nombre'=>request()->input('Nombre'),
             'Descripcion'=>request()->input('Descripcion'),
             'Costo'=>request()->input('Costo'),
             'categoria_id'=>request()->input('categoria_id'),
             'imagen'=>$rura,
             'estado'=>'activo',
             'created_at'=>Carbon::now(),
         ]);
         return redirect()->route('productos.index')->with('productos',$productos);
     }

     public function edit($id)
     {
         $editar = Productos::findOrFail($id);
         $catego = Categorias::all(['id','nombre']);
         return view('Productos.editar',compact('catego'))->with('editar',$editar);
     }

     public function update(productoR $request,$id)
     {
         /* if (request('imagen')) {
             $ruta = $request['imagen']->store('update-productos','public');
             $img = Image::make(public_path("storage/{$ruta}"));
             $img->save();
         } */

         $productoseditados= Productos::where('id',$id)->update([
             'Codigo'=>request()->input('Codigo'),
             'Nombre'=>request()->input('Nombre'),
             'Descripcion'=>request()->input('Descripcion'),
             'Costo'=>request()->input('Costo'),
             'categoria_id'=>request()->input('categoria_id'),
             'imagen'=>request()->input('imagen'),
             'estado'=>request()->input('estado'),

             'updated_at'=>Carbon::now(),
         ]);
         return redirect()->route('productos.index')->with('productoseditados',$productoseditados);
     }

     public function destroy($id)
     {
         $producto= Productos::findOrFail($id)->delete();
         return redirect('/productos')->with('producto',$producto);
     }

}
