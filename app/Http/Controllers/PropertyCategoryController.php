<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PropertyCategory;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\PropertyCategoryRequest;
use Illuminate\Support\Facades\Storage;

class PropertyCategoryController extends Controller
{
    //
    protected $propertyCategory;

    public function __construct()
    {
        $this->propertyCategory = new PropertyCategory();
    }

    public function list(Request $request)
    {
        $items = PropertyCategory::paginate(3);
        $title = 'Danh sách loại bất động sản';
        if ($request->keyword) {
            // dd($request->keyword);
            $items = PropertyCategory::where('name', 'like', '%' . $request->keyword . '%')->paginate(3);
        }

        return view('admin.propertyCategory.index', compact(['items', 'title']));
    }

    public function listTrashed(Request $request){
        $items = PropertyCategory::onlyTrashed()->paginate(3);
        $title = 'Danh sách loại bất động sản đã xóa';
        if ($request->keyword) {
            // dd($request->keyword);
            $items = PropertyCategory::onlyTrashed()->where('name', 'like', '%' . $request->keyword . '%')->paginate(3);
        }
        return view('admin.propertyCategory.trashed', compact(['items', 'title']));
    }

    public function add(PropertyCategoryRequest $request)
    {
        $title = 'Thêm loại bất động sản';
        if ($request->isMethod('POST')) {
            $data = $request->except(['_token']);
            if($request->hasFile('image')){
                $data['image'] =uploadFile('uploads/property-category', $request->file('image'));
            }
            $this->propertyCategory->fill($data);
            $this->propertyCategory->save();
            if($this->propertyCategory->save()){
                session()->flash('success', 'Thêm mới thành công');
            }else{
                session()->flash('error', 'Thêm mới thất bại');
                return redirect()->route('propertyCategory.add');
            }
            return redirect()->route('propertyCategory.list');
        }
        return view('admin.propertyCategory.add', compact(['title']));
    }

    public function edit(PropertyCategoryRequest $request, $id)
    {
        $title = 'Cập nhật loại bất động sản';
        $item = PropertyCategory::find($id);
        if ($request->isMethod('PATCH')) {
            $data = $request->except(['_token']);
            if($request->hasFile('image')){
               if($item->image){
                Storage::delete('public/'.$item->image);
                }
                $data['image'] =uploadFile('uploads/property-category', $request->file('image'));
            }
            $item->fill($data);
            $item->update();
            if($item->update()){
                session()->flash('success', 'Cập nhật thành công');
                return redirect()->route('propertyCategory.list');
            }else{
                session()->flash('error', 'Cập nhật thất bại');
                return redirect()->route('propertyCategory.edit', ['id' => $id]);
            }
         
        }
        return view('admin.propertyCategory.edit', compact(['title', 'item']));
    }

    public function delete($id)
    {
        $item = PropertyCategory::find($id);
        $item->delete();
        if($item->delete()){
            session()->flash('success', 'Xóa thành công');
        }else{
            session()->flash('error', 'Xóa thất bại');
        }
        return redirect()->route('propertyCategory.list');
    }

    public function restore($id)
    {
        $item = PropertyCategory::withTrashed()->find($id);
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
        $item = PropertyCategory::withTrashed()->find($id);
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
