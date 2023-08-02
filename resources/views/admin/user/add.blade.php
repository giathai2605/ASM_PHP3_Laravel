@extends('admin.template.layout')
@section('content')
<base href="http://127.0.0.1:8000">
    <form class="row g-3 mx-3 mt-2" method="POST" action="{{route('user.add')}}" enctype="multipart/form-data" >
      @csrf
        <div class="col-6">
            <label for="inputAddress" class="form-label">Full Name</label>
            <input type="text" name="fullname" class="form-control" id="inputFullname" value="{{old('fullname')}}" placeholder="Nguyễn Gia Thái">
            @error('fullname')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="col-6">
          <label for="inputAddress" class="form-label">Birthday</label>
          <input type="date" name="birthday" class="form-control" id="inputBirthday" value="{{old('birthday')}}" >
            @error('birthday')
            <small class="text-danger">{{$message}}</small>
            @enderror
      </div>
        <div class="col-md-6">
            <label for="inputEmail4" class="form-label">User Name</label>
            <input type="text" name="username" class="form-control" id="inputEmail4" value="{{old('username')}}" placeholder="User Name">
            @error('username')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="inputPassword4" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="inputPassword4" value="{{old('password')}}" placeholder="********">
            @error('password')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="inputEmail4" value="{{old('email')}}" placeholder="Your Email">
            @error('email')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="inputPassword4" class="form-label">Phone Number</label>
            <input type="text" name="phone" class="form-control" id="inputPassword4" value="{{old('phone')}}" placeholder="+84 904-609-542">
            @error('phone')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="col-12">
            <label for="inputAddress2" class="form-label">Address </label>
            <input type="text" name="address" class="form-control" id="inputAddress2" value="{{old('address')}}" placeholder="Apartment, studio, or floor">
            @error('address')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="col-md-3">
            <fieldset class="row ">
                <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
                <div class="col-sm-10 ps-4">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="gender1" value="1"
                            checked {{old('gender')?"checked":""}}>
                        <label class="form-check-label" for="gender1">
                            Nam
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="gender2" value="0" {{old('gender')?"":"checked"}}>
                        <label class="form-check-label" for="gender2">
                            Nữ
                        </label>
                    </div>
                    <div class="form-check disabled">
                        <input class="form-check-input" type="radio" name="gender" id="gender3" value="Khác"
                            disabled>
                        <label class="form-check-label" for="gender3">
                            Khác....
                        </label>
                    </div>
                </div>
            </fieldset>
            @error('gender')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="col-md-3">
            <label for="inputState" class="form-label">Role</label>
            <select id="inputState" class="form-select" name="role_id">
                <option selected value="">Choose...</option>
                @foreach($roles as $role)
                <option value="{{$role->id}}" {{old('role_id')==$role->id?"selected":""}}>{{$role->role_name}}</option>
                @endforeach
            </select>
            @error('role_id')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class=" col-md-6">
            <div class="row">
               <div class="col-md-8">
                <label for="inputState" class="form-label">Avatar</label>
                <input type="file" name="avatar" value="{{old('avatar')}}" id="avatar" class="form-control" id="inputGroupFile03" aria-describedby="inputGroupFileAddon03" aria-label="Upload">
               </div>
               <div class="col-md-4">
                <img width="80" height="60" src="https://png.pngtree.com/element_our/png/20181206/users-vector-icon-png_260862.jpg" alt="" class="img-fluid" id="image_preview">
               </div>
            </div>
            @error('avatar')
            <small class="text-danger">{{$message}}</small>
            @enderror

        </div>
        <div class="col-12 mt-4">
            <button type="submit" class="btn btn-primary">Thêm mới</button>
        </div>
    </form>


@endsection
