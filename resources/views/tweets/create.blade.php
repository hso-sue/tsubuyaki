{{-- @extends('layouts.app')

@section('title', 'つぶやき投稿 | TsubuYaki')

@section('content')

@if (session('message'))
    <div class="message-zone">{{ session('message') }}</div>
@endif --}}

<x-app-layout>

<x-header title="つぶやき投稿" />

<form method="post" action="{{ route('tweets.store') }}" enctype="multipart/form-data">
  @csrf
  <div>
    <label for="contents">つぶやきの内容</label><br>
    <textarea class="contents__area">{{ old('contents') }}</textarea>
    @error('contents'){{ $message }}@enderror
  </div>

  <div>
    <label for="image" accept="image/png, image/jpeg, image/jpg">ファイルを選択</label><br>
    <input type="file" name="image" value="{{ old('image') }}">
    @error('image'){{ $message }}@enderror
  </div>
  <br>
  <button type="submit" class="button">つぶやく</button>

</form>

</x-app-layout>