<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<title>{{ config('app.name', 'Laravel') }}</title>

		<!-- Fonts -->
		<link rel="dns-prefetch" href="//fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css?family=Nunito|Source+Code+Pro|IBM+Plex+Mono|Raleway:300&display=swap" rel="stylesheet">

		<!-- Styles -->
		<link href="{{ asset('css/app.css') }}" rel="stylesheet">
		<link href="{{ asset('css/wb.css') }}" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

		<!-- Scripts -->
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
		<script src="//code.jquery.com/jquery-1.12.4.js"></script>
		<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		<!-- <script src="{{ asset('js/app.js') }}" defer></script> -->
		
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
				// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
				var modal = $(this)
				modal.find('#modal-assunto').val(recipient.assunto)
				modal.find('#modal-periodico').val(recipient.periodico_id)
				modal.find('#modal-data_edicao').val(recipient.data_edicao)
				modal.find('#modal-duracao_edicao').val(recipient.duracao_edicao)
				modal.find('#modal-pagina').val(recipient.pagina)
				modal.find('#modal-resumo').val(recipient.resumo)
				modal.find('#modal-comentario').val(recipient.comentario)

				//Substitui id da ficha em modal-form > action > route
				var str = $('#modal-form').attr('action');
				var i = str.lastIndexOf('/');
				if (i != -1) {
					str = str.substr(0, i + 1) + recipient.id;
				}
				modal.find('#modal-form').attr('action', str)

			})

			$('#apagar-modal').on('shown.bs.modal', function (event) {

				var button = $(event.relatedTarget) // Button that triggered the modal
				console.log(button)
				var recipient = button.data('whatever') // Extract info from data-* attributes
				// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
				var modal = $(this)

				//Substitui id da ficha em modal-form > action > route
				var str = $('#modal-form').attr('action');
				var i = str.lastIndexOf('/');
				if (i != -1) {
					str = str.substr(0, i + 1) + recipient.id;
				}
				modal.find('#modal-form').attr('action', str)

			})

			$.datepicker.setDefaults({
				dateFormat: 'dd/mm/yy',
				changeMonth: true,
				changeYear: true,
				showOtherMonths: true,
				selectOtherMonths: true,
				dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado','Domingo'],
				dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
				dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
				monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
				monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
				yearRange: '1500:'+(new Date).getFullYear()
			});

			$( function() {
				var dateFormat = "dd/mm/yy",
					from = $( "#data_edicao" )
						.datepicker({
							defaultDate: "+1w",
							changeMonth: true,
						})
						.on( "change", function() {
							to.datepicker( "option", "minDate", getDate( this ) );
						}),
					to = $( "#duracao_edicao" ).datepicker({
						defaultDate: "+1w",
						changeMonth: true,
					})
					.on( "change", function() {
						from.datepicker( "option", "maxDate", getDate( this ) );
					});

				function getDate( element ) {
					var date;
					try {
						date = $.datepicker.parseDate( dateFormat, element.value );
					} catch( error ) {
						date = null;
					}

					return date;
				}
			});
	
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
