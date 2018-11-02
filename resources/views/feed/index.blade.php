@extends('layouts.feed')

@section('feed-content')

@include('post.create._form')

@foreach($posts as $post)
    @include('post.single._post')
@endforeach

@endsection
