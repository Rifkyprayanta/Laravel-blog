@extends('layouts.app')

@section('content')
    <div class="jumbotron">
      <h1>{{$title}}</h1>
      <p>Selamat Datang di Website Blog dengan menggunakan Laravel ini. Dalam website blog laravel ini terdapat fitur mengenai about, post, service, serta terdapat fitur login dan register. Postingan dalam blog ini hanya bisa dilakukan apabila user telah mendaftar kedalam situs ini dan membuat sebuah artikel. Jika masih guest tidak dapat membuat artikel.</p>
      <p>Blog ini adalah blog pertama saya yang dibangun dengan menggunakan laravel 7 dan bootstrap 4.</p>
      <p>Terimakasih, semoga bermanfaat.</p>
      <p>Rifky Prayanta.</p>
    </div>
@endsection
        