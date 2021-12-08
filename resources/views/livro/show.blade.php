<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="col-md-10 offset-md-1">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card mb-4">
                                    <div class="card-body text-center">
                                        <h5 class="my-3">{{ $livro->titulo }}</h5>
                                        <p class="text-muted mb-1">{{($livro->dt_lancamento)->format('d/m/Y')}}</p>

                                        <div class="d-flex justify-content-center mb-2">
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
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <p class="mb-0">Nome do Autor</p>
                                            </div>
                                            <div class="col-sm-8">
                                                <p class="text-muted mb-0">{{$livro->autors->nome ?? 'Autor Não Cadastrado'}}</p>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <p class="mb-0">Nome do Livro</p>
                                            </div>
                                            <div class="col-sm-8">
                                                <p class="text-muted mb-0">{{ $livro->titulo }}</p>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <p class="mb-0">Lançamento</p>
                                            </div>
                                            <div class="col-sm-8">
                                                <p class="text-muted mb-0">{{ ($livro->dt_lancamento)->format('d/m/Y') }}</p>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <p class="mb-0">Autor</p>
                                            </div>
                                            <div class="col-sm-8">
                                                <p class="text-muted mb-0">{{$livro->autors->nome ?? 'Autor Não Cadastrado'}}  </p>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <p class="mb-0">Editora</p>
                                            </div>
                                            <div class="col-sm-8">
                                                <p class="text-muted mb-0">{{$livro->editora->nome ?? 'Editora Não Cadastrado'}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script type="text/javascript">

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
