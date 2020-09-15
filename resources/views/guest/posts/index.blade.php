@extends('layouts.app')
@section('content')
  <h2>benvenuto utente anonomo sei nella lista post</h2>
  <ul>
    @foreach ($posts as $post)
      <li>{{$post->title}}</li>
    @endforeach
  </ul>
@endsection
