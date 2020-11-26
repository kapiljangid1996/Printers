@extends('layouts.front')

@section('title','Products')

@section('content')
<section class=" layout_padding-bottom layout_padding2-top">
	<div class="container">
		<div class="heading_container" style="margin-bottom: 35px">
			<h2>{{$category->name}}</h2>
		</div>
		<div class="row">
			@foreach($products as $key => $product)
				<div class="col-md-4">
					<img class="card-img-top" src="/Uploads/Product/{{ $product->productimage[0]->image }}" alt="">
					<div class="card-body">
						<h5 class="card-title">{{ $product->name }}</h5>
						<p class="card-text">{{ $product->category->name }}</p>
					</div>
				</div>
			@endforeach
		</div>			
	</div>
</section>
@stop