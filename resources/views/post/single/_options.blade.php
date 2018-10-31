<div class="dropdown">
    <button class="btn btn-light dropdown-toggle btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
        @if($post->authUserIsOwner)
            <a class="dropdown-item" href="#">Видалити</a>
        @endif
    </div>
</div>
