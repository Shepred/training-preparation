@if (session('vatsim_authed') == true)
	<a href="{{ url('/logout') }}">
		<li>You are logged in. Want to logout?</li>
	</a>
@endif