@extends('admin.template.layout')
@section('content')

<form class="d-block row mx-3 mt-2 " method="POST" action="{{route('role.edit',['id'=>$role->id])}}" enctype="multipart/form-data" >
    @method('PATCH')
    @csrf
    <div class="row">
        <div class="col-md-6"><h2>Thêm mới vai trò</h2></div>
    </div>
    <div class="col-md-6 mt-1">
        <label for="inputAddress" class="form-label">ID</label>
        <input type="text" name="id" class="form-control" disabled placeholder="Auto Increment">
    </div>
      <div class="col-md-6 mt-1">
          <label for="inputAddress" class="form-label">Role Name</label>
          <input type="text" name="role_name" class="form-control"  value="{{$role->role_name}}" placeholder="Tên vai trò ....">
          @error('role_name')
          <small class="text-danger">{{$message}}</small>
          @enderror
      </div>

      <div class="col-12 mt-4">
        <button type="submit" class="btn btn-primary">Thêm mới</button>
    </div>
</form>


@endsection