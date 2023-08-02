@extends('admin.template.layout')
@section('content')
{{-- Hiển thị lỗi --}}
@if (Session::has('success'))
<p class="text-success">
    <i class="fa fa-check" aria-hidden="true"></i>{{ Session::get('success') }}
</p>
@endif

@if (Session::has('error'))
<p class="text-danger">
    <i class="fa fa-check" aria-hidden="true"></i>{{ Session::get('error') }}
</p>
@endif
<div class="col-md-6 mx-auto">
    <h2 class="mt-3 ">Đăng nhập</h2>
    <form action="{{route('login')}}" method="POST" class="mb-2" >
        @csrf
            <div class="mb-4" style="width: 400px;">
                <label for="exampleInputEmail1" class="form-label">User Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="username" aria-describedby="emailHelp">
                @error('username')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4" style="width: 400px;">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="exampleInputPassword1">
                @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <p>Đăng ký tài khoản mới?<a class="text-primary" href="{{route('register')}}">Đăng ký</a></p>
</div>
    
@endsection