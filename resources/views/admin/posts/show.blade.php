<div class="container">
  <div class="row">
    <div class="col-12">
      <h2>{{$post->title}}</h2>
      <img src="{{$post->image_path}}" alt="">
      <a class="btn btn-primary" href="{{ route('admin.posts.index')}}">go back</a>
      <a class="btn btn-primary" href="{{ route('admin.posts.edit', $post)}}">modifica</a>
      <form class="delete" action="{{ route('admin.posts.destroy', $post) }}" method="post">
        @csrf
        @method('DELETE')
          <input type="submit" value="Elimina">
      </form>
    </div>
  </div>
</div>
