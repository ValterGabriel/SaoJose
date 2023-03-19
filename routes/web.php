<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('inicio');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/salvar-nome', function (Illuminate\Http\Request $request) {

    $entrada = $request->input('nome');
    $entradas_nomes = explode(",", $entrada);

    if (count($entradas_nomes) > 1) {
        foreach ($entradas_nomes as $key => $nome) {
            $nomes = session('nomes', []);
            $nomes[] = $nome;
            session(['nomes' => $nomes]);
        }
    } else {
        $nomes = session('nomes', []);
        $nomes[] = $entrada;
        session(['nomes' => $nomes]);
    }
    return redirect()->back();
})->name('salvar-nome');


Route::post('/salvar-fruta', function (Illuminate\Http\Request $request) {
    $entrada = $request->input('fruta');

    $entradas_frutas = explode(",", $entrada);

    if (count($entradas_frutas) > 1) {
        foreach ($entradas_frutas as $key => $fruta) {
            $frutas = session('frutas', []);
            $frutas[] = $fruta;
            session(['frutas' => $frutas]);
        }
    } else {
        $frutas = session('frutas', []);
        $frutas[] = $entrada;
        session(['frutas' => $frutas]);
    }


    
    return redirect()->back();
})->name('salvar-fruta');


Route::get('/limpar-nomes', function (Illuminate\Http\Request $request) {
    session()->forget('nomes');
    return redirect()->back();
})->name('limpar-nomes');

Route::get('/limpar-frutas', function (Illuminate\Http\Request $request) {
    session()->forget('frutas');
    return redirect()->back();
})->name('limpar-frutas');

Route::get('/realizar-sorteio', function () {
    return view('realizar-sorteio');
})->name('realizar-sorteio');