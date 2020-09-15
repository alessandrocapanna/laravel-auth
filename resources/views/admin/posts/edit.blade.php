@extends('layouts.app')
@section('content')
  <h2>benvenuto modifica il post</h2>

  <form action="{{route('admin.posts.update', $post->id)}}" method="post">
  @csrf
  @method('PUT')
  <label for="title">titolo del post</label>
  <input type="text" name="title" placeholder="title" value="{{ $post->title }}">

  <label for="content">content</label>
  <input type="text" name="content" placeholder="content" value="{{ $post->title }}">

  <label for="image_path">url img</label>
  <input type="text" name="image_path" placeholder="image_path" value="{{ $post->image_path }}">

  <input type="submit" value="Invia">
  </form>
@endsection
