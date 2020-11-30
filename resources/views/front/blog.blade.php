@extends('layouts.front')

@section('title','Blogs')

@section('content')
<section class="contact_section layout_padding-bottom layout_padding2-top">
	<div class="container px-0">
		<div class="heading_container">
			<h2>B<span>log</span>s</h2>
		</div>
	</div>
	<div class="container pb50">
		<div class="row">
			<div class="col-md-9 mb40">
				@foreach($blogs as $blog)
					<article>
						<img src="/Uploads/Blogs/{{ $blog->image }}" alt="" class="img-fluid mb30">
                		<div class="post-content">
                			<h3>{{ $blog->title }}</h3>
                            <ul class="post-meta list-inline">
                                <li class="list-inline-item"><i class="fa fa-user-circle-o"></i><a href=""></a></li>
                                <li class="list-inline-item"><i class="fa fa-calendar-o"></i><a href="">{{ \Carbon\Carbon::parse($blog->created_st)->format('d F, Y')}}</a></li>
                            </ul>
                            <p>{!! $blog->long_description !!}</p>
                		</div>
					</article><hr>
				@endforeach
			</div>
		</div>
	</div>
</section>
@stop