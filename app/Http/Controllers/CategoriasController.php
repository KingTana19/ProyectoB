<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use Illuminate\Http\Request;
use App\Http\Requests\categoria as categoriaR;

class CategoriasController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','rol:Administrador']);
    }

    public function index()
    {
        $category = Categorias::orderBy('id','Desc')->get();
        return view('Categorias.index',compact('category'));
    }

    public function store(categoriaR $request)
    {
        $crear = Categorias::create($request->all());
        return redirect()->back()->with('crear',$crear);
    }

    public function edit($id)
    {
        $edit = Categorias::findOrfail($id);
        return view('Categorias.edit')->with('edit',$edit);
    }

    public function update(categoriaR $request, $id)
    {
        $editar = Categorias::findOrfail($id)->update($request->all());
        return redirect('categorias')->with('editar',$editar);
    }

    public function destroy($id)
    {
        $elimi = Categorias::findOrFail($id)->delete();
        return redirect('categorias')->with('elimi',$elimi);
    }
}
