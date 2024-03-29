<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use app\Models\User;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $posts = Post::getAllOrderByUpdated_at();

        $user_id = Auth::user()->id;
        $user = User::find($user_id);
        return response()->view('post.index',compact('posts', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return response()->view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // バリデーション
        $validator = Validator::make($request->all(), [
            'post' => 'required | max:191',
            
        ]);
        // バリデーション:エラー
        if ($validator->fails()) {
            return redirect()
            ->route('post.create')
            ->withInput()
            ->withErrors($validator);
        }
        // create()は最初から用意されている関数
        // 戻り値は挿入されたレコードの情報""
        $data = $request->merge(['user_id' => Auth::user()->id])->all();
        $result = Post::create($data);


        // ルーティング「todo.index」にリクエスト送信（一覧ページに移動）
        return redirect()->route('post.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
  //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
    