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
                        <input type="submit" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
