<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use app\Models\User;

class ReplyController extends Controller
{
    //
    /**
     * ツイートに対する返信を保存
     *
     * @param  Request  $request
     * @param  int  $tweetId
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $postId)
    {
        // バリデーション
        $validatedData = $request->validate([
            'content' => 'required|max:280', // 280文字までとする例
        ]);

        // ツイートを取得
        $post = Post::findOrFail($postId);

        // 新しい返信を作成
        $reply = new Post;
        $reply->post = $request->content;
        $reply->user_id = auth()->id();
        $reply->parent_id = $post->id;
        $auth = Auth::user()->id;
        $reply->user_icon = User::find($auth)->icon;
        
        $reply->save();
        
        return redirect()->back()->with('success', 'Reply posted successfully!');
    }
}
