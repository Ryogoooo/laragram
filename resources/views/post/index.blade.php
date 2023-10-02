<!-- resources/views/post/index.blade.php -->
<?php
use App\Models\User;
?>
<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-200">
      {{ __('Post Index') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:w-10/12 md:w-8/10 lg:w-8/12">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white dark:bg-gray-800 border-b border-black dark:border-gray-800">
          <table class="text-center w-full border-collapse">
            <thead>
              <tr>
                <th class="py-4 px-6 bg-gray-lightest dark:bg-gray-darkest font-bold uppercase text-lg text-gray-dark dark:text-gray-200 border-b border-black dark:border-grey-dark" style="border-color: black;">post</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($posts as $post)
              @if ($post->parent_id === null)
              <tr class="hover:bg-gray-lighter">
                <td class="py-4 px-6 border-b border-black" style="border-color: black;">
                  <div class="flex items-start">
                    <?php $post_user = User::find($post->user_id); $post_user_name = $post_user->name; ?>
                    <p class="text-left font-bold text-gray-dark dark:text-gray-200" >{{ $post_user_name }}</p>
                    <img src="{{ asset('storage/image/' . $post_user->icon) }}" width="200" height="200" class="mr-4"> <!-- 画像とテキストの間にマージンを追加 -->
                    <span class="text-left font-bold text-lg text-gray-dark dark:text-gray-200">{{$post->post}}</span>
                  </div>
                    <form action="{{ route('reply.store', $post->id) }}" method="post">
                      @csrf
                      <textarea name="content" placeholder="Write your reply..." style="width: auto; margin: 0; padding: 0;"></textarea>
                      <button type="submit">返信</button>
                    </form>
                    @foreach ($posts as $tweet)
                    @if ($tweet !== null && $tweet->parent_id === $post->id)
                    <?php $user = User::find($tweet->user_id); $user_name = $user->name; ?>
                    <div class="flex items-start" style="padding-left: 40px; padding-top: 20px;">
                      <p>
                        <span style="border-color: black; border-width: 1px; border-radius: 3px; padding: 3px;"> {{$user_name}} </span>
                      </p>
                      <img src="{{ asset('storage/image/' . $tweet->user_icon) }}" width="200" height="200" class="mr-4">
                      <p>
                      <span class="border border-solid border-black" style="border-color: gray; padding: 5px; border-radius: 3px; ">
                        {{ $tweet->post }}
                      </span>
                      </p>


                    </div>
                    @endif
                    @endforeach
              
                </td>
              </tr>
              @endif
              @endforeach
             
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>