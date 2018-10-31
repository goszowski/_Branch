@extends('layouts.profile')

@section('profile-content')
<img src="{{ $user->background_image }}" class="img-thumbnail" alt="">
@endsection
