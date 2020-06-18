<div class="add-comment">
    <form action="/comments" method="post" class="d-flex justify-content-center ">
        @csrf
        <input type="text" name="comment" id="" class="form-control">
        <input type="hidden" name="tweet" value={{ $tweet->id }}>
        <input type="hidden" name="parent_id" value={{ $tweet->id }}>
        <button type="submit" class="btn btn-info text-light ml-3"><i class="fa fa-paper-plane"></i></button>
    </form>
</div>
