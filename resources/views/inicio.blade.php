<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>Laravel</title>
        @vite(['resources/js/app.js'])
        <style >
            .imagemHead{
                height: 250px !important;
                background-position-y: 25%;
                background-position-x: 50%;
                background-repeat: no-repeat;
                background-image: url(https://www.iquilibrio.com/blog/wp-content/uploads/2017/03/sao_jose_blog.jpg);
            }
        </style>
    </head>
    <body>
       
        <div class="container">
            <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">                
                <div class="container">
                <div class="card bg-image imagemHead">
                    <div class="card-body d-flex justify-content-center align-items-center">
                    <h2 class="text-center text-white" style="text-shadow: 2px 2px 2px black">Sorteio de São José Familia Porcari</h2>
                    </div>
                </div>
                </div>
            </header>
        </div>
        <div class="container">
            <div class="m-5 text-center">
            <a href="{{ route('realizar-sorteio') }}" class="btn btn-info text-white btn-lg {{ empty(session( 'nomes' )) ||  empty(session( 'frutas' )) ? 'disabled' : '' }}" {{ empty(session( 'nomes' )) ||  empty(session( 'frutas' )) ? 'disabled' : '' }}>Realizar Sorteio</a>
            </div>
            <div class="row">
                <div class="col">
                    <form method="post" action="{{ route('salvar-nome') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome</label>
                            <input type="text" class="form-control" id="nome" name="nome" required="true">
                        </div>
                        <button type="submit" class="btn btn-primary">Adicionar Nome</button>
                        <a href="{{ route('limpar-nomes') }}" class="btn btn-primary">Limpar Nomes</a>
                    </form>
                </div>
                <div class="col">
                    <form method="post" action="{{ route('salvar-fruta') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="fruta" class="form-label">Fruta</label>
                            <input type="text" class="form-control" id="fruta" name="fruta" required="true">
                        </div>
                        <button type="submit" class="btn btn-primary">Adicionar Fruta</button>
                        <a href="{{ route('limpar-frutas') }}" class="btn btn-primary">Limpar Frutas</a>
                    </form>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col">
                    @if(!empty(session('nomes')))
                        <h2>Nomes adicionados:</h2>
                        <ul>
                            @foreach(session('nomes', []) as $nome)
                                <li>{{ $nome }}</li>
                            @endforeach
                        </ul>
                    @else
                        <h2>Não foram adicionadas Nomes ainda</h2>
                    @endif
                </div>
                <div class="col">
                    @if(!empty(session('frutas')))
                        <h2>Frutas adicionados:</h2>
                        <ul>
                            @foreach(session('frutas', []) as $fruta)
                                <li>{{ $fruta }}</li>
                            @endforeach
                        </ul>
                    @else
                        <h2>Não foram adicionadas Frutas ainda</h2>
                    @endif
                </div>
            </div>
        </div>
    </body>
    <footer>

    </footer>
</html>
