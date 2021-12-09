<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-center">Editar Autor</h1>
                    <form action="{{ route('updateAutor', $autor->id) }}" method="POST" name="form" id="form">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="nome">Nome:</label>
                            <input type="text" id="nome" name="nome" value="{{$autor->nome}}"
                                   class="form-control {{$errors->has('nome')?'is-invalid':''}}" required>
                        </div>

                        <div class="form-group">
                            <label for="dt_nascimento">Data de Nascimento</label>
                            <input type="date" id="dt_nascimento" name="dt_nascimento"
                                   value="{{$autor->dt_nascimento->format('Y-m-d')}}"
                                   class="form-control {{$errors->has('dt_nascimento')?'is-invalid':''}}" required>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="sexo">Sexo</label>
                                <select id="sexo" name="sexo"
                                        class="form-control select-text {{$errors->has('sexo')?'is-invalid':''}}"
                                        required>
                                    <option selected value="{{$autor->sexo ?? ''}}">{{$autor->sexo ?? ''}}</option>
                                    <option value="Masculino">Masculino</option>
                                    <option value="Feminino">Feminino</option>
                                    <option value="Prefiro Não Informar">Prefiro Não Informar</option>
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="nacionalidade">Nacionalidade</label>
                                <select id="nacionalidade" name="nacionalidade"
                                        class="form-control {{$errors->has('nacionalidade')?'is-invalid':''}}" required>
                                    <option selected value="{{$autor->nacionalidade->id ?? ''}}">{{$autor->nacionalidade->name ?? ''}}</option>
                                    @foreach($nacionalidades ?? ' ' as $nacionalidade)
                                        <option value="{{$nacionalidade->id}}">{{$nacionalidade->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-sm-8">
                                <input type="submit" class="btn btn-primary" value="Salvar Registros">
                            </div>
                            <div class="col-sm-4 text-right">
                                <a class="btn btn-primary" href="{{route('indexAutor')}}" role="button">Voltar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
