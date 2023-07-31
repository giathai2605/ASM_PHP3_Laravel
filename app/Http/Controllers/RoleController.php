<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    //
    protected $role;

    public function __construct()
    {
        $this->role = new Role();
    }

    public function list(Request $request){
        $title = 'Danh sách vai trò';
        $items = Role::paginate(5);
        if($request->keyword){
            $items = Role::where('role_name','like','%'.$request->keyword.'%')->paginate(5);
        }
        return view('admin.role.index',compact(['title','items']));
    }

    public function listTrashed(Request $request){
        $title = 'Danh sách vai trò đã xóa';
        $items = Role::onlyTrashed()->paginate(5);
        if($request->keyword){
            $items = Role::onlyTrashed()->where('role_name','like','%'.$request->keyword.'%')->paginate(5);
        }
        return view('admin.role.trashed',compact(['title','items']));
    }

    public function add(Request $request){
        $title = 'Thêm mới vai trò';
        if($request->isMethod('POST')){
            $data = $request->except(['_token']);
            $this->role->fill($data);
            $this->role->save();
            if($this->role->save()){
                session()->flash('success','Thêm mới thành công');
            }else{
                session()->flash('error','Thêm mới thất bại');
                return redirect()->route('role.add');
            }
            return redirect()->route('role.list');
        }
        return view('admin.role.add',compact(['title']));
    }

    public function edit(Request $request, $id){
        $title = 'Cập nhật vai trò';
        $role = Role::find($id);
        if($request->isMethod('PATCH')){
            $data = $request->except(['_token']);
            $role->fill($data);
            $role->update();
            if($role->update()){
                session()->flash('success','Cập nhật thành công');
            }else{
                session()->flash('error','Cập nhật thất bại');
                return redirect()->route('role.edit',['id'=>$id]);
            }
            return redirect()->route('role.list');
        }
        return view('admin.role.edit',compact(['title','role']));
    }

    public function delete($id){
        $role = Role::find($id);
        if($role){
            $role->delete();
            Session()->flash('success','Xóa thành công');
        }else{
            Session()->flash('error','Xóa thất bại');
        }
        
        return redirect()->route('role.list');
    }

    public function restore($id){
        $role = Role::withTrashed()->find($id);
        if($role){
            $role->restore();
            Session()->flash('success','Khôi phục thành công');
        }else{
            Session()->flash('error','Khôi phục thất bại');
        }
        return redirect()->route('role.listTrashed');
    }

    public function forceDelete($id){
        $role = Role::withTrashed()->find($id);
        if($role){
            $role->forceDelete();
            Session()->flash('success','Xóa vĩnh viễn thành công');
        }else{
            Session()->flash('error','Xóa vĩnh viễn thất bại');
        }
        return redirect()->route('role.listTrashed');
    }
   
}
