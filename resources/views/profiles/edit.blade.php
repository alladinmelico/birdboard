@extends('layouts.app')


@section('content')
<div class="container">
    <form action="/profile" class="form-group" method="POST" enctype="multipart/form-data">
    @csrf
      <label for="profile"></label>
      <input type="file" class="form-control-file" name="profile" id="" placeholder="Profile Picture" aria-describedby="fileHelpId">
      <small id="fileHelpId" class="form-text text-muted">Help text</small>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
