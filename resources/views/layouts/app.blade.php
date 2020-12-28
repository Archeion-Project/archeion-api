<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<title>{{ config('app.name', 'Laravel') }}</title>

		<!-- Scripts -->
		<script
			  src="https://code.jquery.com/jquery-3.5.1.js"
			  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
			  crossorigin="anonymous"></script>
		<script src="{{ asset('js/app.js') }}" defer></script>

		<!-- Fonts -->
		<link rel="dns-prefetch" href="//fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css?family=Nunito|Source+Code+Pro|IBM+Plex+Mono|Raleway:300&display=swap" rel="stylesheet">

		<!-- Styles -->
		<link href="{{ asset('css/app.css') }}" rel="stylesheet">
		<link href="{{ asset('css/wb.css') }}" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		
	</head>

	<body>
		<div id="app">

				{!! view('blocos.navbar') !!}

				@yield('content')

				{!! view('componentes.footer') !!}
			
		</div>

	</body>

	<script>

		$(document).ready(function() {
		/**
		* for showing edit item popup
		*/
			$('#editar-modal').on('shown.bs.modal', function (event) {

				var button = $(event.relatedTarget) // Button that triggered the modal
				var recipient = button.data('whatever') // Extract info from data-* attributes
				// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
				console.log(recipient)
				// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
				var modal = $(this)

				modal.find('#modal-assunto').val(recipient.assunto)
				modal.find('#modal-periodico').val(recipient.periodico)
				modal.find('#modal-data_edicao').val(recipient.data_edicao)
				modal.find('#modal-duracao_edicao').val(recipient.duracao_edicao)
				modal.find('#modal-pagina').val(recipient.pagina)
				modal.find('#modal-resumo').val(recipient.resumo)
				modal.find('#modal-comentario').val(recipient.comentario)

			})

			// $(document).on('click', '#editar-item-grid', function (event) {

			// 	$(this).addClass('edit-item-trigger-clicked'); //useful for identifying which trigger was clicked and consequently grab data from the correct row and not the wrong one.

			// 	var options = {
			// 		'backdrop': 'static'
			// 	};

			// 	$('#editar-modal').modal(options)

			// })

			// // on modal show
			// $('#editar-modal').on('shown.bs.modal', function() {
			// 	var el = $(".edit-item-trigger-clicked"); // See how its usefull right here? 

			// 	// get the data
			// 	var id = el.data('whatever');

			// 	// fill the data in the input fields
			// 	$('#modal-assunto').text(id.assunto)
			// 	$('#modal-periodico').text(id.periodico)
			// 	$('#modal-data_edicao').text(id.data_edicao)
			// 	$('#modal-duracao_edicao').text(id.duracao_edicao)
			// 	$('#modal-pagina').text(id.pagina)
			// 	$('#modal-resumo').text(id.resumo)
			// 	$('#modal-comentario').text(id.comentario)

			// })

			// // on modal hide
			// $('#editar-modal').on('hide.bs.modal', function() {
			// 	$('.edit-item-trigger-clicked').removeClass('edit-item-trigger-clicked')
			// 	$("#editar-modal").trigger("reset");
			// })
	
		})

	</script>

</html>
