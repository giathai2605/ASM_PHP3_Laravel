@extends('admin.template.layout')
@section('content')
    <form class="row g-3 mx-3 mt-2" method="POST" action="{{route('user.update',['id'=>$user->id])}}" enctype="multipart/form-data" >
        @method('PATCH')
        @csrf
        <div class="col-6">
            <label for="inputAddress" class="form-label">Full Name</label>
            <input type="text" name="fullname" class="form-control" id="inputFullname" value="{{$user->fullname}}" placeholder="Nguyễn Gia Thái">
            @error('fullname')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-6">
          <label for="inputAddress" class="form-label">Birthday</label>
          <input type="date" name="birthday" class="form-control" id="inputBirthday" value="{{$user->birthday}}" >
            @error('birthday')
            <div class="text-danger">{{ $message }}</div>
            @enderror
      </div>
        <div class="col-md-6">
            <label for="inputEmail4" class="form-label">User Name</label>
            <input type="text" name="username" class="form-control" id="inputEmail4" value="{{$user->username}}" placeholder="User Name">
            @error('username')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="inputEmail4" value="{{$user->email}}" placeholder="Your Email">
            @error('email')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="inputPassword4" class="form-label">Phone Number</label>
            <input type="text" name="phone" class="form-control" id="inputPassword4" value="{{$user->phone}}" placeholder="+84 904-609-542">
            @error('phone')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-6">
            <label for="inputAddress2" class="form-label">Address </label>
            <input type="text" name="address" class="form-control" id="inputAddress2" value="{{$user->address}}" placeholder="Apartment, studio, or floor">
            @error('address')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-3">
            <fieldset class="row ">
                <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
                <div class="col-sm-10 ps-4">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="gender1" value="1"
                           {{$user->gender?"checked":""}}>
                        <label class="form-check-label" for="gender1">
                            Nam
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="gender2" value="0" {{$user->gender?"":"checked"}}>
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
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-3">
            <label for="inputState" class="form-label">Role</label>
            <select id="inputState" class="form-select" name="role_id">
                @foreach($roles as $role)
                <option value="{{$role->id}}" {{$user->role_id==$role->id?"selected":""}}>{{$role->role_name}}</option>
                @endforeach
               
            </select>
            @error('role_id')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class=" col-md-6">
            <div class="row">
               <div class="col-md-8">
                <label for="inputState" class="form-label">Avatar</label>
                <input type="file" name="avatar" accept="image/*" value="{{$user->avatar}}" id="avatar" class="form-control" id="inputGroupFile03" aria-describedby="inputGroupFileAddon03" aria-label="Upload">
               </div>
               <div class="col-md-4 ">
                <img width="100" height="100%" src="{{$user->avatar?Storage::url($user->avatar):"https://png.pngtree.com/element_our/png/20181206/users-vector-icon-png_260862.jpg"}}" alt="" class="img-fluid avatar-lg" id="image_preview">
               </div>
            </div>

        </div>
        <div class="col-12 mt-4">
            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </div>
    </form>
@endsection
