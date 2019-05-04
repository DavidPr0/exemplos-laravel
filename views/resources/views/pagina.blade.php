<!DOCTYPE html>
<html>
<head>
	<!-- <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css')}}" /> -->
	<link rel="stylesheet" type="text/css" href="{{ URL::to('css/app.css')}}" />
	<title></title>
</head>
<body>
	
	@alerta(['tipo'=>'danger', 'titulo'=>'Erro fatal'])
		<strong>Error: </strong> meu componente.
	@endalerta

	@alerta()
		<strong>Error: </strong> meu componente.
		@slot('titulo')
			Erro fatal
		@endslot
		@slot('tipo')
			danger
		@endslot
	@endalerta
	<!-- <script src="{{ asset('js/app.js')}}" type="text/javascript" /> -->
	<script src="{{ URL::to('js/app.js')}}" type="text/javascript" />
</body>
</html>