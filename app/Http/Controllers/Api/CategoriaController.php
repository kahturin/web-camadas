<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoriaResource;
use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoriaRequest;


class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();

        return response() -> json([
            'status' => 200,
            'mensagem' => 'Lista de categorias retornada',
            'categorias' => CategoriaResource::collection($categorias)
        ], 200);
    }

    public function create()
    {
        //
    }

    public function store(StoreCategoriaRequest $request)
    {
        $categoria = new Categoria();
        $categoria->nomedacategoria = $request->nome_da_categoria;
        $categoria->save();

        return response() -> json([
            'status' => 200,
            'mensagem' => 'Categoria criada',
            'categorias' => new CategoriaResource($categoria)
        ], 200);
    }

    public function show(Categoria $categoria)
    {
        //
    }

    public function edit(Categoria $categoria)
    {
        //
    }

    public function update(Request $request, Categoria $categoria)
    {
        //
    }

    public function destroy(Categoria $categoria)
    {
        //
    }
}
