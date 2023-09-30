
<link rel="stylesheet" href="{{asset( 'css/mypage.css' )}}">
<script src="{{ asset( 'js/mypage.js' )}}"></script>


<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-200">
      {{ __('Mypage')}}
    </h2>
  </x-slot>

  <div class="box">
    <p class="name">名前</p>
    <p class="name">
      <span class="username">{{ $item->name }}</span>
    </p>
    <p class="image">プロフィール画像</p>
    <form action="{{ route('icon') }}" method="post" enctype="multipart/form-data">
      @csrf
      <img src="{{ asset('storage/image/' . $item->icon) }}" class="name" width="300" height="300">
      <input type="file" class="name" name="profile_image">
      <input type="submit" value="決定" >
    </form>
    <p class="image">お絵かき</p>
    <p class="paint">キャンバスに猫の絵をかいてプロフィール画像に設定しよう！</p>
  
    <div id="main">

      <canvas id="cv" width ="243.5" height="243.5"></canvas>

      <div id="ctrl">
      
        <!-- 「線の太さ」ボタン群 -->
        <span class="wds cur" wd="1"><span id="w1"></span></span>
        <span class="wds" wd="2"><span id="w2"></span></span>
        <span class="wds" wd="3"><span id="w3"></span></span>
        <span class="wds" wd="4"><span id="w4"></span></span>
        <span class="wds" wd="5"><span id="w5"></span></span>
        <span class="wds" wd="6"><span id="w6"></span></span>
        <span class="wds" wd="7"><span id="w7"></span></span>
        <span class="wds" wd="8"><span id="w8"></span></span>
        <span class="wds" wd="9"><span id="w9"></span></span>
        <span class="wds" wd="10"><span id="w10"></span></span>
        <span class="wds" wd="11"><span id="w11"></span></span>
        <span class="wds" wd="12"><span id="w12"></span></span>
        <span class="wds" wd="13"><span id="w13"></span></span>
      
        <!-- 「線の太さ」選択枠 -->
        <input type="number" id="width" min="1" value="20"><br>
      
        <!-- 「線の色」ボタン群 -->
        <span class="cls cur" cl="#000"><span id="c1"></span></span>
        <span class="cls" cl="#fff"><span id="c2"></span></span>
        <span class="cls" cl="#f00"><span id="c3"></span></span>
        <span class="cls" cl="#080"><span id="c4"></span></span>
        <span class="cls" cl="#00f"><span id="c5"></span></span>
        <span class="cls" cl="#800"><span id="c6"></span></span>
        <span class="cls" cl="#fd0"><span id="c7"></span></span>
        <span class="cls" cl="#fcc"><span id="c8"></span></span>
        <span class="cls" cl="#888"><span id="c9"></span></span>
        <span class="cls" cl="#000"><span id="c10"></span></span>
      
        <!-- 「線の色」選択枠 -->
        <input type="color" id="color">
      
        <input type="button" id="clear" value="クリア">
        <input type="button" id="save" value="保存">

      </div>
    </div>
  </div>
  </x-app-layout>
  <script src="{{ asset( 'js/mypage.js' )}}"></script>

  
