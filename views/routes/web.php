<?php

Route::get('/', function () {
    return view('pagina');
});
Route::get('/primeiraview', function(){
	return view('minhaview');
});

Route::get('/ola/{nome}/{sobrenome}', function($nome, $sobrenome){
	// primeira forma de fazer array
	// return view('minhaview')->with('nome', $nome)->with('sobrenome', $sobrenome);
	 
	 // segunda forma de fazer array
	// $parametro = ['nome'=>$nome, 'sobrenome'=>$sobrenome];
	// return view('minhaview',$parametro);
	
	// terceira forma de fazer um array
	return view('minhaview', compact('nome','sobrenome'));
});

Route::get('/email/{email}', function($email){
	// Verifica se uma View existe
	if (View::exists('email'))
		return view('email', compact('email'));
	else
		return view('erro');
});

Route::get('/produtos', 'ProdutoControlador@listar');
Route::get('/secaoprodutos/{palavra}', 'ProdutoControlador@secaoprodutos');

Route::get('/mostraropcoes', 'ProdutoControlador@mostrar_opcoes');

Route::get('opcoes/{opcao}', 'ProdutoControlador@opcoes');

Route::get('/loop/for/{n}', 'ProdutoControlador@loopFor');

Route::get('/loop/foreach', 'ProdutoControlador@loopForeach');