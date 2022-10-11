<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProdutoResource;
use App\Http\Requests\StoreProdutoRequest;
use Illuminate\Support\Str;

class ProdutoController extends Controller
{
    public function index(Request $request){
        $input = $request->input('pagina');

        $query = Produto::with('categoria', 'marca');
        if($input){
            $page = $input;
            $perPage = 10;
            $query->offset(($page-1) * $perPage->limit($perPage));
            $produtos = $query->get();

            $recordsTotal = Produto::count();
            $numberOfPages = ceil($recordsTotal / $perPage);
            $response = response()->json([
                'status' => 200,
                'mensagem' => 'Lista de produtos retornada',
                'produtos' => ProdutoResource::collection($produto),
                'meta' => [
                    'total_numero_de_registros' => (string) $recordsTotal,
                    'numero_de_registros_por_pagina' => (string) $perPage,
                    'numero_de_paginas' => (string) $numberOfPages,
                    'pagina_atual' => $page
                ]
            ], 200);

        }

    }
}
