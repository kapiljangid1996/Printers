@extends('layouts.front')

@section('title','Products')

@section('content')
<section class="layout_padding-bottom layout_padding2-top">
	<div class="container mt-2">
		<div class="heading_container">
			<h2>{{$category->name}}</h2><hr>
		</div>
		<div class="row" style="margin-top: 40px">			
			@foreach($products as $key => $product)
				<div class="col-md-3 col-sm-6 item">
					<div class="card item-card card-block">
						<a href="{{url('/products/'.$product->slug)}}" style="color: black !important">
							<img src="/Uploads/Product/{{ $product->productimage[0]->image }}" style="height:150px; width:100%;">						
							<h5 class="item-card-title mt-3 mb-3 text-center font-weight-bold">{{ $product->name }}</h5>
							<p class="card-text text-center mb-2">{{ $product->category->name }}</p>
						</a>
					</div>
				</div>
			@endforeach
		</div>
	</div>
</section>
@stop