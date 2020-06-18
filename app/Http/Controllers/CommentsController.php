<?php

namespace App\Http\Controllers;

use App\Comments;
use App\Tweets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function __construct(){
        return $this->middleware('auth');
    }

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $rules = [
            'tweet' => 'required'
        ];

        $validator = Validator::make($data,$rules);

        if($validator){
            $comment = new Comments;
            $comment->body = $data['comment'];
            $comment->user_id = Auth::id();
            $tweet = Tweets::find($data['parent_id']);
            $tweet->comments()->save($comment);
            return back();
        }

        $errors = $validator->messages();
        return back();
    }

    public function replyStore(Request $request ){
        $reply = new Comments();

        $reply->body = $request->get('body');
        $reply->user()->associate($request->user());
        $reply->parent_id = $request->get('comment_id');
        $tweet = Tweets::find($request->get('tweet_id'));

        $tweet->comments()->save($reply);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comments  $comments
     * @return \Illuminate\Http\Response
     */
    public function show(Comments $comments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comments  $comments
     * @return \Illuminate\Http\Response
     */
    public function edit(Comments $comments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comments  $comments
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comments $comments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comments  $comments
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comments $comments)
    {
        //
    }
}
