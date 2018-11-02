<div class="media">

    {{-- Auth user image --}}
    <img class="img-thumbnail rounded-circle mr-3" src="{{ auth()->user()->image }}" alt="{{ auth()->user()->fullName }}" style="width: 40px;">
    {{-- / Auth user image --}}

    <div class="media-body">
        <form method="POST" action="{{ route('post.comment', $post) }}">
            @csrf
            {{-- <input type="hidden" name="post_i"> --}}
            <div class="form-group">
                <textarea 
                    style="resize: none;" 
                    class="form-control mt-1 autogrow submit-comment" 
                    name="text" 
                    rows="1" 
                    placeholder="Напишіть коментар..."
                ></textarea>
            </div>
        </form>
    </div>
</div>
