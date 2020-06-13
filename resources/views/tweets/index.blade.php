@extends('layouts.app')

@section('content')
<div class="container">
    <a href="/tweets/create" class="btn btn-primary">Create</a>
    @foreach ($tweets as $tweet)
        <div class="card shadow m-3">
            <div class="card-body">
                <h4 class="card-title">{{ $tweet->user->name}}</h4>
                <p class="card-text">{{ $tweet->tweets }}</p>
            </div>
        </div>
    @endforeach
</div>
@endsection
