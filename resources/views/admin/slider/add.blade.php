@extends('layouts.admin')

@section('title','Add Slider')

@section('breadcrumb')
<div class="row align-items-center mb-2">
	<div class="col">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{url('/admin')}}">Dashboard</a></li>
				<li class="breadcrumb-item"><a href="{{url('/admin/slider')}}">Slider</a></li>
				<li class="breadcrumb-item active" aria-current="category">Add Slider</li>
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
				<strong class="card-title">Add Slider</strong>
			</div>
			<div class="card-body">
				<form action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data" class="form-group">
					@csrf
					<div class="form-group row">
						<label for="title" class="col-sm-2 col-form-label">Title</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="name" value="{{old('title')}}"  name="title" required>
							{!! $errors->first('title', '<small class="text-danger">:message</small>') !!}
						</div>
					</div>
					<div class="form-group row">
						<label for="slug" class="col-sm-2 col-form-label">Slug</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="slug" value="{{old('slug')}}" name="slug" required>
							{!! $errors->first('slug', '<small class="text-danger">:message</small>') !!}
						</div>
					</div>
					<div class="form-group row">
						<label for="slug" class="col-sm-2 col-form-label">Description</label>
						<div class="col-sm-10">
							<textarea class="form-control" name="long_description" required>{{ old('long_description') }}</textarea>
							{!! $errors->first('long_description', '<small class="text-danger">:message</small>') !!}
						</div>
					</div>
					<div class="form-group row">
						<label for="slug" class="col-sm-2 col-form-label">Image</label>
						<div class="col-sm-10">
							<input type="file" name="image" class="form-control" required>
							{!! $errors->first('image', '<small class="text-danger">:message</small>') !!}
						</div>
					</div>
					<div class="form-group row">
						<label for="slug" class="col-sm-2 col-form-label">Button Text</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="button_text" value="{{old('button_text')}}" required>
							{!! $errors->first('button_text', '<small class="text-danger">:message</small>') !!}
						</div>
					</div>
					<div class="form-group row">
						<label for="slug" class="col-sm-2 col-form-label">Button Link</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="button_link" value="{{old('button_link')}}" required>
							{!! $errors->first('button_link', '<small class="text-danger">:message</small>') !!}
						</div>
					</div>
					<div class="form-group mb-2">
						<button type="submit" class="btn btn-primary">Add</button>
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