<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use App\Models\Editora;
use App\Models\Genero;
use App\Models\Livro;
use Illuminate\Http\Request;

class LivrosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $livros = Livro::all()->sortBy('titulo');
        return view('livro.index', ['livros' => $livros]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $autores = Autor::all()->sortBy('nome');
        $editoras = Editora::all()->sortBy('nome');
        $generos = Genero::all()->sortBy('genero');
        return view('livro.create', ['autores' => $autores, 'editoras' => $editoras, 'generos' => $generos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Livro::$rules);
        Livro::create($request->all());

        return redirect('/')->with('msg', 'Livro Cadastrado com Sucesso');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $livro = Livro::findOrFail($id);
        return view('livro.show',['livro'=>$livro]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $livro = Livro::findOrFail($id);
        $autores = Autor::all()->sortBy('nome');
        $editoras = Editora::all()->sortBy('nome');
        $generos = Genero::all()->sortBy('genero');
        return view('livro.edit', ['livro' => $livro, 'autores' => $autores, 'editoras' => $editoras, 'generos' => $generos]);
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
        request()->validate([
            'titulo'=>'required',
            'dt_lancamento'=>'required',
            'autor_id'=>'required',
            'genero_id'=>'required',
            'editora_id'=>'required'
        ]);

        $livro = Livro::findOrFail($id);
        $livro->titulo = $request->titulo;
        $livro->dt_lancamento = $request->dt_lancamento;
        $livro->autor_id = $request->autor_id;
        $livro->editora_id = $request->editora_id;
        $livro->genero_id = $request->genero_id;
        $livro->update();

        return redirect('/')->with('msg', 'Livro Atualizado com Sucesso');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Livro::findOrFail($id)->delete();
        return back()->with('msg', 'Contato Excluido Com Sucesso');

    }
}
