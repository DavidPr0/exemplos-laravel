<?php

	use App\Categoria;

Route::get('/', function () {
    $categorias = Categoria::all();
    foreach ($categorias as $c) {
    	echo "id: ". $c->id. ", ";
    	echo "Nome: ". $c->nome. "<br> ";
    }
});
Route::get('/inserir/{nome}', function($nome){
	$cat = new Categoria();
	$cat->nome = $nome;
	$cat->save();

	// Cadastea e lista
	return redirect('/');
});

Route::get('/categoria/{id}', function($id){
	$cat = Categoria::find($id);
	if (isset($cat)) {
		echo "id: ". $cat->id. ", ";
    	echo "Nome: ". $cat->nome. "<br> ";
	}else{
		echo "<h1>Categoria não encontrada!</h1>";
	}
	
});
Route::get('/atualizar/{id}/{nome}', function($id, $nome){
	$cat = Categoria::find($id);
	if (isset($cat)) {
    	$cat->nome = $nome;
    	$cat->save();

    	return redirect('/');

	}else{
		echo "<h1>Categoria não encontrada!</h1>";
	}
	
});
Route::get('/remover/{id}', function($id){
	$cat = Categoria::find($id);
	if (isset($cat)) {
    	$cat->delete();

    	return redirect('/');

	}else{
		echo "<h1>Categoria não encontrada!</h1>";
	}
	
});
Route::get('/categoriapornome/{nome}', function($nome){
	$categorias = Categoria::where('nome',$nome)->get();
	foreach ($categorias as $c) {
    	echo "id: ". $c->id. ", ";
    	echo "Nome: ". $c->nome. "<br> ";
    }
	
});
Route::get('/categoriamaiorque/{id}', function($id){
	$categorias = Categoria::where('id','>=',$id)->get();
	foreach ($categorias as $c) {
    	echo "id: ". $c->id. ", ";
    	echo "Nome: ". $c->nome. "<br> ";
    }
    // Contador
	$count = Categoria::where('id','>=',$id)->count();
	echo "<h1>Count: $count </h1>";
	// Id maximo
	$max = Categoria::where('id','>=',$id)->max('id');
	echo "<h1>Máximo: $max </h1>";
});
Route::get('/ids123', function(){
	$categorias = Categoria::find([1,2,3]);
	foreach ($categorias as $c) {
    	echo "id: ". $c->id. ", ";
    	echo "Nome: ". $c->nome. "<br> ";
    }
	
});
// lista todos arquivos do banco inclusive os apagados
Route::get('/todas', function () {
    $categorias = Categoria::withTrashed()->get();
    foreach ($categorias as $c) {
    	echo "id: ". $c->id. ", ";
    	echo "Nome: ". $c->nome;

    	if ($c->trashed())
    		echo "(apagado)<br>";
    	else
    		echo "<br>";
    }
});
// recupera o item apagado
Route::get('/ver/{id}', function($id){
	// $cat = Categoria::withTrashed()->find($id); funciona dos dois modos(formas)
	$cat = Categoria::withTrashed()->where('id',$id)->get()->first();
	if (isset($cat)) {
		echo "id: ". $cat->id. ", ";
    	echo "Nome: ". $cat->nome. "<br> ";
	}else{
		echo "<h1>Categoria não encontrada!</h1>";
	}
	
});
// lista apenas os apagados
Route::get('/somenteapagados', function () {
    $categorias = Categoria::onlyTrashed()->get();
    foreach ($categorias as $c) {
    	echo "id: ". $c->id. ", ";
    	echo "Nome: ". $c->nome;

    	if ($c->trashed())
    		echo "(apagado)<br>";
    	else
    		echo "<br>";
    }
});
Route::get('/restaurar/{id}', function($id){
	$cat = Categoria::withTrashed()->find($id);
	if (isset($cat)) {
		$cat->restore();
		echo "Categoria restaurada: ". $cat->id. "<br>";
    	echo "<a href=\"/\">Listar todas</a>";
	}else{
		echo "<h1>Categoria não encontrada!</h1>";
	}
	
});

Route::get('/apagarpermanente/{id}', function($id){
	$cat = Categoria::withTrashed()->find($id);
	if (isset($cat)) {
		$cat->forceDelete();
		return redirect('/todas');
	}else{
		echo "<h1>Categoria não encontrada!</h1>";
	}
	
});