@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card shadow m-3">
            <div class="card-body">
                <h4 class="card-title d-flex justify-content-between">
                    <strong>{{ $tweet->user->name}}</strong>
                    @auth
                        <div class="tools">
                            <a href="{{ route('tweets.edit',$tweet) }}" class="btn"><i class="fa fa-edit"></i></a>
                            <form action="/tweets/{{ $tweet->id }}" method="POST">
                                {{ csrf_field() }}
                                @method('DELETE')
                                <button type="submit" class="btn"><i class="fa fa-trash"></i></button>
                            </form>
                        </div>
                    @endauth
                </h4>
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
