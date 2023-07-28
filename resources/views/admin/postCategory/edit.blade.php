@extends('admin.template.layout')
@section('content')

<form class="d-block row mx-3 mt-2 " method="POST" action="{{route('postCategory.edit',['id'=>$item->id])}}" enctype="multipart/form-data" >
    @method('PATCH')
    @csrf
    <div class="row">
        <div class="col-md-6"><h2>Cập nhật danh mục</h2></div>
    </div>
      <div class="col-md-6 mt-1">
          <label for="inputAddress" class="form-label">Category Name</label>
          <input type="text" name="name" class="form-control" id="inputFullname" value="{{$item->name}}" placeholder="Chung cư ....">
          @error('name')
          <small class="text-danger">{{$message}}</small>
          @enderror
      </div>
      <div class="col-md-6 mt-1">
          <label for="inputEmail4" class="form-label">Description</label>
          <input type="text" name="description" class="form-control" id="inputEmail4" value="{{$item->description}}" placeholder="Mô tả danh mục ...">
          @error('description')
          <small class="text-danger">{{$message}}</small>
          @enderror
      </div>
      <div class="col-md-6 mt-1">
        <div class="row">
            <div class="col-md-10">
             <label for="inputState" class="form-label">Image</label>
             <input type="file" name="image" value="{{$item->image}}" id="image" class="form-control" id="inputGroupFile03" aria-describedby="inputGroupFileAddon03" aria-label="Upload">
            </div>
            <div class="col-md-2">
             <img width="80" height="60" src="{{ $item->image ? Storage::url($item->image) : 'https://png.pngtree.com/element_our/png/20181206/users-vector-icon-png_260862.jpg'}}" alt="" class="img-fluid" id="image_preview">
            </div>
         </div>
          @error('image')
          <small class="text-danger">{{$message}}</small>
          @enderror
      </div>

      <div class="col-12 mt-4">
        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </div>
</form>


@endsection