<div class="sidebar" data-background-color="white" data-active-color="danger">

<!--
Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
-->

	<div class="sidebar-wrapper">
	<div class="logo">
		<a href="{{ route('home') }}" class="simple-text">
			Hire Me!
		</a>
	</div>

	<ul class="nav">
		<li class="{{ (request()->is('/') || request()->is('login') || request()->is('register')) ? 'active' : '' }}">
			<a href="{{ route('home') }}">
				<i class="ti-home"></i>
				<p>Home</p>
			</a>
		</li>
		<li class="{{ request()->is('offers*') ? 'active' : '' }}">
			<a href="/offers">
				<i class="ti-rocket"></i>
				<p>Job Search</p>
			</a>
		</li>
		<li class="{{ request()->is('companies*') ? 'active' : '' }}">
			<a href="/companies">
				<i class="ti-briefcase"></i>
				<p>Companies</p>
			</a>
		</li>

		<li class="divider"></li>

		<li class="nav-text">
			<h4 class="title">José L. Jódar Bornás</h4>
			<img src="{{ asset('img/jose.jpg') }}" style="border-radius: 50%; padding-bottom: 10px; " />
			José is a highly talented C#.NET and JavaScript developer with more than ten years of experience in the IT industry. He is passionate about programming and is proficient in multiple programming languages.
		</li>
		<li>
			<a href="https://www.linkedin.com/in/jljodar/" target="_blank">
				<i class="ti-linkedin"></i>
				<p>LinkedIn</p>
			</a>
		</li>
		<li>
			<a href="https://github.com/jljodar" target="_blank">
				<i class="ti-github"></i>
				<p>GitHub</p>
			</a>
		</li>
	</ul>
	</div>
</div>