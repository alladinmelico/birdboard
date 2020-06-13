<?php

namespace App\Http\Controllers;

use App\Tweets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class TweetsController extends Controller
{
    public function index()
    {
        $tweets = Tweets::with('user')->latest()->get();
        return view('tweets.index',['title' => "Tweets",'tweets'=>$tweets]);
    }

    public function create()
    {
        return view('tweets.create',['title'=>"Create Tweet"]);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $rules = [
            'tweet'=> 'required'
        ];

        $message = [
            'tweet.required' => 'Please fill in all fields'
        ];

        $validator = Validator::make($data, $rules,$message);

        if($validator->passes()){
            $tweet = new Tweets;
            $tweet->tweets = $data['tweet'];
            $tweet->user_id = Auth::id();
            $tweet->save();
            return redirect('/');
        }

        $errors = $validator->messages();
        return redirect('/tweets/create')->withErrors($errors);
    }

    public function show(Tweets $tweets)
    {
        //
    }

    public function edit(Tweets $tweets)
    {
        //
    }

    public function update(Request $request, Tweets $tweets)
    {
        //
    }

    public function destroy(Tweets $tweets)
    {
        //
    }
}