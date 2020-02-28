<?php

namespace App\Http\Controllers\API;

use App\CigarroMarca;
use App\Http\Controllers\Controller;
use App\Http\Resources\CigarroMarcaCollection;
use App\Imagem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CigarroMarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new CigarroMarcaCollection(CigarroMarca::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cigarroMarca = new CigarroMarca();
        $cigarroMarca->nome = $request->nome;
        $cigarroMarca->preco = $request->preco;
        $cigarroMarca->quantidade = $request->quantidade;
        $cigarroMarca->quantidade = $request->quantidade;

        $imagem = new Imagem();
        $imagem->nome = $cigarroMarca->nome.'_'.now();

        $cigarroMarca->imagem()->save($imagem)->save();
        
        if ($cigarroMarca) {
            $imagemUpload = $request->file('imagem');
            $imagemNome = $imagem->nome.'.'.$imagemUpload->extension();
    
            Storage::putFileAs(CigarroMarca::CAMINHO_IMAGEM, $imagemUpload, $imagemNome);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return CigarroMarca::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
