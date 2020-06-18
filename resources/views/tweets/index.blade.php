@extends('layouts.app')

@section('content')
<div class="container">
    @auth
        @include('tweets.create')
    @endauth
    @foreach ($tweets as $tweet)
        <div class="card shadow m-3">
            <div class="card-body">
                <div class="container d-flex w-3">
                    <img src="{{ route('storage',$tweet->user->profile) }}" alt="" class="mr-3" width=50>
                    <h4 class="card-title"><a href="{{ route('tweets.show',$tweet) }}">{{ $tweet->user->name}}</a></h4>
                </div>
                <p class="card-text">{{ $tweet->tweets }}</p>
            </div>
            <div class="card-footer">
                {{-- @php
                     $mainComments = array();
                     $comments = array();
                     foreach ($tweet->comments as $comment) {
                         $comments[$comment->id] = $comment;
                     }
                @endphp

                <div class="comments">
                    <ul>
                        @foreach ($comments as $comment)
                            <li class="list-unstyled">
                                <strong></strong>
                                {{ $comment->body}}
                            </li>
                        @endforeach
                    </ul>
                </div>

                @auth
                    @include('comments.create')
                @endauth --}}
            </div>
        </div>
    @endforeach
</div>
@endsection

