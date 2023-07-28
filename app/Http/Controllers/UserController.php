<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    //
    protected $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login'); // Điều hướng về trang chủ hoặc bất kỳ trang nào bạn muốn sau khi logout
    }

    public function login(Request $request)
    {
        $title = 'Đăng nhập';
        if ($request->isMethod('POST')) {
            $data = $request->except(['_token']);
            $user = User::where('username', $data['username'])->first();
            if (Auth::attempt(['username' => $data['username'], 'password' => $data['password']])) {
                // dd($user);   
                session()->put('user', $user);
                session::flash('success', 'Đăng nhập thành công');
                return redirect()->route('user.list');
            } else {
                session()->flash('error', 'Sai tên đăng nhập hoặc mật khẩu!');
                return redirect()->route('login');
            }
        }
        // dd(123);
        return view('auth.login', compact(['title']));
    }

    public function list(Request $request)
    {
        $users = User::paginate(4);
        $title = 'Danh sách người dùng';
        if ($request->search_name) {
            $users = User::where('fullname', 'like', '%' . $request->search_name . '%')->paginate(4);
        }

        return view('admin.user.index', compact(['users', 'title']));
    }

    public function listTrashed()
    {
        $users = User::onlyTrashed()->paginate(4);
        $title = 'Danh sách đã xóa';
        return view('admin.user.trash', compact(['users', 'title']));
    }

    public function detail($id)
    {
        $title = 'Chi tiết người dùng';
        $user = User::join('roles', 'users.role_id', '=', 'roles.id')->select('users.*', 'roles.role_name as role_name')->where('users.id', $id)->first();

        return view('admin.user.detail', compact(['title', 'user']));
    }

    public function viewAdd()
    {
        $title = 'Thêm mới người dùng';
        $roles = Role::all();
        return view('admin.user.add', compact(['title', 'roles']));
    }

    public function addNew(UserRequest $request)
    {

        $data = $request->except(['_token']);

        if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
            $data['avatar'] = uploadFile('uploads/avatar', $request->file('avatar'));
            // dd($data['avatar']);
        }

        $data['password'] = Hash::make($request->password);

        $this->user->fill($data);
        // dd($this->customer);
        $this->user->save();

        if ($this->user->save()) {
            session::flash('success', 'Thêm mới thành công');
            return redirect()->route('user.list');
        } else {
            session()->flash('error', 'Thêm mới thất bại');
            return redirect()->route('user.viewAdd');
        }
    }

    public function edit($id)
    {
        $title = 'Cập nhật người dùng';
        $user = User::find($id);
        $roles = Role::all();
        return view('admin.user.edit', compact(['title', 'user', 'roles']));
    }

    public function update(UserRequest $request, $id)
    {
        if (!$this->user) {
            // Nếu không tìm thấy khách hàng, xử lý lỗi tại đây (ví dụ: hiển thị thông báo lỗi)
            session()->flash('error', 'Không tìm thấy khách hàng');
            return redirect()->route('user.list');
        }

        $this->user = User::find($id);
        $data = $request->except(['_token','password']);

        if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
            if($this->user->avatar){
                Storage::delete('public/' . $this->user->avatar);
            }
            $data['avatar'] = uploadFile('uploads/avatar', $request->file('avatar'));
            // dd($data['avatar']);
        }
        // dd($data['avatar']);
        // Kiểm tra xem có mật khẩu mới được nhập hay không


        // dd($data['avatar']);
        // Cập nhật thông tin của khách hàng dựa vào dữ liệu mới
        $this->user->fill($data);
        $this->user->update();


        if ($this->user->update()) {
            session()->flash('success', 'Cập nhật thành công');
            return redirect()->route('user.list');
        } else {
            session()->flash('error', 'Cập nhật thất bại');
            return redirect()->route('user.edit', ['id' => $id]);
        }
    }

    public function delete($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
            session::flash('success', 'Xóa thành công');
            return back();
        } else {
            session::flash('error', 'Xóa thất bại');
            return back();
        }
    }

    public function restore($id)
    {
        $user = User::onlyTrashed()->find($id);
        if ($user) {
            $user->restore();
            session()->flash('success', 'Khôi phục thành công');
            return back();
        } else {
            session()->flash('error', 'Khôi phục thất bại');
            return back();
        }
    }

    public function forceDelete($id)
    {
        $user = User::onlyTrashed()->find($id);
        if ($user) {
            $user->forceDelete();
            session()->flash('success', 'Xóa vĩnh viễn thành công');
            return back();
        } else {
            session()->flash('error', 'Xóa vĩnh viễn thất bại');
            return back();
        }
    }

    public function changePassowrd(UserRequest $request, $id)
    {
        $title = 'Đổi mật khẩu';
        $user = User::find($id);

        if ($request->isMethod('patch')) {

            if (!Hash::check($request->current_password, $user->password)) {
                session()->flash('error', 'Mật khẩu hiện tại không đúng');
                return redirect()->route('user.changePassword', ['id' => $id]);
            } else {

                $data = $request->only(['password']);
                $data['password'] = Hash::make($request->password);
                $user->fill($data);
                $user->update();
                if ($user->update()) {
                    session()->flash('success', 'Đổi mật khẩu thành công');
                    return redirect()->route('user.list');
                } else {
                    session()->flash('error', 'Đổi mật khẩu thất bại');
                    return redirect()->route('user.changePassword', ['id' => $id]);
                }
            }

            // Kiểm tra mật khẩu hiện tại



        }
        return view('admin.user.changePassword', compact(['title', 'user']));
    }
}
