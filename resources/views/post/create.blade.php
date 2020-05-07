@extends('layouts.app')

@section('content')
	<h1>Posting Artikel</h1>
	<a class="btn btn-primary" href="/posts" role="button">Kembali</a>
	<br>
	<br>
	<form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
	    <label for="title">Judul Artikel</label>
	    <input class="form-control" type="text" id="title" name="title">
	</div>
	<div class="form-group">
	    <label for="title">Isi Artikel</label>
	    <textarea  class="form-control" type="text" id="body" name="body"></textarea>
	</div>
	<div class="form-group">
		<input type="file" name="cover_image">
	</div>
	 <button type="submit" class="btn btn-primary">Submit</button>
	</form>
@endsection

