@prepend('styles')
    <style>
        .gradient-custom {
            /* fallback for old browsers */
            background: #f6d365;

            /* Chrome 10-25, Safari 5.1-6 */
            background: -webkit-linear-gradient(to right bottom, rgba(246, 211, 101, 1), rgba(253, 160, 133, 1));

            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            background: linear-gradient(to right bottom, rgba(246, 211, 101, 1), rgba(253, 160, 133, 1))
        }
    </style>
@endprepend
<x-app-layout>
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-lg-6 mb-4 mb-lg-0">
                <div class="card mb-3" style="border-radius: .5rem;">
                    <div class="row g-0">
                        <div class="col-md-4 gradient-custom text-center text-white"
                             style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                            <div class="mt-5">
                                <h5>{{$autor->nome}}</h5>
                                <p>{{$autor->nacionalidade}}</p>
                                <a href="{{route('editAutor', $autor->id)}}"
                                   class="mx-2">
                                    <i class="far fa-edit mb-5"></i></a>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body p-4">
                                <h6>Informações</h6>
                                <hr class="mt-0 mb-4">
                                <div class="row pt-1">
                                    <div class="col-6 mb-3">
                                        <h6>Sexo</h6>
                                        <p class="text-muted">{{$autor->sexo}}</p>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <h6>Data de Nascimento</h6>
                                        <p class="text-muted">{{($autor->dt_nascimento)->format('d/m/Y')}}</p>
                                    </div>
                                </div>
                                <h6>Projects</h6>
                                <hr class="mt-0 mb-4">
                                <div class="row pt-1">
                                    <div class="col-12 mb-3">
                                        @foreach($autor->livros ?? 'Não' as $livro)
                                            <p class="text-muted">{{$livro->titulo ?? 'Nenhum Livro Vinculado ao Autor'}}</p>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

