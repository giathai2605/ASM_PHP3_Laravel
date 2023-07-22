@extends('admin.template.layout')
@section('content')

    <div class="container py-5">

      <div class="row">

        <div class="col-lg-4">
          <div class="card mb-4">
            <div class="card-body text-center">
              <img src="{{ $user->avatar ? Storage::url($user->avatar) : 'https://png.pngtree.com/element_our/png/20181206/users-vector-icon-png_260862.jpg' }}" alt="avatar"
                class="rounded-circle img-fluid" style="width: 150px; height: 150px">
              <h5 class="my-3">{{$user->fullname}}</h5>
              <p class="text-muted mb-1">{{$user->role_name}}</p>
              <p class="text-muted mb-4">Giới tính: {{' '.$user->gender ? 'Nam' : 'Nữ'}}{{' & '.$user->birthday.' '}}</p>
              <div class="d-flex justify-content-center mb-2 gap-1">
                <a href="{{ route('user.edit', ['id' => $user->id]) }}" class="btn btn-primary">Edit Profile</a>
                <a href="{{ route('user.changePassword', ['id' => $user->id]) }}" class="btn btn-outline-primary">Change Password</a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-8">
          <div class="card mb-4">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Full Name</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{$user->fullname}}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">User Name</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{$user->username}}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Email</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{$user->email}}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Phone</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{$user->phone}}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Birthday</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{$user->birthday}}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Address</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{$user->address}}</p>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </div>



@endsection