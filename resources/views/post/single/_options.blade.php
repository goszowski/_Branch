<div class="dropdown">
    <button class="btn btn-light dropdown-toggle btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
        @if($post->authUserIsOwner)
            <form id="remove-post-{{ $post->id }}" method="POST" action="{{ route('post.delete', $post) }}" class="d-none">
                @csrf
                @method('DELETE')
            </form>
            <a class="dropdown-item" href="" onclick="$('#remove-post-{{ $post->id }}').submit();">
                <i class="far fa-trash-alt"></i> 
                Видалити
            </a>
        @endif
    </div>
</div>
