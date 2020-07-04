@extends('layouts.app')

@section('content')
<div class="table-responsive">
    <table class="table table-striped">
        <thead class="thead-inverse">
            <tr>
                <th>Name</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>
                            <a href="{{ route('user.show',$user->id) }}">{{ $user->name }}</a>
                        </td>
                        <td>
                            <a href="{{ route('user.edit',$user->id) }}">
                                <i class="fa fa-pencil-square" aria-hidden="true"></i></a>
                        </td>
                        <td>
                            <a href="{{ route('user.destroy',$user->id) }}">
                                <i class="fa fa-trash" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
    </table>
    <div>{{ $users->links() }}</div>
</div>
@endsection
