@extends('layouts.app')
@section('content')
  <h2>benvenuto {{$user->name}},crera un post</h2>

  <form action="{{route('admin.posts.store')}}" method="post">
  @csrf
  @method('POST')
  <label for="title">titolo del post</label>
  <input type="text" name="title" placeholder="title" value="title">

  <label for="content">content</label>
  <input type="text" name="content" placeholder="content" value="content">

  <label for="content">url img</label>
  <input type="text" name="image_path" placeholder="image_path" value="image_path">

  <input type="submit" value="Invia">
  </form>
@endsection
