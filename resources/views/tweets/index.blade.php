@extends('layouts.app')

@section('content')
<div class="container">
    @auth
        <a href="/tweets/create" class="btn btn-primary">Create</a>
    @endauth
    @foreach ($tweets as $tweet)
        <div class="card shadow m-3">
            <div class="card-body">
            <h4 class="card-title"><a href="{{ route('tweets.show',$tweet) }}">{{ $tweet->user->name}}</a></h4>
                <p class="card-text">{{ $tweet->tweets }}</p>
            </div>
            <div class="card-footer">
                @php
                     $mainComments = array();
                     $comments = array();
                     foreach ($tweet->comments as $comment) {
                         $comments[$comment->id] = $comment;
                     }
                    //  print_r($comments[4]);
                @endphp


                {{-- @for ($i = 0; $i < count($tweet->comments); $i++)
                    @if ($tweet->comments[$i]->parent == null)
                        @php
                            $mainComments[$i] = $tweet->comments[$i]
                        @endphp
                        @else
                            @php
                                $comments[]
                            @endphp
                        @endif
                    @endif
                @endfor --}}
                {{-- @foreach ($tweet->comments as $comment)
                    @if ($comment->parent == null)
                        @php
                           $mainComments[$comment->id] = $comment;
                        @endphp
                    @endif
                @endforeach

                @php
                print_r($mainComments);
                    reply();
                @endphp --}}

                <div class="comments">
                    <ul>
                        @foreach ($comments as $comment)
                            <li class="list-unstyled">
                                {{-- TODO: add name of the comment author --}}
                                <strong></strong>
                                {{ $comment->body}}
                            </li>
                            {{-- @if (isset($comments[$comment->id]))

                                {{ $comments[$comment->id] }}
                            @endif --}}
                        @endforeach
                    </ul>
                </div>

                @auth
                    <div class="add-comment">
                        <form action="/comments" method="post" class="form-inline">
                            {{ csrf_field() }}
                            <input type="text" name="comment" id="" class="form-control">
                            <input type="hidden" name="tweet" value={{ $tweet->id }}>
                            <button type="submit" class="btn btn-info text-light"><i class="fa fa-paper-plane"></i></button>
                        </form>
                    </div>
                @endauth
            </div>
        </div>
    @endforeach
</div>
@endsection

{{--
@php
    function reply(){
        global $mainComments;
        $reply = array();
        if($mainComments != null){
            $reply = array_filter($mainComments, function ($item) {
                return $item == $mainComments->parents;
            });
        } else {
            echo 'gg';
        }

        if(count($reply) > 0){
            echo 'replied';
        }
    }

@endphp --}}
