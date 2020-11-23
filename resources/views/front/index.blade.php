@extends('layouts.front')

<!-- Slider -->

@section('slider')

@include('pages.slider')

@stop

<!-- Slider End -->

<!-- Content -->

@section('content')

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
							<img src="/Uploads/Service/{{ $service->image }}" alt="" />
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
							<h4>{{ $service->title }}</h4>
						</div>
					<?php $i++; ?>
					@endforeach
				</div>					
			</div>				
		</div>
		<div class="btn-box">
			<a href="">Read More</a>
		</div>
	</div>
</section>

@stop

<!-- Content End -->