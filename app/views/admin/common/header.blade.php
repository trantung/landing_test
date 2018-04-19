<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title> @yield('title') </title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

	{{ HTML::style('adminlte/bootstrap/css/bootstrap.min.css') }}
	{{ HTML::style('adminlte/dist/css/font-awesome.min.css') }}
	{{ HTML::style('adminlte/dist/css/ionicons.min.css') }}
	{{ HTML::style('adminlte/dist/css/AdminLTE.min.css') }}
	{{ HTML::style('adminlte/dist/css/admin.css') }}
	{{ HTML::style('custom/css/jquery.timepicker.min.css') }}
	{{ HTML::style('custom/css/print.min.css') }}
	{{ HTML::style('adminlte/dist/css/skins/_all-skins.min.css') }}
	{{ HTML::style('adminlte/plugins/datetimepicker/bootstrap-datetimepicker.min.css') }}
	{{ HTML::style('adminlte/plugins/jQueryUI/jquery-ui.css') }}
	{{ HTML::style('adminlte/plugins/bootstrap-select/bootstrap-select.min.css') }}
	{{ HTML::style('custom/css/animate.css') }}
	{{ HTML::style('custom/css/style.css') }}
	@yield('style_header')

	{{ HTML::script('adminlte/plugins/jQuery/jQuery-2.1.4.min.js') }}
	{{ HTML::script('adminlte/plugins/jQueryUI/jquery-ui.min.js') }}
	{{ HTML::script('adminlte/bootstrap/js/bootstrap.min.js') }}
	{{ HTML::script('adminlte/plugins/daterangepicker/moment.min.js') }}
	{{ HTML::script('adminlte/plugins/datetimepicker/bootstrap-datetimepicker.min.js') }}
	{{ HTML::script('adminlte/dist/js/app.min.js') }}
	{{ HTML::script('custom/js/jquery.timepicker.min.js') }}
	{{ HTML::script('custom/js/print.min.js') }}
	{{ HTML::script('adminlte/plugins/bootstrap-select/bootstrap-select.min.js') }}
	{{ HTML::script('custom/js/form-control.js') }}
	{{ HTML::script('custom/js/ajax.js') }}
	{{ HTML::script('custom/js/notification.js') }}

	@yield('js_header')

	<script>
		$(function () {

			$('#datepicker').datepicker({
				dateFormat: 'yy-mm-dd',
			});

			$('.timepicker').timepicker({
				'minTime': '6:00am',
				'maxTime': '00:00am',
				'show2400': true,
				'timeFormat': 'H:i'
			})

		});
	</script>
</head>