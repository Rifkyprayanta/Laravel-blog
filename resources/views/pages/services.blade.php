@extends('layouts.app')

@section('content')
	<div class="jumbotron">
    <h1>{{$title}}</h1>
    <p>{{$subtitle}}</p>
    @if(count((array)$services) > 0)
    <ul>
    	@foreach($services as $a)
    	<li>{{$a}}</li>
    	@endforeach
    </ul>
    @endif
	</div>
@endsection