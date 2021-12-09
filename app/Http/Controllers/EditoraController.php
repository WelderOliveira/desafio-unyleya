<?php

namespace App\Http\Controllers;

use App\Models\Editora;
use App\Models\Livro;
use Illuminate\Http\Request;

class EditoraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $editoras = Editora::all()->sortBy('nome');
        return view('editora.index', ['editoras' => $editoras]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('editora.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Editora::$rules);
        Editora::create($request->all());

        return back()->with('msg', 'Editora Cadastrada com Sucesso!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $editora = Editora::findOrFail($id);
        $obras = Livro::where('autor_id', $id)->get();
        return view('editora.show', ['editora' => $editora, 'obras' => $obras]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editora = Editora::findOrFail($id);
        return view('editora.edit', ['editora' => $editora]);
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
        request()->validate(Editora::$rules);

        $editora = Editora::findOrFail($id);
        $editora->nome = $request->nome;
        $editora->update();

        return redirect('/')->with('msg', 'Editora Atualizado com Sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Editora::findOrFail($id)->delete();
        return back()->with('msg', 'Editora Excluido Com Sucesso');
    }
}
