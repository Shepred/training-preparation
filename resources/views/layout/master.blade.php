<!DOCTYPE html>
<html>

	<head>
		@include('layout.header')
	</head>

	<body>
		@include('layout.navbar')
		@include('flash::message')
		@yield('content')
		@include('layout.footer')
	</body>

</html>