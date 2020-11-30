@extends('layouts.front')

@section('title','Blogs')

@section('content')
<section class="contact_section layout_padding-bottom layout_padding2-top">
	<div class="container px-0">
		<div class="heading_container">
			<h2>B<span>log</span>s</h2>
		</div>
		<div class="row">
			<div class="col-md-9">
			@foreach($blogs as $blog)
				<div class="">
					<img src="/Uploads/Blogs/{{ $blog->image }}" alt="" class="img-fluid mb30">
            		<div class="post-content detail-box">
            			<h3>{{ $blog->title }}</h3>
                        <ul class="post-meta list-inline">
                            <li class="list-inline-item"><i class="fa fa-user-circle-o"></i><a href="">{{ $blog->editor }}</a></li>
                            <li class="list-inline-item"><i class="fa fa-calendar-o"></i><a href="">{{ \Carbon\Carbon::parse($blog->created_st)->format('d F, Y')}}</a></li>
                        </ul>
                        <p>{!! $blog->long_description !!}</p>
            		</div>
				</div>
				<hr class="mb30">
			@endforeach
			</div>
		</div>
	</div>
</section>
@stop