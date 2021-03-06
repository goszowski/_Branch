<div class="card mt-4">
    <div class="card-body">
        <div class="media">

            {{-- Post author image --}}
            <a href="{{ route('profile', $post->user) }}">
                <img src="{{ $post->user->image }}" class="img-thumbnail rounded-circle mr-3" style="width: 50px;" alt="{{ $post->user->fullName }}">
            </a>
            {{-- / Post author image --}}

            <div class="media-body pt-1">
                <a href="{{ route('profile', $post->user) }}">
                    <b>{{ $post->user->fullName }}</b>
                </a>
                <div>
                    <a href="{{ route('post', $post) }}" 
                        class="text-muted" 
                        data-toggle="tooltip" 
                        data-delay='{"show":"1000", "hide":"10"}' 
                        title="{{ $post->created_at->format('d.m.Y H:i:s') }}"
                        >
                        {{ $post->created_at->diffForHumans() }}
                    </a>
                </div>

                
            </div>

            <div class="float-xs-right">
                @include('post.single._options')
            </div>
        </div>

        {{-- Post body --}}
        <p class="card-text mt-3">{!! $post->textForDisplay !!}</p>

        {{-- / Post body --}}
        
        <hr>

        {{-- Post buttons --}}
        @include('post.single._buttons')
        {{-- / Post buttons --}}

    </div>
    
    {{-- Post footer (comments) --}}
    @include('post.single.comments._list')
    {{-- / Post footer (comments) --}}
</div>

@if(isset($comment) and $comment->exists)
    @section('js-section')
    @parent
    <script>

    $(function() {
        var comment = $('#post-{{ $post->id }}-comment-{{ $comment->id }}');
        var offset = comment.offset();
        $('html, body').animate({
            scrollTop: offset.top - 100
        }, 700);
        comment.addClass('active');
    });
    </script>
    @endsection
@endif
