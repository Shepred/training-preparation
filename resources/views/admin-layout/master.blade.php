<!DOCTYPE html>
<html>

	<head>
		@include('admin-layout.header')
	</head>

	<body>
		@include('admin-layout.navbar')
		@include('flash::message')
		@yield('content')
		@include('admin-layout.footer')
	</body>

</html>