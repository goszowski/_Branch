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
                    <a href="#" 
                        class="text-muted" 
                        data-toggle="tooltip" 
                        data-delay='{"show":"1000", "hide":"10"}' 
                        title="{{ $post->created_at->format('d.m.Y H:i:s') }}"
                        >
                        {{ $post->created_at->diffForHumans() }}
                    </a>
                </div>
            </div>
        </div>

        {{-- Post body --}}
        <p class="card-text mt-3">{{ $post->text }}</p>

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
