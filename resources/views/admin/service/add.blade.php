@extends('layouts.admin')

@section('title','Add Service')

@section('breadcrumb')
<div class="row align-items-center mb-2">
	<div class="col">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{url('/admin')}}">Dashboard</a></li>
				<li class="breadcrumb-item"><a href="{{url('/admin/service')}}">Service</a></li>
				<li class="breadcrumb-item active" aria-current="category">Add Service</li>
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
				<strong class="card-title">Add Service</strong>
			</div>
			<div class="card-body">
				<form action="{{ route('service.store') }}" method="POST" enctype="multipart/form-data" class="form-group">
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
						<label for="slug" class="col-sm-2 col-form-label">Short Description</label>
						<div class="col-sm-10">
							<textarea class="form-control" name="short_description" rows="3" required>{{ old('short_description') }}</textarea>
							{!! $errors->first('short_description', '<small class="text-danger">:message</small>') !!}
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
						<label for="slug" class="col-sm-2 col-form-label">Meta Name</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="meta_name" value="{{old('meta_name')}}" required>
							{!! $errors->first('meta_name', '<small class="text-danger">:message</small>') !!}
						</div>
					</div>
					<div class="form-group row">
						<label for="slug" class="col-sm-2 col-form-label">Meta Keyword</label>
						<div class="col-sm-10">
							<textarea class="form-control" name="meta_keyword" rows="3" required>{{ old('meta_keyword') }}</textarea>
							{!! $errors->first('meta_keyword', '<small class="text-danger">:message</small>') !!}
						</div>
					</div>
					<div class="form-group row">
						<label for="slug" class="col-sm-2 col-form-label">Meta Description</label>
						<div class="col-sm-10">
							<textarea class="form-control" name="meta_description" rows="3" required>{{ old('meta_description') }}</textarea>
							{!! $errors->first('meta_description', '<small class="text-danger">:message</small>') !!}
						</div>
					</div>
					<div class="form-group row">
						<label for="slug" class="col-sm-2 col-form-label">Status</label>
						<div class="col-sm-10">
							<input type="hidden" name="status" value="0">
							<input type="checkbox" name="status" checked="" value="1" style="margin-top: 7px">
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