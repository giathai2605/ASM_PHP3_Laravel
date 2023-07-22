@extends('admin.template.layout')
@section('content')
    <div class="row g-0">
        <div class="col-xl-9 col-lg-8">
            <div class="authentication-page-content">
                <div class="d-flex flex-column h-100 px-4 pt-4">
                    <div class="row justify-content-center my-auto">
                        <div class="col-sm-8 col-lg-6 col-xl-5 col-xxl-4">

                            <div class="py-md-5 py-4">

                                <div class="text-center mb-5">
                                    <h3>Change Password</h3>
                                </div>
                                <div class="user-thumb text-center mb-4">
                                    <img src="{{ $user->avatar ? Storage::url($user->avatar) : 'https://png.pngtree.com/element_our/png/20181206/users-vector-icon-png_260862.jpg' }}"
                                        class="rounded-circle img-thumbnail avatar-xl" alt="thumbnail">
                                    <h5 class="font-size-15 mt-3">{{ $user->fullname }}</h5>
                                </div>
                                <form action="{{route('user.changePassword', ['id' => $user->id])}}" method="POST">
                                    @method('PATCH')
                                    @csrf
                                    <div class="mb-3">
                                        <label for="oldpassword-input" class="form-label">Old Password</label>
                                        <input type="text" name="current_password" value="{{old('current_password')}}" class="form-control" id="oldpassword-input"
                                            placeholder="Enter Old Password">
                                        @error('current_password')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                        @if (Session::has('error'))
                                        <p class="text-danger">
                                            <i class="fa fa-check" aria-hidden="true"></i>{{ Session::get('error') }}
                                        </p>
                                        @endif
                                    </div>

                                    <div class="mb-3">
                                        <label for="newpassword-input" class="form-label">New Password</label>
                                        <div class="position-relative auth-pass-inputgroup mb-3">
                                            <input type="password" name="password" class="form-control pe-5"
                                                placeholder="Enter New Password" id="password-input">
                                            @error('password')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="confirmpassword-input" class="form-label">Confirm New Password</label>
                                        <input type="confirm_password" name="confirm_password" class="form-control" id="confirmpassword-input"
                                            placeholder="Enter Confirm Password">
                                        @error('confirm_password')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="text-center mt-4">
                                        <div class="row">
                                            <div class="col-6">
                                                <button class="btn btn-primary w-100" type="submit">Save</button>
                                            </div>
                                            <div class="col-6">
                                                <button class="btn btn-light w-100" type="reset">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </form><!-- end form -->
                            </div>
                        </div><!-- end col -->
                    </div><!-- end row -->
                @endsection
