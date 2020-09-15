@extends('layouts.app')
@section('content')
  <h2>benvenuto {{$user->name}},sei nella lista post</h2>
  <a class="btn btn-primary" href="{{ route('admin.posts.create')}}">crea nuovo post </a>
  <ul>
    @foreach ($posts as $post)
      <li>{{$post->title}}</li>
      <a class="btn btn-primary" href="{{ route('admin.posts.show', $post)}}">Visualizza</a>
    @endforeach
  </ul>
@endsection
