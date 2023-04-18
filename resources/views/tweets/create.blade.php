<h1>つぶやきを投稿する</h1>
<form method="post" action="{{ route('tweets.store') }}" enctype="multipart/form-data">
  @csrf
  <div>
    <label for="contents">つぶやきの内容</label><br>
    <textarea name="contents" rows="5">{{ old('contents') }}</textarea>
    @error('contents'){{ $message }}@enderror
  </div>

  <div>
    <label for="image" accept="image/png, image/jpeg, image/jpg">ファイルを選択</label><br>
    <input type="file" name="image" value="{{ old('image') }}">
    @error('image'){{ $message }}@enderror
  </div>
  <br>
  <button type="submit">投稿を保存</button>
</form>