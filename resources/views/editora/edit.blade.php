<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-center">Editar Livro</h1>
                    <form action="{{ route('updateEditora', $editora->id) }}" method="POST" name="form" id="form">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="nome">Nome:</label>
                            <input type="text" id="nome" name="nome" value="{{$editora->nome}}"
                                   class="form-control {{$errors->has('nome')?'is-invalid':''}}" required>
                        </div>
                        <div class="row">
                            <div class="col-sm-8">
                                <input type="submit" class="btn btn-primary" value="Salvar Registros">
                            </div>
                            <div class="col-sm-4 text-right">
                                <a class="btn btn-primary" href="{{route('indexEditora')}}" role="button">Voltar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
