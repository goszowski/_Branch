<div class="btn-group" role="group" aria-label="Post controls">

    {{-- Like button --}}
    <button type="button" class="btn btn-light {{ $post->authUserLikeIt ? 'active' : null }} text-muted">
        <i class="fas fa-heart {{ $post->authUserLikeIt ? 'text-danger' : null }}"></i>
        <span class="ml-2">
            @if($post->authUserLikeIt)
                {{-- If auth user like this post, then counter is bold --}}
                <b>{{ $post->likesAmount }}</b>
            @else 
                {{ $post->likesAmount }}
            @endif
        </span>
    </button>
    {{-- / Like button --}}

    {{-- Comments button --}}
    <button type="button" class="btn btn-light">
        <i class="fas fa-comment text-muted"></i>
        <span class="ml-2">
            {{ $post->commentsAmount }}
        </span>
    </button>
    {{-- / Comments button --}}

    {{-- Shares button --}}
    <button type="button" class="btn btn-light">
        <i class="fas fa-share text-muted"></i>
        <span class="ml-2">
            45
        </span>
    </button>
    {{-- / Shares button --}}

</div>
