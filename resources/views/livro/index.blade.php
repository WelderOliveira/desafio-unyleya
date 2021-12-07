@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
@endsection
<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table id="myTable" class="table table-bordered table-striped table-dark">
                        <thead>
                        <tr>
                            <th>Titulo</th>
                            <th>Autor</th>
                            <th>Genero</th>
                            <th>Editora</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($livros as $livro)

                            <tr>
                                <td>{{$livro->titulo}}</td>
                                <td>{{$livro->autors->nome}}</td>
                                <td>{{$livro->genero->genero}}</td>
                                <td>{{$livro->editora->nome}}</td>
                                <td class="d-none d-md-table-cell d-flex justify-content-center mb-2">
                                    <div class="row">
                                        <a href="{{route('editLivro', $livro->id)}}"
                                           class="btn btn-outline-primary mx-2">
                                            <i class="fas fa-user-edit"></i></a>
                                        <form action="{{route('destroyLivro',$livro->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger mx-2">
                                                <i class="far fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Titulo</th>
                            <th>Autor</th>
                            <th>Genero</th>
                            <th>Editora</th>
                            <th>Actions</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@section('js')

    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>

    <script type="text/javascript">

        $(document).ready(function () {
            $('#myTable').DataTable();
        });

    </script>
@endsection
</x-app-layout>

