{{-- @extends('layouts.app')

@section('title', '投稿一覧 | TsubuYaki')
    
@section('content')

<header class="header">
  <div class="header__inner">
    <h1>つぶやき一覧</h1>
      @if (Route::has('login'))
          <div class="auth">
              @auth
                <div class="auth__logout">
                  <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit">ログアウト</button>
                  </form>
                </div>
              @else
                <div class="auth__login">
                  <a href="{{ route('login') }}">ログイン</a>
                </div>
                @if (Route::has('register'))
                  <div class="auth__register">
                    <a href="{{ route('register') }}">新規登録</a>
                  </div>
                @endif
              @endauth
          </div>
        @endif
  </div>
  <div class="tweet-btn">
    <a href="{{ route('tweets.create') }}" class="button">つぶやき投稿</a>
  </div>
</header>
<div class="post">
  @foreach ($tweets as $tweet)
    <div class="tweet-container">
      <div class="user-name">{{ $tweet->user->name }}</div>
      <div class="tweet">{{ $tweet->content }}</div>
      <div class="post-date">{{ $tweet->created_at }}</div>
      @if ($tweet->image)
        <img src="../../storage/{{ $tweet->image }}" alt="投稿画像" class="post-image">
      @endif
      <button class="button">よいね</button>
      <button class="button">リツイ～ト</button>
    </div>
  @endforeach
</div>

@endsection --}}

<x-app-layout>

<x-header title="Free Share" />

  <div class="post">
    @foreach ($tweets as $tweet)
      <div class="tweet-container">
        <div class="user-name">{{ $tweet->user->name }}</div>
        <div class="tweet">{{ $tweet->content }}</div>
        <div class="post-date">{{ $tweet->created_at }}</div>
        @if ($tweet->image)
          <img src="../../storage/{{ $tweet->image }}" alt="投稿画像" class="post-image">
        @endif
        <button class="button">よいね</button>
        <button class="button">リツイ～ト</button>
      </div>
    @endforeach
  </div>
  
</x-app-layout>