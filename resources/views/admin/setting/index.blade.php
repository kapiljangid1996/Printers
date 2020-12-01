@extends('layouts.admin')

@section('title','Edit Site')

@section('breadcrumb')
<div class="row align-items-center mb-2">
	<div class="col">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{url('/admin')}}">Dashboard</a></li>
				<li class="breadcrumb-item active" aria-current="category">Edit Site</li>
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
				<strong class="card-title">Edit Site</strong>
			</div>
			<div class="card-body">
				<form action="{{url('/admin/setting/'.$setting[0]->id)}}" method="POST" enctype="multipart/form-data" class="form-group">
					@csrf
					<div class="form-group row">
						<label for="title" class="col-sm-2 col-form-label">Name</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="title" value="{{$setting[0]->title}}">
							{!! $errors->first('title', '<small class="text-danger">:message</small>') !!}
						</div>
					</div>
					<div class="form-group row">
						<label for="slug" class="col-sm-2 col-form-label">Email 1</label>
						<div class="col-sm-10">
							<input type="email" class="form-control" name="email1" value="{{$setting[0]->email1}}">
							{!! $errors->first('email1', '<small class="text-danger">:message</small>') !!}
						</div>
					</div>
					<div class="form-group row">
						<label for="slug" class="col-sm-2 col-form-label">Email 2</label>
						<div class="col-sm-10">
							<input type="email" class="form-control" name="email2" value="{{$setting[0]->email2}}">
							{!! $errors->first('email2', '<small class="text-danger">:message</small>') !!}
						</div>
					</div>
					<div class="form-group row">
						<label for="slug" class="col-sm-2 col-form-label">Contact 1</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="contact1" value="{{$setting[0]->contact1}}">
							{!! $errors->first('contact1', '<small class="text-danger">:message</small>') !!}
						</div>
					</div>
					<div class="form-group row">
						<label for="slug" class="col-sm-2 col-form-label">Contact 2</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="contact2" value="{{$setting[0]->contact2}}">
							{!! $errors->first('contact2', '<small class="text-danger">:message</small>') !!}
						</div>
					</div>
					<div class="form-group row">
						<label for="slug" class="col-sm-2 col-form-label">Address 1</label>
						<div class="col-sm-10">
							<textarea class="form-control" name="address1" required>{{$setting[0]->address1}}</textarea>
							{!! $errors->first('address1', '<small class="text-danger">:message</small>') !!}
						</div>
					</div>
					<div class="form-group row">
						<label for="slug" class="col-sm-2 col-form-label">Address 2</label>
						<div class="col-sm-10">
							<textarea class="form-control" name="address2" required>{{$setting[0]->address2}}</textarea>
							{!! $errors->first('address2', '<small class="text-danger">:message</small>') !!}
						</div>
					</div>
					<div class="form-group row">
						<label for="slug" class="col-sm-2 col-form-label">Logo</label>
						<div class="col-sm-10">
							<input type="file" name="logo" class="form-control">
							<input type="hidden" class="form-control" name="old_logo" value="{{$setting[0]->logo}}">
							<br>
							<div class="row my-4 pb-1">
								<div class="col-md-3">
			                      	<div class="card shadow text-center mb-4">
				                        <div class="card-body file">
				                          	<div class="my-4">
				                            	<img src="/Uploads/Site/{{$setting[0]->logo}}"  width="80px">
				                          	</div>
				                        </div>
			                      	</div>
			                    </div>	
							</div>
							{!! $errors->first('logo', '<small class="text-danger">:message</small>') !!}
						</div>
					</div>
					<div class="form-group row">
						<label for="slug" class="col-sm-2 col-form-label">Google Link</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="google" value="{{$setting[0]->google}}">
							{!! $errors->first('google', '<small class="text-danger">:message</small>') !!}
						</div>
					</div>
					<div class="form-group row">
						<label for="slug" class="col-sm-2 col-form-label">Facebook Link</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="facebook" value="{{$setting[0]->facebook}}">
							{!! $errors->first('facebook', '<small class="text-danger">:message</small>') !!}
						</div>
					</div>
					<div class="form-group row">
						<label for="slug" class="col-sm-2 col-form-label">LinkedIn Link</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="linkedin" value="{{$setting[0]->linkedin}}">
							{!! $errors->first('linkedin', '<small class="text-danger">:message</small>') !!}
						</div>
					</div>
					<div class="form-group row">
						<label for="slug" class="col-sm-2 col-form-label">Twitter Link</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="twitter" value="{{$setting[0]->twitter}}">
							{!! $errors->first('twitter', '<small class="text-danger">:message</small>') !!}
						</div>
					</div>
					<div class="form-group row">
						<label for="slug" class="col-sm-2 col-form-label">Footer</label>
						<div class="col-sm-10">
							<textarea class="form-control" name="footer" required>{{$setting[0]->footer}}</textarea>
							{!! $errors->first('footer', '<small class="text-danger">:message</small>') !!}
						</div>
					</div>
					<div class="form-group row">
						<label for="slug" class="col-sm-2 col-form-label">Meta Name</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="meta_name" value="{{$setting[0]->meta_name}}">
							{!! $errors->first('meta_name', '<small class="text-danger">:message</small>') !!}
						</div>
					</div>
					<div class="form-group row">
						<label for="slug" class="col-sm-2 col-form-label">Meta Keyword</label>
						<div class="col-sm-10">
							<textarea class="form-control" name="meta_keyword" required>{{$setting[0]->meta_keyword}}</textarea>
							{!! $errors->first('meta_keyword', '<small class="text-danger">:message</small>') !!}
						</div>
					</div>
					<div class="form-group row">
						<label for="slug" class="col-sm-2 col-form-label">Meta Description</label>
						<div class="col-sm-10">
							<textarea class="form-control" name="meta_description" required>{{$setting[0]->meta_description}}</textarea>
							{!! $errors->first('meta_description', '<small class="text-danger">:message</small>') !!}
						</div>
					</div>
					<div class="form-group row">
						<label for="slug" class="col-sm-2 col-form-label">Google Analyst</label>
						<div class="col-sm-10">
							<textarea class="form-control" name="google_analyst" required>{{$setting[0]->google_analyst}}</textarea>
							{!! $errors->first('google_analyst', '<small class="text-danger">:message</small>') !!}
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
  CKEDITOR.replace( 'google_analyst', {
    filebrowserBrowseUrl: '/ckfinder/ckfinder.html',
    filebrowserUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
  });
</script>

<!-- Script -->
@stop

							