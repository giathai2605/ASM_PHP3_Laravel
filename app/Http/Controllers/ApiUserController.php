<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserRescource;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;



class ApiUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::all();
      
        return UserRescource::collection($users);
        // return view('admin.user.index', compact(['users', 'title']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dd("store");
        $user = User::create($request->all());
        // return new UserRescource($user);
        return new UserRescource($user);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $user = User::find($id);
        // dd($user);
        if(!$user){
            return response()->json([
                'success' => false,
                'message' => 'Không tìm thấy người dùng'
            ], 404);
        }
        return new UserRescource($user);
        // return UserRescource::collection($user);

        // return view('admin.user.index', compact(['users', 'title']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        // dd("update");
        $user = User::find($id);
        if(!$user){
            return response()->json([
                'success' => false,
                'message' => 'Không tìm thấy người dùng'
            ], 404);
        }
        $user->update($request->all());
        return new UserRescource($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        // dd("destroy");
        $user = User::find($id);
        if(!$user){
            return response()->json([
                'success' => false,
                'message' => 'Không tìm thấy người dùng'
            ], 404);
        }
        $user->delete();
        return response()->json([
            'success' => true,
            'message' => 'Xóa thành công'
        ], 200);

    }
}
