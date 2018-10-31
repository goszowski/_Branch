@extends('layouts.feed')

@section('feed-content')

@foreach($posts as $post)
    @include('post._single_item')
@endforeach

@endsection
