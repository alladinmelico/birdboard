<?php

namespace App\Http\Controllers;

use App\Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
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
            $comment->tweet_id = $data['tweet'];
            $comment->user_id = Auth::id();
            $comment->save();
            return redirect('/');
        }

        $errors = $validator->messages();
        return redirect('/tweets')->withErrors($errors);
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