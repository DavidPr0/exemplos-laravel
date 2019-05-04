<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="{{ URL::to('css/app.css')}}" />
	<title></title>
</head>
<body>
	@hasSection('minha_secao_produtos')
	<div class="card">
		<div class="card-body">
			<h5 class="card-title" style="width: 500px;margin: 10px;">Produtos</h5>
			<p class="card-text">@yield('minha_secao_produtos')</p>
			<a href="#" class="card-link">Informações</a>
			<a href="#" class="card-link">Ajuda</a>
		</div>
	</div>
	@endif
	

	<script src="{{ URL::to('js/app.js')}}" type="text/javascript" />
</body>
</html>