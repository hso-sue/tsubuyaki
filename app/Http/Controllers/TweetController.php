<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Tweet;
use App\Models\User;


class TweetController extends Controller
{
    public function index()
    {
        $tweets = Tweet::all();
        return view('tweets.index', ['tweets' => $tweets]);
    }

    public function create()
    {
        return view('tweets.create');
    }

    public function store(StorePostRequest $request)
    {
        // 送信されたリクエストは正

        // バリデーション済みデータの取得
       
        $validated = $request->validated();

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
}
