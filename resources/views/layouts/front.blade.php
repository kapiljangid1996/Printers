<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<title>{{ $settings->title }} | @yield('title')</title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta name="author" content="" />

	<!-- slider stylesheet -->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

	<!-- fonts style -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700|Raleway:400,700&display=swap" rel="stylesheet" />

	<!-- bootstrap core css -->
	<link rel="stylesheet" type="text/css" href="{{asset('FrontDesign/css/bootstrap.css')}}" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<!-- Custom styles for this template -->
	<link href="{{asset('FrontDesign/css/style.css')}}" rel="stylesheet" />

	<!-- responsive style -->
	<link href="{{asset('FrontDesign/css/responsive.css')}}" rel="stylesheet" />
</head>
<body>
	<div class="hero_area">
		<!-- Header -->

		@include('pages.header')

		<!-- Header End -->

		<!-- Slider -->

		@yield('slider')

		<!-- Slider End -->
	</div>

	<!-- Content -->

	@yield('content')

	<!-- Content End -->

	<!-- footer -->

	@include('pages.footer')

	<!-- footer End -->
	<script type="text/javascript" src="{{asset('FrontDesign/js/jquery-3.4.1.min.js')}}"></script>

	<script type="text/javascript" src="{{asset('FrontDesign/js/bootstrap.js')}}"></script>

	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

	<script type="text/javascript" src="{{asset('FrontDesign/js/custom.js')}}"></script>
</body>
</html>