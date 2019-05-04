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
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('welcome');
});

/**********************************
****Recuperando dado da tabela*****
**********************************/

Route::get('/categorias', function(){
	/* Aqui recupera todos os dados*/
	$cats = DB::table('categorias')->get();
	foreach ($cats as $c) {
		echo "id: ". $c->id .";";
		echo " nome: ". $c->nome ."<br>";
	}
	echo "<hr>";
	/* Aqui recupera todos os dados da**** 
	tabela sentando os atributos que quer*
	pegar********************************/
	$nomes = DB::table('categorias')->pluck('nome');
	foreach ($nomes as $nome) {
		echo "$nome <br>";
	}
	echo "<hr>";
	
	$cats = DB::table('categorias')->where('id',1)->get();
	foreach ($cats as $c) {
		echo "id: ". $c->id .";";
		echo " nome: ". $c->nome ."<br>";
	}
	/* Para recuperar um único elemento*/
	echo "<hr>";
	
	$cats = DB::table('categorias')->where('id',1)->first();
	
		echo "id: ". $cats->id .";";
		echo " nome: ". $cats->nome ."<br>";
	echo "<hr>";

	echo "<p>Retorna um array utilizando like</p>";
	$cats = DB::table('categorias')->where('nome','like','%p%')->get();
	foreach ($cats as $c) {
		echo "id: ". $c->id .";";
		echo " nome: ". $c->nome ."<br>";
	}
	echo "<hr>";

	echo "<p>Centenças lógicas</p>";
	$cats = DB::table('categorias')->where('id',1)->orWhere('id',2)->get();
	foreach ($cats as $c) {
		echo "id: ". $c->id .";";
		echo " nome: ". $c->nome ."<br>";
	}
	echo "<hr>";

	echo "<p>Intervalos</p>";
	$cats = DB::table('categorias')->whereBetween('id',[1,2])->get();
	foreach ($cats as $c) {
		echo "id: ". $c->id .";";
		echo " nome: ". $c->nome ."<br>";
	}
	echo "<hr>";

	echo "<p>Negação</p>";
	$cats = DB::table('categorias')->whereNotBetween('id',[1,2])->get();
	foreach ($cats as $c) {
		echo "id: ". $c->id .";";
		echo " nome: ". $c->nome ."<br>";
	}
	echo "<hr>";

	echo "<p>pegar arquivo expecífico (Conjunto)</p>";
	$cats = DB::table('categorias')->whereIn('id',[1,3,4])->get();
	foreach ($cats as $c) {
		echo "id: ". $c->id .";";
		echo " nome: ". $c->nome ."<br>";
	}
	echo "<hr>";
	echo "<p>pegar arquivo expecífico (Conjunto)</p>";
	$cats = DB::table('categorias')->whereNotIn('id',[1,3,4])->get();
	foreach ($cats as $c) {
		echo "id: ". $c->id .";";
		echo " nome: ". $c->nome ."<br>";
	}
	echo "<hr>";
	echo "<p>Sentenças lógicas</p>";
	$cats = DB::table('categorias')->where([
		['id',1],
		['nome','Roupa']
	])->get();
	foreach ($cats as $c) {
		echo "id: ". $c->id .";";
		echo " nome: ". $c->nome ."<br>";
	}
	echo "<hr>";
	echo "<p>Ordenar por nome</p>";
	$cats = DB::table('categorias')->orderBy('nome')->get();
	foreach ($cats as $c) {
		echo "id: ". $c->id .";";
		echo " nome: ". $c->nome ."<br>";
	}
	echo "<hr>";
	echo "<p>Ordenar por nome (decrescente)</p>";
	$cats = DB::table('categorias')->orderBy('nome','desc')->get();
	foreach ($cats as $c) {
		echo "id: ". $c->id .";";
		echo " nome: ". $c->nome ."<br>";
	}
});

Route::get('/novascategorias', function(){
	$id = DB::table('categorias')->insertGetId(
		['nome'=>'Avião']
	);
	echo "Novo ID = $id <br>";
	echo "<hr>";
});

Route::get('/atualizandocategorias', function(){
	$cats = DB::table('categorias')->where('id',1)->first();
	echo "<p>Antes da atualçização</p>";
	echo "id: ". $cats->id .";";
	echo " nome: ". $cats->nome ."<br>";
	$cats = DB::table('categorias')->where('id',1)->update(['nome'=>'Roupas Infantis']);
	$cats = DB::table('categorias')->where('id',1)->first();
	echo "<p>Depois da atualçização</p>";
	echo "id: ". $cats->id .";";
	echo " nome: ". $cats->nome ."<br>";
	echo "<hr>";
});

Route::get('/removendocategorias', function(){
	echo "<p>Antes da remoção</p>";
	$cats = DB::table('categorias')->get();
	foreach ($cats as $c) {
		echo "id: ". $c->id .";";
		echo " nome: ". $c->nome ."<br>";
	}
	echo "<hr>";

	// DB::table('categorias')->where('id',1)->delete();
	DB::table('categorias')->whereNotIn('id',[1,2,3,4,5,6])->delete();


	echo "<p>Depois da remoção</p>";
	$cats = DB::table('categorias')->get();
	foreach ($cats as $c) {
		echo "id: ". $c->id .";";
		echo " nome: ". $c->nome ."<br>";
	}
	
});