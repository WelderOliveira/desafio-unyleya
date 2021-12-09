<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-center">Cadastrar Autor</h1>
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

                        <input type="submit" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

