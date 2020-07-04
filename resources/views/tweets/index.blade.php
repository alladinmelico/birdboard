@extends('layouts.app')

@section('content')
@if ($message = Session::get('success'))
    <div class="alert alert-success" role="alert">
        <strong>{{ $message }}</strong>
    </div>
@endif
<div class="container">
    @auth
        @include('tweets.create')
    @endauth
    @foreach ($tweets as $tweet)
        <div class="card shadow m-3">
            <div class="card-body">
                <div class="container d-flex w-3">
                    <img src="{{ route('storage',$tweet->user->profile) }}" alt="" class="mr-3" width=50>
                    <h4 class="card-title"><a href="{{ route('tweet.show',$tweet) }}">{{ $tweet->user->name}}</a></h4>
                </div>
                <p class="card-text">{{ $tweet->tweets }}</p>
            </div>
            <div class="card-footer">

            </div>
        </div>
    @endforeach

    <div>{{ $tweets->links() }}</div>
</div>
@endsection

