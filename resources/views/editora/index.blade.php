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
                            <th>Nome da Editora</th>
                            <th>Obras</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($editoras as $editora)

                            <tr>

                                <td><a class='a-line' href="{{route('showEditora',$editora->id)}}">{{$editora->nome}}</a></td>
                                <td>
                                    @foreach($editora->livros as $livro)
                                        <a href="{{route('showLivro',$livro->id)}}">{{$livro->titulo}}<br></a>
                                    @endforeach
                                </td>
                                <td class="d-none d-md-table-cell d-flex justify-content-center mb-2">
                                    <div class="row">
                                        <a href="{{route('editEditora', $editora->id)}}"
                                           class="btn btn-outline-primary mx-2">
                                            <i class="fas fa-user-edit"></i></a>
                                        <form action="{{route('destroyEditora',$editora->id)}}" method="POST">
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
                            <th>Nome</th>
                            <th>Obras</th>
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
                    title: 'Você tem certeza que quer excluir essa Editora?',
                    text: "Se você excluir essa Editora, ele não voltará ao menos que o cadastre novamente!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: 'Sim, Excluir Permanente!',
                    cancelButtonText: 'Não, Cancelar!',
                    reverseButtons: true
                }).then((result) =>{
                    if (result.value){
                        if (result.isConfirmed){
                            form.submit();
                        }
                    }
                });
            });
        </script>
    @endpush
</x-app-layout>

