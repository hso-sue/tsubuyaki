<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Tweet;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(StorePostRequest $request, Tweet $tweet)
    {
        $comment = new Comment();
        $comment->user_id = Auth::id();
        $comment->tweet_id = $tweet->id;
        $comment->content = $request->content;

        $comment->save();

        return redirect()->route('tweets.show', ['id' => $tweet->id]);
    }

    public function destroy($id, $tweetId) 
    {
        $comment = Comment::find($id);
        $comment->delete();

        return redirect()->route('tweets.show', $tweetId);
    }
}
