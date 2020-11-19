@extends('layouts.admin')

@section('title','Product')

@section('breadcrumb')
<div class="row align-items-center mb-2">
	<div class="col">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{url('/admin')}}">Dashboard</a></li>
				<li class="breadcrumb-item active" aria-current="product">Product</li>
			</ol>
		</nav>
	</div>
</div>
@stop

@section('content')
<div class="row">
	<div class="col-md-12 my-4">
		<div class="card shadow">
			<div class="card-header">
				<strong class="card-title">Product</strong>
			</div>
			<div class="card-body">
				<div class="toolbar">
					<div class="row">
						<div class="col-sm-6">
							<a href="{{route('product.create')}}" class="btn btn-primary btn-round">Add</a>
						</div>
						<div class="col-sm-6">
							<div class="dataTables_filter">
								<label style="float: right;">
									<span class="bmd-form-group bmd-form-group-sm">
										<input type="text" class="form-control" id="myInput" value="" placeholder="Search">
									</span>
								</label>
							</div>
						</div>
					</div>
				</div>
				<table class="table table-borderless table-hover">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Category</th>
							<th>Slug</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody id="myTable">
						<?php
							$index = 0;	
							foreach ($products as $product){
								$index++;
						?>
						<tr>
							<td><?php echo $index; ?></td>
							<td>{{ $product->name }}</td>
							<td>{{ $product->category->name}}</td>
							<td>{{ $product->slug }}</td>
							<td>
								@if($product->status == 1)
                                  	Active
                              	@else
                                  	Inactive
                              	@endif
							</td>
							<td>
								<button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="text-muted sr-only">Action</span></button>
								<div class="dropdown-menu dropdown-menu-right">
									<a class="dropdown-item" href="{{route('product.edit', $product->id)}}">Edit</a>
									<form action="{{ url('/admin/product', $product->id) }}" method="POST">
										@csrf
	                      				@method('DELETE')
										<button class="dropdown-item" type="submit" onclick="return confirm('Are you sure you want to delete')">Delete</button>
									</form>
								</div>
							</td>
						</tr>
						<?php  } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@stop