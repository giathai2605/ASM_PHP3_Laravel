<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Support\Facades\Session;
use App\Models\User;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Hash;
use App\Http\Requests\PostRequest;


class PostController extends Controller
{
    //
    protected $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function list(Request $request)
    {
        
        $items = Post::paginate(5);
        $title = 'Danh sách bài viết';
        if($request->keyword){
            $items = Post::where('title', 'like', '%'.$request->keyword.'%')->paginate(5);
        }
        return view('admin.post.index', compact(['title', 'items']));
    }

    public function listTrashed(Request $request)
    {
        $posts = Post::onlyTrashed()->paginate(10);
        return view('post.listTrashed', compact('posts'));
    }

    public function add(PostRequest $request)
    {
        $title = 'Thêm bài viết';
        $postCategories = PostCategory::all();
        if($request->isMethod('post')){
            $post = new Post();
            $post->fill($request->except(['_token']));
            // dd($post);
            $post->save();
            if($post){
                Session::flash('success', 'Thêm mới thành công');
            }else{
                Session::flash('error', 'Thêm mới thất bại');
                return redirect()->route('post.add');
            }
            return redirect()->route('post.list');
        }
        return view('admin.post.add', compact(['title', 'postCategories']));
    }

    public function detail($id)
    {
        $post = Post::find($id);
        $author = User::find($post->user_id);
        $title = 'Chi tiết bài viết';
        return view('admin.post.detail', compact(['title', 'post', 'author']));
    }
    public function edit(PostRequest $request, $id)
    {
        $post = Post::find($id);
        $title = 'Sửa bài viết';
        $postCategories = PostCategory::all();
        if($request->isMethod('PATCH')){
            $post->fill($request->except(['_token']));
            $post->update();
            if($post->update()){
                Session::flash('success', 'Sửa thành công');
            }else{
                Session::flash('error', 'Sửa thất bại');
                return redirect()->route('post.edit', ['id' => $id]);
            }
            return redirect()->route('post.list');
        }
        return view('admin.post.edit', compact(['title', 'post', 'postCategories']));
    }

    public function delete($id)
    {
        $post = Post::find($id);
        $post->delete();
        if($post->delete()){
            Session::flash('success', 'Xóa thành công');
        }else{
            Session::flash('error', 'Xóa thất bại');
            return redirect()->route('post.list');
        }
        return redirect()->route('post.list');
    }



  
 

}
