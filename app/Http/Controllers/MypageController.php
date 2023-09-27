<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\User;
use Illuminate\Support\Facades\Auth;
use Validator;

class MypageController extends Controller
{
    //
    public function index (){
        $auth = Auth::user()->id;
        $item = User::find($auth);
        return response()->view('mypage.mypage', compact('item'));
    }

    public function store (Request $request) {
        $image = $request->file('profile_image')->store('public/image');

        $image_path = str_replace('public/image/', '', $image);

        $user_id = Auth::user()->id;
        $user = User::find($user_id);
        $user->icon = $image_path;
        $user->save();
        
        return redirect('/mypage');
  
    }
}
