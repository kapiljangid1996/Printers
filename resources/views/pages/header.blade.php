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
						<li class="nav-item dropdown mega-dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Products<i class="fas fa-angle-down"></i></a>
							<div class="dropdown-menu mega-menu v-2 z-depth-1 special-color py-1 px-1" aria-labelledby="navbarDropdownMenuLink2">
								<div class="row">
									@foreach ($categories as $category)
									<div class="col-md-12 col-xl-3 sub-menu" style="padding: 10px; width: 800px">
										<ul class="list-unstyled">
											<li><a class="dropdown-item noHover">{{$category->name}}</a></li>
											<div class="dropdown-divider"></div>
											@if($category->children)
												@foreach ($category->children as $child)
													<li>
														<a class="dropdown-item one" style="text-transform: uppercase;" href="{{url('/category/'.$child->slug)}}">{{ $child->name }}</a>
													</li>
												@endforeach
											@endif
										</ul>
									</div>
									@endforeach
								</div>
							</div>
						</li>
						<li class="nav-item"><a class="nav-link" href="">About</a></li>
						<li class="nav-item"><a class="nav-link" href="{{url('/service')}}">Service</a></li>
						<li class="nav-item"><a class="nav-link" href="">Blog</a></li>
						<li class="nav-item"><a class="nav-link" href="">Contact</a></li>
					</ul>
					<form class="form-inline my-2 my-lg-0 ml-0 ml-lg-4 mb-3 mb-lg-0">
						<button class="btn  my-2 my-sm-0 nav_search-btn" type="submit"></button>
					</form>
				</div>
			</div>
		</nav>
	</div>
</header>

<style>
	.noHover{
    	pointer-events: none;
	}
	a.one:hover {color:#ff0000;background-color: white}
</style>