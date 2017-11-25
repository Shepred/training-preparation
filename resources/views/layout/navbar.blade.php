@if (session('vatsim_authed') == true)
	<a href="{{ url('/logout') }}">
		<li>You are logged in. Want to logout?</li>
	</a>

	@if ($user->admin == 1)
		<a href="{{ url('/admin') }}">
			<li>You are an admin. Want to go the admin panel?</li>
		</a>
	@endif
@endif