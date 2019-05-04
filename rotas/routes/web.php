<?php

use Illuminate\Http\Request;

Route::get('/hello', function () {
    return '<h1>Hello World</h1>';
});
Route::get('/', function () {
    return view("welcome");
});

Route::get('/nome/{nome}', function($nome){
	return "<h1>Olá, $nome!</h1>";
});
Route::get('/nome/{nome}/{sobrenome}', function($nome, $sn ){
	return "<h1>Olá, $nome $sn!</h1>";
});
Route::get('/repetir/{nome}/{n}', function($nome, $n ){
	if(is_integer($n)) {
		for ($i=0; $i < $n; $i++) { 
			echo "<h1>Olá, $nome!</h1>";
		}
	}
	else
		echo "Você não digitou um inteiro.";
	
	// return "<h1>Olá, $nome $sn!</h1>";
});

Route::get('/seunomecomregra/{nome}/{n}', function($nome, $n ){
	for ($i=0; $i < $n; $i++) { 
			echo "<h1>Olá, $nome! ($i) </h1>";
		}
})->where('n','[0-9]+')->where('nome','[A-Za-z]+');

Route::get('/semnomecomregra/{nome?}', function($nome=null ){
	if (isset($nome)) {
		echo "<h1>Olá, $nome! </h1>";
	}else{
		echo "Você não passou nenhum nome.";
	}
});

// Agrupando rotas
Route::prefix('app')->group(function(){
	Route::get("/", function(){
		return "Página principal do App.";
	});
	Route::get("profile", function(){
		return "Página profile.";
	});
	Route::get("about", function(){
		return "Meu about.";
	});
});

Route::redirect('/aqui', 'hello', 301);

Route::view('/hello', 'hello');

Route::view('/viewnome', 'hellonome', ['nome'=>'David', 'sobrenome'=>'Santos']);

Route::get('/hellonome/{nome}/{sobrenome}', function($nome, $sn){
	return view('hellonome', ['nome'=> $nome, 'sobrenome'=> $sn]);
});

Route::get('rest/hello', function(){
	return "Hello (GET)";
});
Route::post('rest/hello', function(){
	return "Hello (POST)";
});
Route::delete('rest/hello', function(){
	return "Hello (DELETE)";
});
Route::put('rest/hello', function(){
	return "Hello (PUT)";
});
Route::patch('rest/hello', function(){
	return "Hello (PATCH)";
});
Route::options('rest/hello', function(){
	return "Hello (OPTIONS)";
});
Route::post('rest/imprimir', function(Request $req ){
	$nome = $req->input('nome');
	return "Hello $nome (POST)";
});
Route::match(['get','post'],'/rest/hello2', function(){
	return "Hello World 2";
});
Route::any('/rest/hello3', function(){
	return "Hello World 3";
});
Route::get('/produtos', function(){
	echo "<h1>Produtos</h1>";
	echo "<ol>";
	echo "<li>Notebook</li>";
	echo "<li>Impressora</li>";
	echo "<li>Mouse</li>";
	echo "</ol>";
})->name("meusprodutos");
Route::get('/linkprodutos', function(){
	$url = route('meusprodutos');
	echo "<a href=\"".$url."\">Meus produtos</a>";
});
Route::get('/redirecionarprodutos', function(){
	return redirect()->route('meusprodutos');
});