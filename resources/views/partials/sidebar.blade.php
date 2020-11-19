<aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
	<a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
		<i class="fe fe-x"><span class="sr-only"></span></i>
	</a>
	<nav class="vertnav navbar navbar-light">
		<div class="w-100 mb-4 d-flex">
			<a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="{{url('/admin')}}">
				<svg version="1.1" id="logo" class="navbar-brand-img brand-sm" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 120 120" xml:space="preserve">
					<g>
						<polygon class="st0" points="78,105 15,105 24,87 87,87 	" />
						<polygon class="st0" points="96,69 33,69 42,51 105,51 	" />
						<polygon class="st0" points="78,33 15,33 24,15 87,15 	" />
					</g>
				</svg>
			</a>
		</div>
		<ul class="navbar-nav flex-fill w-100 mb-2">
			<li class="nav-item w-100">
				<a class="nav-link" href="{{url('/admin')}}">
					<i class="fe fe-home fe-16"></i>
					<span class="ml-3 item-text">Dashboard</span>
				</a>
			</li>
		</ul>
		<p class="text-muted nav-heading mt-4 mb-1"><span>Components</span></p>
		<ul class="navbar-nav flex-fill w-100 mb-2">
			<li class="nav-item w-100">
				<a class="nav-link" href="{{url('/admin/category')}}">
					<i class="fe fe-layers fe-16"></i>
					<span class="ml-3 item-text">Category</span>
				</a>
			</li>
			<li class="nav-item w-100">
				<a class="nav-link" href="{{url('/admin/product')}}">
					<i class="fe fe-package fe-16"></i>
					<span class="ml-3 item-text">Products</span>
				</a>
			</li>
			<li class="nav-item w-100">
				<a class="nav-link" href="{{url('/admin/slider')}}">
					<i class="fe fe-camera fe-16"></i>
					<span class="ml-3 item-text">Sliders</span>
				</a>
			</li>
			<li class="nav-item w-100">
				<a class="nav-link" href="{{url('/admin/setting')}}">
					<i class="fe fe-settings fe-16"></i>
					<span class="ml-3 item-text">Settings</span>
				</a>
			</li>
		</ul>
	</nav>
</aside>