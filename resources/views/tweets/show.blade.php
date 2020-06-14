@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card shadow m-3">
            <div class="card-body">
            <h4 class="card-title"><a href="{{ route('tweets.show',$tweet) }}">{{ $tweet->user->name}}</a></h4>
                <p class="card-text">{{ $tweet->tweets }}</p>
            </div>
            <div class="card-footer">
                <div class="comments">
                    <strong>Name</strong>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima, recusandae?</p>
                </div>
            </div>
        </div>
    </div>
@endsection
