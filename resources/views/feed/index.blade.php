@extends('layouts.feed')

@section('feed-content')

@foreach($posts as $post)
<div class="card mt-4">
  <div class="card-body">
    <div class="media">
      <img src="{{ $post->user->image }}" class="img-thumbnail rounded-circle mr-3" style="width: 50px;" alt="">
      <div class="media-body pt-1">
        <a href="{{ route('profile', $post->user) }}"><b>{{ $post->user->fullName }}</b></a> <br>
        @php(Carbon::setLocale('uk'))
        <a href="#" class="text-muted" data-toggle="tooltip" data-delay='{"show":"1000", "hide":"10"}' title="{{ $post->created_at->format('d.m.Y H:i:s') }}">{{ Carbon::now()->diffForHumans($post->created_at) }}</a>
      </div>
    </div>
    <p class="card-text mt-3">{{ $post->text }}</p>
    {{-- <img src="https://wallpaperbrowse.com/media/images/3848765-wallpaper-images-download.jpg" class="img-fluid" alt="Responsive image"> --}}
    <hr>

    <div class="btn-group" role="group" aria-label="Basic example">
        <button type="button" class="btn btn-light active text-primary"><i class="fas fa-heart text-danger"></i><span class="ml-2"><b>{{ $post->likesAmount }}</b></span></button>
        <button type="button" class="btn btn-light"><i class="fas fa-comment text-muted"></i><span class="ml-2">{{ $post->commentsAmount }}</span></button>
        <button type="button" class="btn btn-light"><i class="fas fa-share text-muted"></i><span class="ml-2">45</span></button>
    </div>
  </div>
  <div class="card-footer">
    <ul class="list-unstyled">
      @foreach($post->popularPartOfComments as $comment)
      <li class="media">
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
      </li>
      @endforeach
    </ul>
  </div>
</div>
@endforeach

@endsection
