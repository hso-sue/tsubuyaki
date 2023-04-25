<x-app-layout>

<x-header title="Free Share" />

  <div class="tweet">
    @foreach ($tweets as $tweet)
    <a href="{{ route('tweets.show', ['id' => $tweet->id]) }}">
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
    </a>
    @endforeach
  </div>
  
</x-app-layout>