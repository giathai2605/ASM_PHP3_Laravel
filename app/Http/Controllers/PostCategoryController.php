<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostCategory;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\PostCategoryRequest;
use Illuminate\Support\Facades\Storage;

class PostCategoryController extends Controller
{
    //
    protected $postCategory;

    public function __construct()
    {
        $this->postCategory = new PostCategory();
    }

    public function list(Request $request)
    {
        $items = PostCategory::paginate(3);
        $title = 'Danh sách loại bài viết';
        if ($request->keyword) {
            // dd($request->keyword);
            $items = PostCategory::where('name', 'like', '%' . $request->keyword . '%')->paginate(3);
        }

        return view('admin.postCategory.index', compact(['items', 'title']));
    }

    public function listTrashed(Request $request){
        $items = PostCategory::onlyTrashed()->paginate(3);
        $title = 'Danh sách loại bài viết đã xóa';
        if ($request->keyword) {
            // dd($request->keyword);
            $items = PostCategory::onlyTrashed()->where('name', 'like', '%' . $request->keyword . '%')->paginate(3);
        }
        return view('admin.postCategory.trashed', compact(['items', 'title']));
    }

    public function add(PostCategoryRequest $request)
    {
        $title = 'Thêm loại bài viết';
        if ($request->isMethod('POST')) {
            $data = $request->except(['_token']);
            if($request->hasFile('image')){
                $data['image'] =uploadFile('uploads/post-category', $request->file('image'));
            }
            $this->postCategory->fill($data);
            $this->postCategory->save();
            if($this->postCategory->save()){
                session()->flash('success', 'Thêm mới thành công');
            }else{
                session()->flash('error', 'Thêm mới thất bại');
                return redirect()->route('postCategory.add');
            }
            return redirect()->route('postCategory.list');
        }
        return view('admin.postCategory.add', compact(['title']));
    }


    public function edit($id, Request $request)
    {
        $title = 'Sửa loại bài viết';
        $item = PostCategory::find($id);
        if ($request->isMethod('PATCH')) {
            $data = $request->except(['_token']);
            if($request->hasFile('image')){
                if($item->image){
                     Storage::delete('public/'.$item->image);
                }
                $data['image'] =uploadFile('uploads/post-category', $request->file('image'));
            }
            $item->fill($data);
            $item->update();
            if($item->update()){
                session()->flash('success', 'Sửa thành công');
            }else{
                session()->flash('error', 'Sửa thất bại');
                return redirect()->route('postCategory.edit', ['id' => $id]);
            }
            return redirect()->route('postCategory.list');
        }
        return view('admin.postCategory.edit', compact(['title', 'item']));
    }

    public function delete($id)
    {
        $item = PostCategory::find($id);
        $item->delete();
     if($item->delete()){
         session()->flash('success', 'Xóa thành công');
        }else{
            session()->flash('error', 'Xóa thất bại');
        }
        return redirect()->route('postCategory.list');
    }

    public function restore($id)
    {
        $item = PostCategory::onlyTrashed()->find($id);
        if($item){
            $item->restore();
            session()->flash('success', 'Khôi phục thành công');
            return back();
        }else{
            session()->flash('error', 'Khôi phục thất bại');
            return back();
        }
    }

    public function forceDelete($id)
    {
        $item = PostCategory::onlyTrashed()->find($id);
        if ($item) {
            $item->forceDelete();
            session()->flash('success', 'Xóa vĩnh viễn thành công');
            return back();
        } else {
            session()->flash('error', 'Xóa vĩnh viễn thất bại');
            return back();
        }
    }

}
