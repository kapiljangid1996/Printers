@extends('layouts.front')

@section('title')

@foreach($products as $product)
	{{ $product->name }}
@endforeach

@stop

@section('content')
<div class="container my-5">
	@foreach($products as $product)
		<h3>{{ $product->name }}</h3>
	@endforeach
	<hr class="my-4">
	<div class="row">
		<div class="col-md-5">
			<div id="custCarousel" class="carousel slide" data-ride="carousel" align="center">
				<div class="carousel-inner">
					<?php $i=0 ?>
					@foreach($products as $product)
						@foreach($product->productimage as $key => $proimage)
							<div class="carousel-item {{$key == 0 ? 'active' : '' }}">
								<img src="/Uploads/Product/{{ $proimage->image }}" style="height: 250px">
							</div>
						<?php $i++ ?>
						@endforeach
					@endforeach
				</div>
				<a class="carousel-control-prev" href="#custCarousel" data-slide="prev"> <span class="carousel-control-previous-icon"></span> </a>
				<a class="carousel-control-next" href="#custCarousel" data-slide="next"> <span class="carousel-control-nextious-icon"></span> </a>
				<hr>
				<ol class="carousel-indicators list-inline">
					<?php $i=0 ?>
					@foreach($products as $product)
						@foreach($product->productimage as $key => $proimage)
							<li class="list-inline-item {{$key == 0 ? 'active' : '' }}">
								<a id="carousel-selector-<?php echo $i ?>" class="{{$key == 0 ? 'selected' : '' }}" data-slide-to="<?php echo $i ?>" data-target="#custCarousel">
									<img src="/Uploads/Product/{{ $proimage->image }}" class="img-fluid owl-wrapper-outer">
								</a>
							</li>
						<?php $i++ ?>
						@endforeach
					@endforeach
				</ol>
			</div>
		</div>
		<div class="col-md-7">
			<div class="box">
				<div class="detail-box">
					@foreach($products as $product)
						<div class="heading_container">
							<h2>{{ $product->name }}</h2>
						</div>
						<p>{!! $product->long_description !!}</p>
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<hr class="my-5">
</div>
<style>
.carousel-control-previous-icon,
.carousel-control-nextious-icon {
    height: 100px;
    width: 100px;
}

.carousel-control-nextious-icon:after
{
    content: '>';
    font-size: 55px;
    color: blue;
}

.carousel-control-previous-icon:after {
    content: '<';
    font-size: 55px;
    color: blue;
}
</style>
@stop