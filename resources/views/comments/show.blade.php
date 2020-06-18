@foreach ($comments as $comment)
    <div class="container">
        <strong>{{ $comment->user->name }}</strong>
        <p>{{ $comment->body }}
            <a name="" id="{{ $comment->id }}" class="btn text-primary btn-sm reply-btn" href="#" role="button"><i class="fa fa-reply" aria-hidden="true"></i></a>
        </p>
        <form action="{{ route('reply.add') }}" method="post" class="d-flex justify-content-center mb-3">
            @csrf
            <input type="text" name="body" id="" class="form-control" placeholder="" aria-describedby="helpId">

            <input type="hidden" name="tweet_id" value="{{ $tweet_id }}">
            <input type="hidden" name="comment_id" value="{{ $comment->id }}">

            <button type="submit" class="btn btn-success"><i class="fa fa-reply" aria-hidden="true"></i></button>
        </form>

        @include('comments.show',['comments'=>$comment->replies])
    </div>
@endforeach
