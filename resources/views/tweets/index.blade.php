@extends('layouts.app')

@section('content')
<div class="container">
    <a href="/tweets/create" class="btn btn-primary">Create</a>
    @foreach ($tweets as $tweet)
        <div class="card">

        </div>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Title</h4>
                <p class="card-text">{{ $tweet->tweets }}</p>
            </div>
        </div>
    @endforeach
</div>
@endsection
