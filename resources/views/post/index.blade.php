@extends('layouts.app')

@section('content')
	<h1>Blog Post Laravel</h1>
	<a class="btn btn-primary" href="{{ route('posts.create') }}" role="button">Buat Artikel</a>
	<br>
	<br>
	@if(count((array)$posts) > 0)

	

		<ul class="list-group list-group-flush">
		@foreach($posts as $post)
		<div class="card">
		<div class="row">
			
			<div class="col-md-4">
				<img style="width: 100%; padding: 10px" src="/storage/cover_image/{{$post->cover_image}}" alt="">
			</div>
			<div class="col-md-8" style="padding: 10px">
				<h3><a href="/posts/{{$post->id}}"> {{$post->title}}</a></h3>
				<big>Terbit {{$post->created_at}}</big>
				<br>
				<big>Ditulis Oleh {{$post->user_id}}</big>
				<hr>
			</div>	
		</div>
		</div>
		@endforeach
		</ul>
	
	@else

	@endif


@endsection

