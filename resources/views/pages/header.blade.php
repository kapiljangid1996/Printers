<header class="header_section">
	<div class="container-fluid">
		<nav class="navbar navbar-expand-lg custom_nav-container pt-3">
			<a class="navbar-brand" href="{{url('/')}}"><img src="/Uploads/Site/{{$settings->logo}}" alt="" style="width: 150px"></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<div class="d-flex ml-auto flex-column flex-lg-row align-items-center">
					<ul class="navbar-nav">
						<li class="nav-item active"><a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a></li>
						<li class="dropdown menu-large nav-item">
							<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"> Product Listing </a>
							<ul class="dropdown-menu megamenu">
								<li class="dropdown-item noHover">
									<div class="row">
										@foreach ($categories as $key => $category)
											<div class="col-md-12 col-lg-3 {{$key == 3 ? 'styleMargin' : '' }}">
												<ul class="{{$key == 3 ? 'styleMargin' : '' }}">
													<li class="dropdown-header">{{$category->name}}</li>
													@if($category->children)
														@foreach ($category->children as $child)
															<li class="dropdown-header">
																<a class="one" href="{{url('/category/'.$child->slug)}}">{{ $child->name }}</a>
															</li>
														@endforeach
													@endif
												</ul>
											</div>
										@endforeach
									</div>
								</li>
							</ul>
						</li>
						<li class="nav-item"><a class="nav-link" href="{{url('/about')}}">About</a></li>
						<li class="nav-item"><a class="nav-link" href="{{url('/service')}}">Service</a></li>
						<li class="nav-item"><a class="nav-link" href="{{url('/blog')}}">Blog</a></li>
						<li class="nav-item"><a class="nav-link" href="{{url('/contact')}}">Contact</a></li>
					</ul>
					<form class="form-inline my-2 my-lg-0 ml-0 ml-lg-4 mb-3 mb-lg-0">
						<button class="btn  my-2 my-sm-0 nav_search-btn" type="submit"></button>
					</form>
				</div>
			</div>
		</nav>
	</div>
</header>