@extends('layouts.front')

<!-- Slider -->

@section('slider')

@include('pages.slider')

@stop

<!-- Slider End -->

<!-- Content -->

@section('content')

<section class="service_section customPad">
	<div class="container mt-2">
		<div class="heading_container">
			<h2>Feat<span>ured Prod</span>ucts</h2>
		</div>
		<div class="row" style="margin-top: 40px">			
			@foreach($products as $key => $product)
				<div class="col-md-3 col-sm-6 item" style="margin-bottom: 15px">
					<div class="card item-card card-block">
						<a href="{{url('/products/'.$product->slug)}}" style="color: black !important">
							<img src="/Uploads/Product/{{ $product->productimage[0]->image }}" style="height:150px; width:100%;">
							<h5 class="item-card-title mt-3 mb-3 text-center font-weight-bold">{{ $product->name }}</h5>
						</a>
					</div>
				</div>
			@endforeach
		</div>
	</div>
</section>

<section class="service_section layout_padding">
	<div class="container">
		<div class="heading_container">
			<h2>Ser<span>vi</span>ces</h2>
		</div>
		<div class="row">			
			<div class="col-lg-6">
				<div class="img-container tab-content">
					<?php $i=1; ?>
					@foreach($services as $key => $service)
						<div class="img-box tab-pane fade {{$key == 0 ? 'show active' : '' }}" id="img<?php echo $i ?>" role="tabpanel">
							<img src="/Uploads/Service/{{ $service->image }}" alt="" height="450px">
						</div>					
					<?php $i++; ?>
					@endforeach
				</div>
			</div>
			<div class="col-lg-6">					
				<div class="detail-container nav nav-tabs" id="myTab" role="tablist">
					<?php $i=1; ?>
					@foreach($services as $key => $service)
						<div class="detail-box {{$key == 0 ? 'active' : '' }}" id="img<?php echo $i ?>-tab" data-toggle="tab" href="#img<?php echo $i ?>" role="tab" aria-selected="{{$key == 0 ? 'true' : 'false' }}">
							<h5>{{ $service->title }}</h5>
						</div>
					<?php $i++; ?>
					@endforeach
				</div>					
			</div>				
		</div>
		<div class="btn-box">
			<a href="{{url('/service')}}">Read More</a>
		</div>
	</div>
</section>
@stop

<!-- Content End -->