@extends('admin.template.layout')
@section('content')

<div class="table-responsive mt-5 mx-3">
    <h2 class="mb-4"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3.01" y2="6"></line><line x1="3" y1="12" x2="3.01" y2="12"></line><line x1="3" y1="18" x2="3.01" y2="18"></line></svg>List User Trashed</h2>
    @if(Session::has('success'))
    <p class="text-success">
        <i class="fa fa-check" aria-hidden="true"></i>{{Session::get('success')}}
    </p>
    @endif
    
    @if(Session::has('error'))
    <p class="text-danger">
        <i class="fa fa-check" aria-hidden="true"></i>{{Session::get('error')}}
    </p>
    @endif
    <table class="table table-bordered">
    <thead>
    <tr>
    <th scope="col">FullName</th>
    <th scope="col">Birthday</th>
    <th scope="col">Email</th>
    <th class="text-center" scope="col">Phone</th>
    <th class="text-center" scope="col">Gender</th>
    <th class="text-center" scope="col">Avatar</th>
    <th class="text-center" scope="col">Address</th>
    <th class="text-center" scope="col"><a href="{{route('user.list')}}" class="btn btn-outline-warning">List user</a></th>
    </tr>
    </thead>
    <tbody>

    @foreach($users as $user)
    <tr>
        <td>{{$user->fullname}}</td>
        <td>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
            <span class="table-inner-text">{{$user->birthday}}</span>
        </td>
        <td>{{$user->email}}</td>
        <td class="text-center">
            <span class="badge badge-light-success">{{$user->phone}}</span>
        </td>
      
        <td class="text-center">{{$user->gender?"Nam":"Nữ"}}</td>
        <td><img src="{{$user->avatar?Storage::url($user->avatar):"https://png.pngtree.com/element_our/png/20181206/users-vector-icon-png_260862.jpg"}}" width="80" height="80" alt=""></td>
        <td class="text-center">{{$user->address}}</td>
      
        <td class="text-center">
            <div class="action-btns">
                <a href="{{route('user.restore',['id'=>$user->id])}}" class="action-btn btn-edit bs-tooltip me-2" data-toggle="tooltip" data-placement="top" title="Restore">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-repeat"><polyline points="17 1 21 5 17 9"></polyline><path d="M3 11V9a4 4 0 0 1 4-4h14"></path><polyline points="7 23 3 19 7 15"></polyline><path d="M21 13v2a4 4 0 0 1-4 4H3"></path></svg>
                </a>
                <a href="{{route('user.forceDelete',['id'=>$user->id])}}" class="action-btn btn-delete bs-tooltip" data-toggle="tooltip" data-placement="top" title="Delete">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                </a>
            </div>
        </td>
        </tr>
    @endforeach
    </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{$users->links()}}
    </div>
    </div>

@endsection