<section class="slider_section">
	<div class="slider_container">
		<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				<?php $i=0 ?>
				@foreach($sliders as $key => $slider)
					<li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i++ ?>" class="{{$key == 0 ? 'active' : '' }}"></li>
				@endforeach
			</ol>
			<div class="carousel-inner" role="listbox">
				@foreach($sliders as $key => $slider)
					<div class="carousel-item {{$key == 0 ? 'active' : '' }}">
						<div class="container-fluid">
							<div class="row">
								<div class="col-md-12 px-0">
									<div class="img-box">
										<img class="d-block w-100" src="/Uploads/Slider/{{ $slider->image }}"  style="width: 1200px; height: 400px">
									</div>
								</div>
							</div>
						</div>
					</div>
				@endforeach
			</div>
			<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</div>
</section>