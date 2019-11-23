<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Laravel') }}</title>

	<!-- Scripts -->
	<script src="{{ asset('js/app.js') }}" defer></script>

	<!-- Fonts -->
	<link rel="dns-prefetch" href="//fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css?family=Nunito|Source+Code+Pro|IBM+Plex+Mono|Raleway:300&display=swap" rel="stylesheet">

	<!-- Styles -->
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('css/wb.css') }}" rel="stylesheet">
	
	<div id="loadOverlay" style="background-color:#002200; position:absolute; top:0px; left:0px; width:100%; height:100%; z-index:2000;"></div>

	</head>


<body>
    <div id="app">
		<div class="container">
			<main class="py-4">
				@yield('content')
			</main>
		</div>
	</div>
</body>
</html>
