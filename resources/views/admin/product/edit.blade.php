@extends('layouts.admin')

@section('title','Edit Products')

@section('breadcrumb')
<div class="row align-items-center mb-2">
	<div class="col">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{url('/admin')}}">Dashboard</a></li>
				<li class="breadcrumb-item"><a href="{{url('/admin/product')}}">Products</a></li>
				<li class="breadcrumb-item active" aria-current="category">Edit Products</li>
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
				<strong class="card-title">Edit Products</strong>
			</div>
			<div class="card-body">
				<form action="{{ route('product.update',$products->id) }}" method="POST" enctype="multipart/form-data" class="form-group">
					@csrf
					@method('PUT')
					<div class="form-group row">
						<label for="name" class="col-sm-2 col-form-label">Name</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="name" name="name" value="{{$products->name}}">
							{!! $errors->first('name', '<small class="text-danger">:message</small>') !!}
						</div>
					</div>
					<div class="form-group row">
						<label for="slug" class="col-sm-2 col-form-label">Slug</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="slug" name="slug" value="{{$products->slug}}">
							{!! $errors->first('slug', '<small class="text-danger">:message</small>') !!}
						</div>
					</div>
					<div class="form-group row">
						<label for="slug" class="col-sm-2 col-form-label">Category</label>
						<div class="col-sm-10">
							<select class="form-control" data-size="7" name="category_id" required>
								<option value="">Select Category</option>
								@foreach ($categories as $category)
									<option value="{{ $category->id }}" disabled="">{{ $category->name }}</option>
									@if ($category->children)
										@foreach ($category->children as $child)
											<option value="{{ $child->id }}" {{ $child->id == $products->category->id ? 'selected' : '' }}>&nbsp;&nbsp;&nbsp;{{ $child->name }}</option>
										@endforeach
									@endif
								@endforeach
							</select>
							{!! $errors->first('slug', '<small class="text-danger">:message</small>') !!}
						</div>
					</div>
					<div class="form-group row">
						<label for="slug" class="col-sm-2 col-form-label">Description</label>
						<div class="col-sm-10">
							<textarea class="form-control" name="long_description" required>{{$products->long_description}}</textarea>
							{!! $errors->first('long_description', '<small class="text-danger">:message</small>') !!}
						</div>
					</div>
					<div class="form-group row">
						<label for="slug" class="col-sm-2 col-form-label">Short Description</label>
						<div class="col-sm-10">
							<textarea class="form-control" name="short_description" rows="3" required>{{$products->short_description}}</textarea>
							{!! $errors->first('short_description', '<small class="text-danger">:message</small>') !!}
						</div>
					</div>
					<div class="form-group row">
						<label for="slug" class="col-sm-2 col-form-label">Image</label>
						<div class="col-sm-10">
							<input type="file" name="image[]" class="form-control" multiple="">
							<br>
							<div class="row my-4 pb-4">
							@foreach ($productimages as $productimage)
								<div class="col-md-3 productimg_{{ $productimage->id }}">
			                      	<div class="card shadow text-center mb-4">
				                        <div class="card-body file">
				                          	<div class="file-action">
					                            <button type="button" class="btn btn-link dropdown-toggle more-vertical p-0 text-muted mx-auto" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					                              	<span class="text-muted sr-only">Action</span>
					                            </button>
					                            <div class="dropdown-menu m-2">
						                            <a class="deleteRecord dropdown-item hideimg" data-id="{{ $productimage->id }}"><i class="fe fe-delete fe-12 mr-4"></i>Delete</a>
					                            </div>
				                          	</div>
				                          	<div class="my-4">
				                            	<img src="/Uploads/Product/{{$productimage->image}}"  width="80px">
				                          	</div>
				                        </div>
			                      	</div>
			                    </div>						
							@endforeach 
							</div>
							{!! $errors->first('image', '<small class="text-danger">:message</small>') !!}
						</div>
					</div>
					<div class="form-group row">
						<label for="slug" class="col-sm-2 col-form-label">Meta Name</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="meta_name" value="{{$products->meta_name}}">
							{!! $errors->first('meta_name', '<small class="text-danger">:message</small>') !!}
						</div>
					</div>
					<div class="form-group row">
						<label for="slug" class="col-sm-2 col-form-label">Meta Keyword</label>
						<div class="col-sm-10">
							<textarea class="form-control" name="meta_keyword" rows="3">{{$products->meta_keyword}}</textarea>
							{!! $errors->first('meta_keyword', '<small class="text-danger">:message</small>') !!}
						</div>
					</div>
					<div class="form-group row">
						<label for="slug" class="col-sm-2 col-form-label">Meta Description</label>
						<div class="col-sm-10">
							<textarea class="form-control" name="meta_description" rows="3">{{$products->meta_description}}</textarea>
							{!! $errors->first('meta_description', '<small class="text-danger">:message</small>') !!}
						</div>
					</div>
					<div class="form-group row">
						<label for="slug" class="col-sm-2 col-form-label">Status</label>
						<div class="col-sm-10">
							<input type="hidden" name="status" value="0">
							<input type="checkbox" name="status" value="1" style="margin-top: 7px" @if(old('status', $products->status)) checked @endif>
						</div>
					</div>
					<input type="hidden" value="{{$products->id}}" name="product_id">
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

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>

<script>
  CKEDITOR.replace( 'long_description', {
    filebrowserBrowseUrl: '/ckfinder/ckfinder.html',
    filebrowserUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
  });
</script>

<script>
	$(".deleteRecord").click(function(){
    var id = $(this).data("id"); 
    var token = $("meta[name='csrf-token']").attr("content");
    if(confirm("Are you sure you want to remove this image?")) {     
	    $.ajax(
	    {
	        url: "/admin/product/deleteimg/"+id,
	        type: 'POST',
	        data: {
	            "id": id,
	            "_token": token,
	        },
	        success: function(data) {	        	
	            $('.productimg_'+id).remove();
	        }
	    });
   	}
	});
</script>

<!-- Script -->
@stop

							