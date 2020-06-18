@extends('layouts.app')

@section('content')
    <div class="container">
        <a name="" id="" class="btn btn-primary" href="{{ route('profile.edit') }}" role="button"><i class="fa fa-edit"></i></a>
        <div class="card text-left w-25">
          <img class="card-img-top" src="{{ route('storage',$user->profile) }}" alt="">
          <div class="card-body">
            <h4 class="card-title">{{ $user->name }}</h4>
            <p class="card-text">{{ $user->email }}</p>
          </div>
        </div>
    </div>

@endsection
