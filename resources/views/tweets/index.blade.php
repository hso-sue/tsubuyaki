@extends('layouts.app')

@section('title', '投稿一覧 | TsubuYaki')
    
@section('content')
  <div class="header">
    <h1>投稿一覧</h1>
    <a href="" class="button">新規投稿</a>
  </div>
  <div class="container">
    <div class="post">
      @foreach ($tweets as $tweet)
        <div class="user-name">{{ $tweet->user->name }}</div>
        <div class="tweet">{{ $tweet->content }}</div>
        <div class="post-date">{{ $tweet->created_at }}</div>
        <img src="" alt="投稿画像" class="post-image">
        <button class="button">いいね</button>
        <button class="button">リツイート</button>
      @endforeach
    </div>
  </div>
@endsection

