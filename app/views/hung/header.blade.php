<!DOCTYPE html>
<html>
<head>
@if($config)
<title>{{ $config->text_config_title }}</title>
@else
<title>Shop</title>
@endif
	@if($config->google_code)
	{{$config->google_code}}
	@endif
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta property="og:image" content="http://terahertz.vinstoresvn.com/product/1.png" />
	<link rel="shortcut icon" href="/favicon.png?v=1.0">
	<meta name="theme-color" content="#ac0000" />
	<link rel="stylesheet" type="text/css" href="assets/hung/css/style.css">
	<link rel="stylesheet" type="text/css" href="assets/hung/css/owl.carousel.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="assets/hung/js/main-js/jquery.min.js"></script>
	<script type="text/javascript" src="assets/hung/js/main-js/owl.carousel.js"></script>
	<script type="text/javascript" src="assets/hung/js/main-js/main.js"></script>
</head>
<body class="body">
{{$config->fb_analytic}}

	<div class="wapper">
		<div class="container container_main">
