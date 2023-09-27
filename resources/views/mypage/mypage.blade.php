
<link rel="stylesheet" href="{{asset( 'css/mypage.css' )}}">


<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-200">
      {{ __('Mypage')}}
    </h2>
  </x-slot>

  <div class="box">
    <p class="name">名前</p>
    <p class="name">
      <span class="username">{{$item->name}}</span>
    </p>
    <p class="image">プロフィール画像</p>
    <form action="{{ route('icon') }}" method="post" enctype="multipart/form-data">
      @csrf
      <input type="file" name="profile_image">
      <input type="submit" value="決定" >
    </form>
  </div>
</x-app-layout>
