<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use App\Models\Livro;
use App\Models\Nacionalidade;
use Illuminate\Http\Request;

class AutorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $autores = Autor::all()->sortBy('nome');
        return view('autor.index', ['autores' => $autores]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nacionalidades = Nacionalidade::all();
        return view('autor.create',['nacionalidades'=>$nacionalidades]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Autor::$rules);
        Autor::create($request->all());

        return redirect('/autor')->with('msg', 'Autor Cadastrado com Sucesso!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $autor = Autor::findOrFail($id);
        $obras = Livro::where('autor_id', $id)->get();
        return view('autor.show', ['autor' => $autor, 'obras' => $obras]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $autor = Autor::findOrFail($id);
        $nacionalidades = Nacionalidade::all();
        return view('autor.edit', ['autor' => $autor,'nacionalidades'=>$nacionalidades]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate(Autor::$rules);

        $autor = Autor::findOrFail($id);
        $autor->nome = $request->nome;
        $autor->dt_nascimento = $request->dt_nascimento;
        $autor->sexo = $request->sexo;
        $autor->nacionalidade = $request->nacionalidade;
        $autor->update();

        return redirect('/')->with('msg', 'Autor Atualizado com Sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $autor = Autor::findOrFail($id)->delete();
        return back()->with('msg', 'Autor Excluido Com Sucesso');
    }
}
