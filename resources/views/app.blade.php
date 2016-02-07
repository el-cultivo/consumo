<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <title>@yield('title') | $$$</title>
    <link rel="stylesheet" href="{{ URL::to('css/app.css') }}">
</head>
    <body class="">
        <div class="container">
		    <div class="row feedback">
		    	@include('_feedback')
		    </div>
		    <div class="row titulo">
		        <h1><span class="fa fa-money"></span>@yield('h1')</h1>
		    </div>

		    <div class="row contenido">
				@include('_menu')
				@yield('informacion')
		        
		        @yield('principal')

		    </div>
        </div>
    </body>
</html>
