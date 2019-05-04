<!DOCTYPE html>
<html>
<head>
	<!-- <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css')}}" /> -->
	<link rel="stylesheet" type="text/css" href="{{ URL::to('css/app.css')}}" />
	<title></title>
</head>
<body>
	@if(isset($produtos))

		@if(count($produtos) == 0)
			<h1>Nenhum produto</h1>
		@elseif(count($produtos) === 1)
			<h1>Um produto</h1>
		@else
			<h1>Temos vários produtos</h1>
		@endif
		
		@foreach($produtos as $p)
			<p>Nome: {{$p}}</p>
		@endforeach

	@else
		<h2>Variável produtos não foi passada como parametro.</h2>
	@endif

	<!-- <script src="{{ asset('js/app.js')}}" type="text/javascript" /> -->
	<script src="{{ URL::to('js/app.js')}}" type="text/javascript" />
</body>
</html>