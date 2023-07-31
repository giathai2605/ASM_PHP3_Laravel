@extends('admin.template.layout')
@section('content')
    <div class="table-responsive mt-5 mx-3">
        <div class="d-flex justify-content-between mt-2">
            <div>
                <a href="{{ route('role.list') }}">
                    <h2 class="mb-4"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-list">
                            <line x1="8" y1="6" x2="21" y2="6"></line>
                            <line x1="8" y1="12" x2="21" y2="12"></line>
                            <line x1="8" y1="18" x2="21" y2="18"></line>
                            <line x1="3" y1="6" x2="3.01" y2="6"></line>
                            <line x1="3" y1="12" x2="3.01" y2="12"></line>
                            <line x1="3" y1="18" x2="3.01" y2="18"></line>
                        </svg><span class="mx-1">List Roles</span></h2>
                </a>
            </div>
            <div>
                <form action="{{route('role.list')}}" method="post">
                    @csrf
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for..." name="keyword">
                        <button class="btn btn-primary" type="submit" id="button-addon2">Search</button>
                    </div>
                </form>
            </div>
            <div>
                <a class="btn btn-primary" href="{{ route('role.listTrashed') }}">

                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-trash-2">
                        <polyline points="3 6 5 6 21 6"></polyline>
                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                        </path>
                        <line x1="10" y1="11" x2="10" y2="17"></line>
                        <line x1="14" y1="11" x2="14" y2="17"></line>
                    </svg>
                    <span class="mx-1 fs-6 ">Vai trò đã xóa</span>
                </a>
            </div>
        </div>
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
        <table class="table table-bordered">
            <thead>
                <tr>
            
                    <th class="text-center" scope="col">ID</th>
                    <th class="text-center" scope="col">Role Name</th>
                    <th class="text-center" scope="col"><a href="{{ route('role.add') }}"
                            class="btn btn-outline-warning">Add new</a></th>
                </tr>
            </thead>
            <tbody>

                @foreach ($items as $item)
                    <tr>
                        <td class="text-center">
                            <span class="badge badge-light-success">{{ $item->id }}</span>
                        </td>
                        <td class="text-center">{{ $item->role_name }}</td>
                        <td class="text-center">
                            <div class="action-btns">
                                <a href="{{ route('role.edit', ['id' => $item->id]) }}"
                                    class="action-btn btn-edit bs-tooltip me-2" data-toggle="tooltip"
                                    data-placement="top" title="Edit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2">
                                        <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                    </svg>
                                </a>
                                <a href="{{ route('role.delete', ['id' => $item->id]) }}"
                                    onclick="return confirm('Bạn có chắc chắn muốn xóa không?')"
                                    class="action-btn btn-delete bs-tooltip" data-toggle="tooltip" data-placement="top"
                                    title="Delete">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2">
                                        <polyline points="3 6 5 6 21 6"></polyline>
                                        <path
                                            d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                        </path>
                                        <line x1="10" y1="11" x2="10" y2="17"></line>
                                        <line x1="14" y1="11" x2="14" y2="17"></line>
                                    </svg>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{ $items->appends(request()->except(['_token']))->links() }}
        </div>

    </div>
@endsection
