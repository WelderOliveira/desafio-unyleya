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
                                <h5>Editora : {{$editora->nome}}</h5>
                                <a href="{{route('editEditora', $editora->id)}}"
                                   class="mx-2">
                                    <i class="far fa-edit mb-5"></i></a>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body p-4">
                                <h6>{{count($editora->livros)}} - Projeto</h6>
                                <hr class="mt-0 mb-4">
                                <div class="row pt-1">
                                    <div class="col-12 mb-3">
                                        @foreach($editora->livros as $livro)
                                            <p class="text-muted">
                                                <a href="{{route('showLivro',$livro->id)}}">{{$livro->titulo ?? 'Nenhum Livro Vinculado a Editora'}}</a>
                                            </p>
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

