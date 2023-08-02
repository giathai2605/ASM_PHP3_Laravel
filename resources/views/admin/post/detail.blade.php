@extends('admin.template.layout')
@section('content')

<div class="row mt-3 mx-3">
    <div class="d-flex justify-content-between mt-2 mb-2">
        <div class="">
            <h2>Chi tiết bài viết</h2>
            <br>
            <h5>Tác giả: {{$author->fullname}}</h5>
        </div>
        <div class="">
            <a class="btn btn-warning" href="{{ route('post.list') }}">
                <span class="mx-1 fs-6 ">Danh sách bài viết</span>
            </a>
        </div>
    </div>
 
    <div class="col-md-10 mx-auto">
        <div class="row">
            <div class="col-md-12">
                <h1>{{$post->title}}</h1>
            </div>
            <div class="col-md-12">
                <p>{!!$post->content!!}</p>
            </div>
        </div>
    </div>

</div>

@endsection