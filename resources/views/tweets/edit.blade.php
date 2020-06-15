@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <form action="/tweets/{{ $tweet->id }}" method="POST"
        class="w-70 d-flex flex-column justify-content-between align-items-end mx-auto">
        {{ csrf_field() }}
        @method('PUT')
            <textarea name="tweets" id="" cols="30" rows="10" class="form-control mb-4">{{$tweet->tweets}}</textarea>
            @if ($errors->has('tweet'))
                <small>{{$errors->first('tweet')}}</small>
            @endif
            <button type="submit" class="btn btn-info text-light"><i class="fa fa-twitter mr-2"></i>Tweet</button>
        </form>
    </div>
@endsection
