@prepend('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
@endprepend
<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table id="myTable" class="table table-striped table-bordered">
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

                                <td><a class='a-line' href="{{route('showLivro',$livro->id)}}">{{$livro->titulo}}</a>
                                </td>
                                <td>{{$livro->genero->genero ?? 'Gênero Não Cadastrado'}}</td>
                                <td><a class='a-line'
                                       href="@if($livro->autors){{route('showAutor',$livro->autors->id)}}@else#@endif">{{$livro->autors->nome ?? 'Autor Não Cadastrado'}}</a>
                                </td>
                                <td><a class='a-line'
                                       href="@if($livro->editora){{route('showEditora',$livro->editora->id)}}@else#@endif">{{$livro->editora->nome ?? 'Editora Não Cadastrado'}}
                                </td>
                                <td class="d-none d-md-table-cell d-flex justify-content-center mb-2">
                                    <div class="row">
                                        <a href="{{route('editLivro', $livro->id)}}"
                                           class="btn btn-outline-primary mx-2">
                                            <i class="fas fa-user-edit"></i></a>
                                        <form action="{{route('destroyLivro',$livro->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger mx-2 verifica">
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
    @push('scripts')
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>

        <script type="text/javascript">

            $('#myTable').DataTable();

            $('.verifica').click(function (event) {
                var form = $(this).closest("form");
                event.preventDefault();
                Swal.fire({
                    title: 'Você tem certeza que quer excluir esse livro?',
                    text: "Se você excluir esse livro, ele não voltará ao menos que o cadastre novamente!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: 'Sim, Excluir Permanente!',
                    cancelButtonText: 'Não, Cancelar!',
                    reverseButtons: true
                }).then((result) => {
                    if (result.value) {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    }
                });
            });
        </script>
    @endpush
</x-app-layout>

