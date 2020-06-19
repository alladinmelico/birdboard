@foreach ($comments as $comment)
    <div class="container comment-forms border-left border-info {{ $isParent ? 'parent' : ''}}">
        <strong>{{ $comment->user->name }}</strong>
        <p>{{ $comment->body }}
            <a name="" id="{{ $comment->id }}" class="btn text-primary btn-sm reply-btn" href="#" role="button" onclick="replyClick(this)"><i class="fa fa-reply"></i></a>
        </p>
        <div class="comment-form">
            <form action="{{ route('reply.add') }}" method="post" class="d-flex justify-content-center mb-3 comment-form">
                @csrf
                <input type="text" name="body" id="" class="form-control" placeholder="" aria-describedby="helpId">

                <input type="hidden" name="tweet_id" value="{{ $tweet_id }}">
                <input type="hidden" name="comment_id" value="{{ $comment->id }}">

                <button type="submit" class="btn btn-success"><i class="fa fa-reply" aria-hidden="true"></i></button>
            </form>

        </div>

        @include('comments.show',['comments'=>$comment->replies, 'isParent'=>false])
    </div>
@endforeach
