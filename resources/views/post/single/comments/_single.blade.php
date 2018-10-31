<div class="media">

    {{-- User image --}}
    <a href="{{ route('profile', $comment->user) }}">
        {{-- 
        $comment->comment_id;
        Here the width of the picture is decided. 
        If the comment has parent element, then the width of the image should be less than the parent element. --}}
        <img class="img-thumbnail rounded-circle mr-3" src="{{ $comment->user->image }}" alt="{{ $comment->user->name }}" style="width: {{ $comment->comment_id ? 30 : 40 }}px;">
    </a>
    {{-- / User image --}}

    <div class="media-body">
        <a href="{{ route('profile', $comment->user) }}">
            <b>{{ $comment->user->fullName }}</b>
        </a>

        {{-- Comment data --}}
        {{ $comment->text }}
        {{-- / Comment data --}}

        {{-- Comment buttons --}}
        <div>
            <a href="#">Подобається</a> | 
            <a href="#">Відповісти</a> | 

            {{-- Pubdate of comment --}}
            <a href="#" 
                class="text-muted" 
                data-toggle="tooltip" 
                data-delay='{"show":"1000", "hide":"10"}' 
                title="{{ $comment->created_at->format('d.m.Y H:i:s') }}"
                >
                {{ $comment->created_at->diffForHumans() }}
            </a>
            {{-- / Pubdate of comment --}}
        </div>
        {{-- / Comment buttons --}}
        <hr>
    </div>
</div>
