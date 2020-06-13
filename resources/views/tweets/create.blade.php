@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <form action="/tweets" method="POST"
        class="w-70 d-flex flex-column justify-content-between align-items-end mx-auto">
        {{ csrf_field() }}
            <textarea name="tweet" id="" cols="30" rows="10" class="form-control mb-4"></textarea>
            @if ($errors->has('tweet'))
                <small>{{$errors->first('tweet')}}</small>
            @endif
            <button type="submit" class="btn btn-info text-light"><i class="fa fa-twitter mr-2"></i>Tweet</button>
        </form>
    </div>
@endsection
