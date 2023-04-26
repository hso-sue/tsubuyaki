<x-app-layout>
  <style>
    .tweet-container:hover {
      background: inherit;
    }
  </style>

  <x-header title="Free Share" />

  <div class="tweet">
    <div class="tweet-container">
      <div class="user-name">{{ $tweet->user->name }}</div>
      <div class="tweet-content">{{ $tweet->content }}</div>
      <div class="tweet-date">{{ $tweet->created_at }}</div>
      @if ($tweet->image)
        <img src="../../storage/{{ $tweet->image }}" alt="投稿画像" class="tweet-image">
      @endif
      <button class="button">good</button>
      <button class="button">share</button>

      @if ($tweet->user_id == Auth::id())
        <div class="edit-container">
          <div class="edit-button">
            <a href="{{ route('tweets.edit', ['id' => $tweet->id]) }}">
              <img src="{{ asset('images/edit_pen.png')}}"alt="編集" class="edit-image">
            </a>
          </div>
          <div class="delete-button">
            <form method="post" action="{{ route('tweets.destroy', ['id' => $tweet->id]) }}">
              @csrf
              <button type="submit">
                <img src="{{ asset('images/dust_box.png')}}"alt="削除" class="edit-image">
              </button>
            </form>
          </div>
        </div>
      @endif
    </div>
  </div>

  @auth
  <div class="comment">
    <div class="comment__form">
      <form method="post" action="{{ route('comments.store', ['tweet' => $tweet]) }}">
        @csrf
        <textarea name="content" class="comment__content-area" placeholder="コメントを入力できます">{{ old('content') }}</textarea>
        @error('content'){{ $message }}@enderror
        <button type="submit" class="button">Comment</button>
      </form>
    </div>
    
    <div class="comment-list">
      <h2>コメント一覧</h2><br><hr><br>
      @foreach ($comments as $comment)
        <div class="comment-container">
          <div class="comment-user-name">{{ $comment->user->name }}</div>
          <div class="comment-content">{{ $comment->content }}</div>
          @if ($tweet->user_id == Auth::id())
          <div class="edit-container">
            <div class="delete-button">
              <form method="post" action="{{ route('comments.destroy', ['id' => $comment->id, 'tweetId' => $tweet->id]) }}">
                @csrf
                <button type="submit">
                  <img src="{{ asset('images/dust_box.png')}}"alt="削除" class="edit-image">
                </button>
              </form>
            </div>
          </div>
          @endif
        </div>
      @endforeach
    </div>
  </div> 
  @endauth

</x-app-layout>