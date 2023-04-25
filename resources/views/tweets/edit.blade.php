<x-app-layout>

  <x-header title="つぶやきの編集" />
  
  <form method="post" action="{{ route('tweets.update', ['id' => $tweet->id]) }}" enctype="multipart/form-data">
    @csrf
    <div>
      <label for="content">つぶやきの内容</label><br>
      <textarea name="content" class="content__area">{{ $tweet->content }}</textarea>
      @error('content'){{ $message }}@enderror
    </div>
  
    <div>
      <label for="image" accept="image/png, image/jpeg, image/jpg">ファイルを選択</label><br>
      <input type="file" name="image" value="{{ $tweet->image }}">
      @error('image'){{ $message }}@enderror
    </div>
    <br>
    <button type="submit" class="button">編集終了</button>
  </form>
  
</x-app-layout>