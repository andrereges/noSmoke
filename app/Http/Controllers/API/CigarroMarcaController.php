<?php

namespace App\Http\Controllers\API;

use App\CigarroFiltro;
use App\CigarroMarca;
use App\Http\Controllers\Controller;
use App\Http\Requests\CigarroMarcaResquest;
use App\Http\Resources\CigarroMarcaCollection;
use App\Imagem;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
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
        return new CigarroMarcaCollection(CigarroMarca::with(['imagem', 'filtros'])->paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CigarroMarcaResquest $request)
    {
        try {
            $cigarroMarca = new CigarroMarca();
            $cigarroMarca->nome = $request->nome;
            $cigarroMarca->preco = $request->preco;
            $cigarroMarca->quantidade = $request->quantidade;
            $cigarroMarca->saveOrFail();

            $cigarroMarca->filtros()->saveMany(CigarroFiltro::findOrFail($request->filtros));
            $imagemUpload = $request->file('imagem');

            if ($imagemUpload) {
                $imagem = new Imagem();
                $imagem->nome = $cigarroMarca->nome.'.'.$imagemUpload->extension();
                $cigarroMarca->imagem()->save($imagem);
                Storage::putFileAs(CigarroMarca::CAMINHO_IMAGEM, $imagemUpload, $imagem->nome);
            }
            
            return response()
                ->json(['message' => 'success'], 200)
                ->header('Content-Type', 'application/json');
        } catch (Exception $exception) {
            return response()
                ->json([
                    'message' => $exception->getMessage()
                ], 500)->header('Content-Type', 'application/json');
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
        try {
            return new CigarroMarcaCollection([CigarroMarca::with(['imagem', 'filtros'])->findOrFail($id)]);
        } catch (Exception $exception) {
            return response()
                ->json([
                    'message' => $exception->getMessage()
                ], 404)
                ->header('Content-Type', 'application/json');
        }
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
        try {
            $cigarroMarca = CigarroMarca::findOrFail($id);
            $cigarroMarca->nome = $request->nome;
            $cigarroMarca->preco = $request->preco;
            $cigarroMarca->quantidade = $request->quantidade;
            $cigarroMarca->update();

            $cigarroMarca->filtros()->saveMany(CigarroFiltro::findMany($request->filtros));

            $imagemUpload = $request->file('imagem');

            if ($imagemUpload) {
                Storage::delete(CigarroMarca::CAMINHO_IMAGEM.$cigarroMarca->imagem()->get()->last()->nome);

                $imagem = $cigarroMarca->imagem()->get()->last();
                $imagem->nome = $cigarroMarca->nome.'.'.$imagemUpload->extension();
                $cigarroMarca->imagem()->save($imagem);
                Storage::putFileAs(CigarroMarca::CAMINHO_IMAGEM, $imagemUpload, $imagem->nome);
            } else {
                $imagem = $cigarroMarca->imagem()->get()->last();
                $extensao = array_slice(explode('.', $imagem->nome), -1)[0];
                $oldNome = $imagem->nome;
                $newNome = sprintf('%s.%s', $cigarroMarca->nome, $extensao);
                
                $imagem->nome = $newNome;
                $cigarroMarca->imagem()->save($imagem);

                if ($oldNome != $newNome) {
                    Storage::move(
                        CigarroMarca::CAMINHO_IMAGEM.$oldNome, 
                        CigarroMarca::CAMINHO_IMAGEM.$newNome)
                    ;
                }
            }

            return response()
                ->json(['message' => 'success'], 200)
                ->header('Content-Type', 'application/json');
        } catch (Exception $exception) {
            return response()
                ->json([
                    'message' => $exception->getMessage()
                ], 404)->header('Content-Type', 'application/json');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $cigarroMarca = CigarroMarca::findOrFail($id);

            if ($cigarroMarca->imagem()->get()->first()) {
                Storage::delete(CigarroMarca::CAMINHO_IMAGEM.$cigarroMarca->imagem()->get()->first()->nome);
            }
            
            $cigarroMarca->imagem()->delete();
            $cigarroMarca->filtros()->detach();
            $cigarroMarca->delete();

            return response()
                ->json(['message' => 'success'], 200)
                ->header('Content-Type', 'application/json');
        } catch (ModelNotFoundException $exception) {
            return response()
                ->json([
                    'message' => $exception->getMessage()
                ], 404)->header('Content-Type', 'application/json');
        }
    }
}
