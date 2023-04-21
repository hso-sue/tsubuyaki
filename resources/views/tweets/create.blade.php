@extends('layouts.app')

@section('title', 'つぶやき投稿 | TsubuYaki')

@section('content')

@if (session('message'))
    <div class="message-zone">{{ session('message') }}</div>
@endif
    
<div class="header">
  <a href="{{ route('tweets.index') }}">&laquo;</a>
  <div class="header__inner">
    <h1>つぶやきを投稿</h1>
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
</div>

<form method="post" action="{{ route('tweets.store') }}" enctype="multipart/form-data">
  @csrf
  <div>
    <label for="contents">つぶやきの内容</label><br>
    <textarea name="contents" cols="90" rows="6">{{ old('contents') }}</textarea>
    @error('contents'){{ $message }}@enderror
  </div>

  <div>
    <label for="image" accept="image/png, image/jpeg, image/jpg">ファイルを選択</label><br>
    <input type="file" name="image" value="{{ old('image') }}">
    @error('image'){{ $message }}@enderror
  </div>
  <br>
  <button type="submit">つぶやく</button>
</form>

@endsection