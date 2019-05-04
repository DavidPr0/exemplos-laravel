<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Cliente;
use App\Endereco;
Route::get('/clientes', function () {
    $clientes = Cliente::all();
    foreach ($clientes as $c){
        echo "<p>ID: ".$c->id."</p>";
        echo "<p>Nome: ".$c->nome."</p>";
        echo "<p>Telefone: ".$c->telefone."</p>";
        echo "<p>Rua: ".$c->endereco->rua."</p>";
        echo "<p>Número: ".$c->endereco->numero."</p>";
        echo "<p>Bairro: ".$c->endereco->bairro."</p>";
        echo "<p>Cidade: ".$c->endereco->cidade."</p>";
        echo "<p>Uf: ".$c->endereco->uf."</p>";
        echo "<p>Cep: ".$c->endereco->cep."</p>";

        echo "<hr>";
    }

});
Route::get('/enderecos', function () {
    $ends = Endereco::all();
    foreach ($ends as $e){
        echo "<p>ID cliente: ".$e->cliente_id."</p>";
        echo "<p>Nome: ".$e->cliente->nome."</p>";
        echo "<p>Telefone: ".$e->cliente->telefone."</p>";
        echo "<p>Rua: ".$e->rua."</p>";
        echo "<p>Número: ".$e->numero."</p>";
        echo "<p>Bairro: ".$e->bairro."</p>";
        echo "<p>Cidade: ".$e->cidade."</p>";
        echo "<p>Uf: ".$e->uf."</p>";
        echo "<p>Cep: ".$e->cep."</p>";
        echo "<hr>";
    }

});
Route::get('/inserir', function (){
    $c = new Cliente();
    $c->nome = "David Santos Freitas";
    $c->telefone = "79 99117 1034";
    $c->save();

    $e = new Endereco();
    $e->rua = "7";
    $e->numero = "226";
    $e->bairro = "Bugio";
    $e->cidade = "Aracaju";
    $e->uf = "SE";
    $e->cep = "49090-256";

    $c->endereco()->save($e);

    $c = new Cliente();
    $c->nome = "Davi Felipe Vasconcelos dos Santos";
    $c->telefone = "79 99117 7489";
    $c->save();

    $e = new Endereco();
    $e->rua = "Sete";
    $e->numero = "226";
    $e->bairro = "Jardim centenário";
    $e->cidade = "Aracaju";
    $e->uf = "SE";
    $e->cep = "49090-256";

    $c->endereco()->save($e);
});

//Recuperando dados com Json
Route::get('/clientes/json', function() {
    //$clientes = Cliente::all();

    $clientes = Cliente::with(['endereco'])->get();
    return $clientes->toJson();
});
Route::get('/enderecos/json', function() {
    //$enderecos = Endereco::all();

    $enderecos = Endereco::with(['cliente'])->get();
    return $enderecos->toJson();
});
