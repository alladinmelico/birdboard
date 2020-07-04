<?php

namespace App\Http\Controllers;

use App\Tweets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class TweetsController extends Controller
{

    public function __construct(){
        return $this->middleware('auth');
    }

    public function index()
    {
        $tweets = Tweets::with(['user'])->latest()->paginate(10);
        $title = 'Tweets';

        return view('tweets.index',compact('tweets','title'));
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
            return redirect('/tweet')->with('success','Tweets added!');
        }

        $errors = $validator->messages();
        return back()->withErrors($errors)->withInput($data);
    }

    public function show(Tweets $tweet)
    {
        $isAuthor = false;
        $author = Tweets::find($tweet->id);
        $title = 'Tweet';

        if (Auth::id() == $author->user_id){
            $isAuthor = true;
        }

        return view('tweets.show',compact('title','tweet','isAuthor'));
    }

    public function edit(Tweets $tweets)
    {
        return view('tweets.edit',['title'=> "Edit Tweet",'tweet'=>$tweets]);
    }

    public function update(Request $request, Tweets $tweets)
    {
        // if($request->user()->id !== $tweets->user_id){
        //     return request()->json(['error'=>'You can only edit your own tweet',403]);
        // }
        $tweets->update($request->all());
        return redirect('/');
    }

    public function destroy(Tweets $tweets)
    {
        $tweets->delete();
        return redirect('/');
    }
}