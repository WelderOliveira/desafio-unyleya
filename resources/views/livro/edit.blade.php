@section('styles')

@endsection
<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-center">Editar Livro</h1>
                    <form action="{{ route('updateLivro', $livro->id) }}" method="POST" name="form" id="form">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="titulo">Título:</label>
                            <input type="text" id="titulo" name="titulo" value="{{$livro->titulo}}" class="form-control {{$errors->has('titulo')?'is-invalid':''}}" required>
                        </div>

                        <div class="form-group">
                            <label for="dt_lancamento">Data de Lançamento</label>
                            <input type="date" id="dt_lancamento" name="dt_lancamento" value="{{$livro->dt_lancamento}}" class="form-control {{$errors->has('dt_lancamento')?'is-invalid':''}}" required>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="autor_id">Autor</label>
                                <select id="autor_id" name="autor_id" class="form-control select-text {{$errors->has('autor_id')?'is-invalid':''}}" required>
                                    <option selected value="{{$livro->autors->id}}">{{$livro->autors->nome}}</option>
                                    @foreach($autores as $autor)
                                        <option value="{{ $autor->id }}">{{$autor->nome}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="genero_id">Gênero</label>
                                <select id="genero_id" name="genero_id" class="form-control {{$errors->has('genero_id')?'is-invalid':''}}" required>
                                    <option selected value="{{$livro->genero->id}}">{{$livro->genero->genero}}</option>
                                    @foreach($generos as $genero)
                                        <option  @if(old('genero_id')==$genero->id) {{'selected="selected"'}} @endif value="{{$genero->id}}">{{$genero->genero}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="editora_id">Editora</label>
                                <select id="editora_id" name="editora_id" class="form-control {{$errors->has('editora_id')?'is-invalid':''}}" required>
                                    <option selected value="{{$livro->editora->id}}">{{$livro->editora->nome}}</option>
                                    @foreach($editoras as $editora)
                                        <option value="{{$editora->id}}">{{$editora->nome}}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>

                        <input type="submit" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
