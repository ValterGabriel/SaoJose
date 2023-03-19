<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>Laravel</title>
        @vite(['resources/js/app.js'])

        @php
    $frutas = session('frutas', []);
@endphp

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
                    <h2 class="text-center text-white" style="text-shadow: 2px 2px 2px black">Sorteio de São José</h2>
                    </div>
                </div>
                </div>
            </header>
        </div>  

        <div class="container">
            <h1 class="text-center">Sorteio</h1>
            <div class="d-flex justify-content-center">
                <table class="table" style="width: 250px">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Fruta</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(session('nomes', []) as $key => $nome)
                            <tr>
                                <td>{{ $nome }}</td>
                                <td>{{ $frutas[array_rand(session('frutas', []))]; }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </body>
    <footer>

    </footer>
</html>
