@extends('admin.template.layout')
@section('content')
    <div class="table-responsive mt-5 mx-3">
        <div class="d-flex justify-content-between mt-2">
            <div>
                <a href="{{ route('propertyCategory.list') }}">
                    <h2 class="mb-4"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-list">
                            <line x1="8" y1="6" x2="21" y2="6"></line>
                            <line x1="8" y1="12" x2="21" y2="12"></line>
                            <line x1="8" y1="18" x2="21" y2="18"></line>
                            <line x1="3" y1="6" x2="3.01" y2="6"></line>
                            <line x1="3" y1="12" x2="3.01" y2="12"></line>
                            <line x1="3" y1="18" x2="3.01" y2="18"></line>
                        </svg><span class="mx-1">List Category</span></h2>
                </a>
            </div>
            <div>
                <form action="{{route('propertyCategory.listTrashed')}}" method="post">
                    @csrf
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for..." name="keyword">
                        <button class="btn btn-primary" type="submit" id="button-addon2">Search</button>
                    </div>
                </form>
            </div>
            <div>
                <a class="btn btn-primary" href="{{ route('propertyCategory.list') }}">

                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-list">
                        <line x1="8" y1="6" x2="21" y2="6"></line>
                        <line x1="8" y1="12" x2="21" y2="12"></line>
                        <line x1="8" y1="18" x2="21" y2="18"></line>
                        <line x1="3" y1="6" x2="3.01" y2="6"></line>
                        <line x1="3" y1="12" x2="3.01" y2="12"></line>
                        <line x1="3" y1="18" x2="3.01" y2="18"></line>
                    </svg>
                    <span class="mx-1 fs-6 ">Danh mục bất động sản</span>
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
                    <th class="text-center" scope="col">Category Name</th>
                    <th class="text-center" scope="col">Image</th>
                    <th class="text-center" scope="col">Description</th>
                    <th class="text-center" scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($items as $item)
                    <tr>
                        <td class="text-center">
                            <span class="badge badge-light-success">{{ $item->id }}</span>
                        </td>
                        <td class="text-center">{{ $item->name }}</td>
                        <td><img src="{{ $item->image ? Storage::url($item->image) : 'https://png.pngtree.com/element_our/png/20181206/users-vector-icon-png_260862.jpg' }}"
                                width="80" height="80" alt=""></td>
                                <td class="text-center">{{ $item->description ? $item->description : "Chưa có mô tả..."}}</td>

                        <td class="text-center">
                            <div class="action-btns">
                                <a href="{{route('propertyCategory.restore',['id'=>$item->id])}}" class="action-btn btn-edit bs-tooltip me-2" data-toggle="tooltip" data-placement="top" title="Restore">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-repeat"><polyline points="17 1 21 5 17 9"></polyline><path d="M3 11V9a4 4 0 0 1 4-4h14"></path><polyline points="7 23 3 19 7 15"></polyline><path d="M21 13v2a4 4 0 0 1-4 4H3"></path></svg>
                                </a>
                                <a href="{{route('propertyCategory.forceDelete',['id'=>$item->id])}}" class="action-btn btn-delete bs-tooltip" data-toggle="tooltip" data-placement="top" title="Delete">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
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
