@extends('layouts.front')

@section('title', 'Services')

@section('content')
<section class="service_section layout_padding-bottom layout_padding2-top">
	<div class="container">
		<div class="heading_container">
			<h2>O<span>u</span>r Ser<span>vi</span>ces</h2>
		</div>
		<div class="row">
			<div class="box">
				<div class="detail-container">
					<?php $i=1; ?>
					@foreach($services as $key => $service)
						<a href="{{url('/service/'.$service->slug)}}">
							<div class="detail-box">
								<img src="/Uploads/Service/{{ $service->image }}" alt="" width="180px" height="180px">
							</div>
							<h4 style="text-align: center;">{{ $service->title }}</h4>
						</a>
					<?php $i++; ?>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</section>
@stop