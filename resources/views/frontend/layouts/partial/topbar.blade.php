<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	<div class="container">
		<a class="navbar-brand" href="{{route('home')}}">Hotel Management System</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="oi oi-menu"></span> Menu
		</button>

		<div class="collapse navbar-collapse" id="ftco-nav">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item active"><a href="{{route('home')}}" class="nav-link">Home</a></li>
				<li class="nav-item"><a href="{{route('room')}}" class="nav-link">Rooms</a></li>
				<li class="nav-item"><a href="{{route('restaurant')}}" class="nav-link">Restaurant</a></li>
				<li class="nav-item"><a href="{{route('contact')}}" class="nav-link">Contact</a></li>
				<li class="nav-item"><a href="#" class="nav-link">Login/Logout</a></li>
			</ul>
		</div>
	</div>
</nav>
<!-- END nav -->