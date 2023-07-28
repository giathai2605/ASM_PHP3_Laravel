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

    <form action="{{route('login')}}" method="POST">
        @csrf
            <div class="mb-4" style="width: 400px;">
                <label for="exampleInputEmail1" class="form-label">User Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="username" aria-describedby="emailHelp">
            </div>
            <div class="mb-4" style="width: 400px;">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="exampleInputPassword1">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <p>Đăng ký tài khoản mới?<a href="">Đăng ký</a></p>
@endsection