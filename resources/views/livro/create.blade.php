@section('styles')

@endsection
<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-center">Adicionar Livro</h1>
                    <form action="{{ route('storeLivro') }}" method="POST" name="form" id="form">
                        @csrf
                        <div class="form-group">
                            <label for="titulo">Título:</label>
                            <input type="text" id="titulo" name="titulo" value="{{old('titulo')}}"
                                   class="form-control {{$errors->has('titulo')?'is-invalid':''}}" required>
                        </div>

                        <div class="form-group">
                            <label for="dt_lancamento">Data de Lançamento</label>
                            <input type="date" id="dt_lancamento" name="dt_lancamento" value="{{old('dt_lancamento')}}"
                                   class="form-control {{$errors->has('dt_lancamento')?'is-invalid':''}}" required>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="autor_id">Autor</label>
                                <select id="autor_id" name="autor_id"
                                        class="form-control select-text {{$errors->has('autor_id')?'is-invalid':''}}"
                                        required>
                                    <option selected hidden>Escolha o Autor...</option>
                                    @foreach($autores as $autor)
                                        <option value="{{ $autor->id }}">{{$autor->nome}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="genero_id">Gênero</label>
                                <select id="genero_id" name="genero_id"
                                        class="form-control {{$errors->has('genero_id')?'is-invalid':''}}" required>
                                    <option selected hidden>Escolha o Gênero...</option>
                                    @foreach($generos as $genero)
                                        <option
                                            @if(old('genero_id')==$genero->id) {{'selected="selected"'}} @endif value="{{$genero->id}}">{{$genero->genero}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="editora_id">Editora</label>
                                <select id="editora_id" name="editora_id"
                                        class="form-control {{$errors->has('editora_id')?'is-invalid':''}}" required>
                                    <option selected hidden>Escolha a Editora...</option>
                                    @foreach($editoras as $editora)
                                        <option value="{{$editora->id}}">{{$editora->nome}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-8">
                                <input type="submit" class="btn btn-success" value="Registrar Livro">
                            </div>
                            <div class="col-sm-4">
                                <div class="row">
                                    <div class="col">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAutor" title="Cadastrar Autor">
                                            <i class="fas fa-user-plus"></i>
                                        </button>
                                    </div>
                                    <div class="col">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEditora" title="Cadastrar Editora">
                                            <i class="fas fa-file-contract"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- Modal Autor-->
                    <div class="modal fade" id="modalAutor" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Cadastrar Autor</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('storeAutor') }}" method="POST" name="form" id="form">
                                        @csrf
                                        <div class="form-group">
                                            <label for="nome">Nome:</label>
                                            <input type="text" id="nome" name="nome" value="{{old('nome')}}"
                                                   class="form-control {{$errors->has('nome')?'is-invalid':''}}" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="dt_nascimento">Data de Nascimento</label>
                                            <input type="date" id="dt_nascimento" name="dt_nascimento" value="{{old('dt_nascimento')}}"
                                                   class="form-control {{$errors->has('dt_nascimento')?'is-invalid':''}}" required>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="sexo">Sexo</label>
                                                <select id="sexo" name="sexo" class="form-control select-text" required>
                                                    <option selected hidden>Escolha o seu Sexo...</option>
                                                    <option value="Masculino">Masculino</option>
                                                    <option value="Feminino">Feminino</option>
                                                    <option value="Prefiro Não Informar">Prefiro Não Informar</option>
                                                </select>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="nacionalidade_id">Nacionalidade</label>
                                                <select id="nacionalidade_id" name="nacionalidade_id" class="form-control" required>
                                                    <option selected hidden>Escolha a sua Nacionalidade...</option>
                                                    @foreach($nacionalidades ?? ' ' as $nacionalidade)
                                                        <option value="{{$nacionalidade->id}}">{{$nacionalidade->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                        </div>

                                        <input type="submit" class="btn btn-primary" value="Salvar">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Fim Modal Autor -->
                </div>
                <!-- Modal Editora-->
                <div class="modal fade" id="modalEditora" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Cadastrar Editora</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('storeEditora') }}" method="POST" name="form" id="form">
                                    @csrf
                                    <div class="form-group">
                                        <label for="nome">Nome:</label>
                                        <input type="text" id="nome" name="nome" value="{{old('nome')}}"
                                               class="form-control {{$errors->has('nome')?'is-invalid':''}}" required>
                                    </div>

                                    <input type="submit" class="btn btn-primary" value="Salvar">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Fim Modal Editora -->
            </div>
        </div>
    </div>
</x-app-layout>
