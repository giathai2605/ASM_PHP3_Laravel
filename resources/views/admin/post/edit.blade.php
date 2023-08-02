@extends('admin.template.layout')
@section('content')

<form class="d-block row mx-3 mt-2 " method="POST" action="{{route('post.edit',['id'=>$post->id])}}" enctype="multipart/form-data" >
    @method('PATCH')
    @csrf
    <div class="row">
        <div class="col-md-6"><h2>Thêm mới bài viết</h2></div>
    </div>
    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
    <div class="row">
        <div class="col-md-8 mt-1">
            <label for="inputAddress" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" id="inputFullname" value="{{$post->title}}" placeholder="Tin tức ....">
            @error('title')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="col-md-4 mt-1">
          <label for="inputState" class="form-label">Category</label>
          <select id="inputState" class="form-select" name="category_id">
              <option selected value="">Choose...</option>
              @foreach($postCategories as $item)
              <option value="{{$item->id}}" {{$post->category_id == $item->id?"selected":""}}>{{$item->name}}</option>
              @endforeach
          </select>
          @error('category_id')
          <small class="text-danger">{{$message}}</small>
          @enderror
      </div>
    </div>
      <div class="col-md-12 mt-1">
        <label for="inputState" class="form-label">Content</label>
        <textarea name="content" id="my-editor" class="form-control ">{{$post->content}}</textarea>
          @error('content')
          <small class="text-danger">{{$message}}</small>
          @enderror
      </div>

      <div class="col-12 mt-4">
        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </div>
</form>

<script src="{{asset('js/app.js')}}">
</script>
@endsection

