@extends('layouts.admin')

@section('title','Edit Slider')

@section('breadcrumb')
<div class="row align-items-center mb-2">
	<div class="col">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{url('/admin')}}">Dashboard</a></li>
				<li class="breadcrumb-item"><a href="{{url('/admin/slider')}}">Slider</a></li>
				<li class="breadcrumb-item active" aria-current="category">Edit Slider</li>
			</ol>
		</nav>
	</div>
</div>
@stop

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="card shadow mb-4">
			<div class="card-header">
				<strong class="card-title">Edit Slider</strong>
			</div>
			<div class="card-body">
				<form action="{{ route('slider.update',$sliders->id) }}" method="POST" enctype="multipart/form-data" class="form-group">
					@csrf
					@method('PUT')
					<div class="form-group row">
						<label for="title" class="col-sm-2 col-form-label">Name</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="name" name="title" value="{{$sliders->title}}">
							{!! $errors->first('title', '<small class="text-danger">:message</small>') !!}
						</div>
					</div>
					<div class="form-group row">
						<label for="slug" class="col-sm-2 col-form-label">Slug</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="slug" name="slug" value="{{$sliders->slug}}">
							{!! $errors->first('slug', '<small class="text-danger">:message</small>') !!}
						</div>
					</div>
					<div class="form-group row">
						<label for="slug" class="col-sm-2 col-form-label">Description</label>
						<div class="col-sm-10">
							<textarea class="form-control" name="long_description" required>{{$sliders->long_description}}</textarea>
							{!! $errors->first('long_description', '<small class="text-danger">:message</small>') !!}
						</div>
					</div>
					<div class="form-group row">
						<label for="slug" class="col-sm-2 col-form-label">Image</label>
						<div class="col-sm-10">
							<input type="file" name="image" class="form-control">
							<input type="hidden" class="form-control" name="old_image" value="{{$sliders->image}}">
							<br>
							<div class="row my-4 pb-1">
								<div class="col-md-3">
			                      	<div class="card shadow text-center mb-4">
				                        <div class="card-body file">
				                          	<div class="my-4">
				                            	<img src="/Uploads/Slider/{{$sliders->image}}"  width="80px">
				                          	</div>
				                        </div>
			                      	</div>
			                    </div>	
							</div>
							{!! $errors->first('image', '<small class="text-danger">:message</small>') !!}
						</div>
					</div>
					<div class="form-group row">
						<label for="slug" class="col-sm-2 col-form-label">Button Text</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="button_text" value="{{$sliders->button_text}}">
							{!! $errors->first('button_text', '<small class="text-danger">:message</small>') !!}
						</div>
					</div>
					<div class="form-group row">
						<label for="slug" class="col-sm-2 col-form-label">Button Link</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="button_link" value="{{$sliders->button_link}}">
							{!! $errors->first('button_link', '<small class="text-danger">:message</small>') !!}
						</div>
					</div>
					<div class="form-group mb-2">
						<button type="submit" class="btn btn-primary">Edit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- Script -->

<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

<script>
  CKEDITOR.replace( 'long_description', {
    filebrowserBrowseUrl: '/ckfinder/ckfinder.html',
    filebrowserUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
  });
</script>

<!-- Script -->
@stop

							