@extends('layouts.app')

@section('content')
	<a class="btn btn-primary" href="/posts" role="button">Kembali</a>
	@if(!Auth::guest())
		@if(Auth::user()->id == $post->user_id)
		<a class="btn btn-success" href="{{ route('posts.edit',$post->id) }}" role="button">Edit</a>
		@endif
	@endif
	<br>
	<br>
	<div class="card">
		<li class="list-group-item">
			<h1>{{$post->title}}</h1>
			<small>Written On {{$post->created_at}}</small>
			<br>
			<hr>
			<img style="width: 50%; align-content: center;" src="/storage/cover_image/{{$post->cover_image}}" alt="">
			<p>{{$post->body}}</p>
		
		<form action="{{ route('posts.destroy',$post->id) }}" method="POST">
			@csrf
	        @method('DELETE')
	      	@if(!Auth::guest())
	      		@if(Auth::user()->id == $post->user_id)
	        <button type="submit" class="btn btn-danger">Delete</button>
	        	@endif
	        @endif
		</form>

		</li>
	</div>
	
@endsection

