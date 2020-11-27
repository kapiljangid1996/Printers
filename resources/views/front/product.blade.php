@extends('layouts.front')

@section('title','Products')

@section('content')
<section class=" layout_padding-bottom layout_padding2-top">
	<div class="container">
		<div class="heading_container" style="margin-bottom: 35px">
			<h2>{{$category->name}}</h2><hr>
		</div>
		<div class="row">
			@foreach($products as $key => $product)
				<div class="card booking-card col-md-3" style="padding: 15px; margin: 15px">
					<div class="view overlay">
						<a href="{{url('/products/'.$product->slug)}}">
							<img class="card-img-top" src="/Uploads/Product/{{ $product->productimage[0]->image }}" alt="">
							<div class="mask rgba-white-slight"></div>
						</a>
					</div>
					<div class="card-body">
						<h4 class="card-title font-weight-bold"><a>{{ $product->name }}</a></h4>
						<p class="mb-2">{{ $product->category->name }}</p>
					</div>
				</div>
			@endforeach
		</div>			
	</div>
</section>
@stop