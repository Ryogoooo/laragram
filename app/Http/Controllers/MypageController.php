<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\User;
use Illuminate\Support\Facades\Auth;

class MypageController extends Controller
{
    //
    public function index (){
        $auth = Auth::user()->id;
        $item = User::find($auth);
        return response()->view('mypage.mypage', compact('item'));
    }
}
