<x-app-layout>

<x-header title="新規投稿" />

<form method="post" action="{{ route('tweets.store') }}" enctype="multipart/form-data">
  @csrf
  <div>
    <label for="content">投稿内容</label><br>
    <textarea name="content" class="content__area">{{ old('content') }}</textarea>
    @error('content'){{ $message }}@enderror
  </div>

  <div>
    <label for="image" accept="image/png, image/jpeg, image/jpg">ファイルを選択</label><br>
    <input type="file" name="image" value="{{ old('image') }}">
    @error('image'){{ $message }}@enderror
  </div>
  <br>
  <button type="submit" class="button">Tweet</button>
</form>

</x-app-layout>