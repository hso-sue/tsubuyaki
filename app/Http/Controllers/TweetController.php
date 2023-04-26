<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Tweet;
use App\Models\User;
use App\Models\Comment;


class TweetController extends Controller
{
    public function index()
    {
        $tweets = Tweet::orderBy('created_at', 'desc')->get();

        return view('tweets.index', ['tweets' => $tweets]);
    }

    public function create()
    {
        return view('tweets.create');
    }

    public function store(StorePostRequest $request)
    {
        $tweet = new Tweet();
        
        if($file = $request->image) {
            $fileName = date('Ymd_His').'_'. $file->getClientOriginalName();
            $target_path = public_path('storage/');
            $file->move($target_path, $fileName);
        } else {
            $fileName = null;
        }

        $tweet->content = $request->content;
        $tweet->image = $fileName;
        $tweet->user_id = Auth::id();
        
        $tweet->save();
        
        return redirect('index');
    }

    public function show($id) 
    {
        $tweet = Tweet::find($id);
        $comments = Comment::orderBy('created_at', 'desc')->get();

        return view('tweets.show', compact('tweet', 'comments'));
    }

    public function edit($id)
    {
        $tweet = Tweet::find($id);
        // SELECT * FROM tweets WHERE id = $id LIMIT 1;
        if(Auth::id() != $tweet->user_id) {
            return redirect('index');
        }
        return view('tweets.edit', ['tweet' => $tweet]);
    }

    public function update(StorePostRequest $request, $id)
    {
        $tweet = Tweet::find($id);

        if($file = $request->image) {
            $fileName = date('Ymd_His').'_'. $file->getClientOriginalName();
            $target_path = public_path('storage/');
            $file->move($target_path, $fileName);
        } else {
            $fileName = null;
        }

        $tweet->content = $request->content;
        $tweet->image = $fileName;
        $tweet->user_id = Auth::id();
        
        $tweet->save();
        return redirect('index');
    }

    public function destroy($id) 
    {
        $tweet = Tweet::find($id);
        $tweet->delete();

        return redirect('index');
    }
}
