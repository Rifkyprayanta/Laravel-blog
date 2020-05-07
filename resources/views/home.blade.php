@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="{{ route('posts.index') }}" type="button" class="btn btn-success">Lihat Artikel</a>
                    <br>
                    <br>

                    @if(count((array)$posts) > 0)
                        <div class="card">
                            <ul class="list-group list-group-flush">
                            @foreach($posts as $post)
                                <li class="list-group-item">
                                    <h3><a href="/posts/{{$post->id}}"> {{$post->title}}</a></h3>
                                    <small>Written On {{$post->created_at}}</small>
                                    <p>{{$post->body}}</p>
                                </li>
                            @endforeach
                            </ul>
                        </div>
                    @else
                        <p>You dont have an article</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
