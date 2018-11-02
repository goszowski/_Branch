<div class="card-footer">
    @if((isset($comments) and count($comments)) or count($post->popularPartOfComments))
    <ul class="list-unstyled">
        @if(isset($comments) and count($comments))
            @foreach($comments as $comment)
                @include('post.single.comments._single')
            @endforeach
        @else 
        @foreach($post->popularPartOfComments as $comment)
            @include('post.single.comments._single')
            {{-- <li class="media">
                <img class="img-thumbnail rounded-circle mr-3" src="{{ $comment->user->image }}" alt="{{ $comment->user->name }}" style="width: 40px;">
                <div class="media-body">
                <a href="#"><b>{{ $comment->user->fullName }}</b></a>
                {{ $comment->text }}<br>
                <a href="#">Подобається</a> | <a href="#">Відповісти</a> | <a href="#" class="text-muted" data-toggle="tooltip" data-delay='{"show":"1000", "hide":"10"}' title="{{ $comment->created_at->format('d.m.Y H:i:s') }}">{{ Carbon::now()->diffForHumans($comment->created_at) }}</a>

                @if($comment->hasResponses())
                    <hr>
                    @foreach($comment->popularPartOfResponses as $response)
                    <div class="media">
                        <img class="img-thumbnail rounded-circle mr-3" src="{{ $response->user->image }}" alt="{{ $comment->user->name }}" style="width: 30px;">
                        <div class="media-body">
                        <a href="#"><b>{{ $response->user->fullName }}</b></a>
                        {{ $response->text }}<br>
                        <a href="#">Подобається</a> | <a href="#">Відповісти</a> | <a href="#" class="text-muted" data-toggle="tooltip" data-delay='{"show":"1000", "hide":"10"}' title="{{ $response->created_at->format('d.m.Y H:i:s') }}">{{ Carbon::now()->diffForHumans($response->created_at) }}</a>
                        <hr>
                        </div>
                    </div>
                    @endforeach
                @endif
                <hr>
                </div>
            </li> --}}
            @endforeach
        @endif
    </ul>
    @endif

    @include('post.single.comments._form')
        
</div>
