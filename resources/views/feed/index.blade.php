@extends('layouts.feed')

@section('feed-content')

@foreach($posts as $post)
    @include('post.single._post')
@endforeach

@endsection
