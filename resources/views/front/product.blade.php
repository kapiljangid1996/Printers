@extends('layouts.front')

@section('title','Products')

@section('content')
<section class="layout_padding-bottom layout_padding2-top">
	<div class="container mt-2">
		<div class="dropdown" style="margin-bottom: 20px">
  			<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Sort </button>
  			<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    			<a class="dropdown-item" href="#"> A to Z </a>
    			<a class="dropdown-item" href="#"> Z to A </a>
  			</div>
		</div>
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
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
@stop