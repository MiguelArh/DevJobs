<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Vacante;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function show(Categoria $categoria){

        $vacantes = Vacante::where('categoria_id', $categoria->id)->where('activa', true)->paginate(10);

        //dd($vacantes);
        return view('categorias.show', compact('vacantes', 'categoria'));

    }
}
