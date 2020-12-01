@extends('layouts.front')

@section('title')

@foreach($services as $service)
	{{ $service->title }}
@endforeach

@stop

@section('content')
<section class="agency_section service_section layout_padding2-top">
	<div class="container" style="width: 200%; margin-bottom: 35px">
		@foreach($services as $key => $service)
			<h3>{{ $service->title }}</h3>
		@endforeach
		<hr class="my-4">
		<div class="row">
			<div class="col-md-6">
				@foreach($services as $key => $service)
					<img src="/Uploads/Service/{{ $service->image }}" alt="" style="padding: 20px" height="400px" width="450px">
				@endforeach
			</div>
			<div class="col-md-6">
				<div class="box ">
					<div class="detail-box">
						@foreach($services as $key => $service)
						<div class="heading_container">
							<h2>{{ $service->title }}</h2>
						</div>
						<p>{!! $service->long_description !!}</p>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@stop