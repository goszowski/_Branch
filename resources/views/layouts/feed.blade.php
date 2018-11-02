@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-5 sticky-top pt-5" style="max-height: fit-content; height: auto;">
        <div class="pt-2">
            <div class="list-group mt-4">
                <a href="#" class="list-group-item list-group-item-action active">
                  <i class="far fa-newspaper"></i> <span class="ml-2">Новини</span>
                </a>
                <a href="{{ route('profile', auth()->user()) }}" class="list-group-item list-group-item-action"><i class="fas fa-user-circle"></i> <span class="ml-2">Моя сторінка</span></a>
                <a href="#" class="list-group-item list-group-item-action"><i class="fas fa-comments"></i> <span class="ml-2">Повідомлення</span> <span class="badge badge-light">99+</span></a>
                <a href="#" class="list-group-item list-group-item-action"><i class="fas fa-user"></i> <span class="ml-2">Друзі</span></a>
                <a href="#" class="list-group-item list-group-item-action"><i class="fas fa-users"></i> <span class="ml-2">Спільноти</span></a>
                <a href="#" class="list-group-item list-group-item-action"><i class="fas fa-camera"></i> <span class="ml-2">Фотографії</span></a>
            </div>
        </div>
    </div>
    <div class="col-md-14 mt-5 pt-2">
      @yield('feed-content')
    </div>
    <div class="col-md-5 sticky-top pt-5" style="max-height: fit-content; height: auto;">
        <div class="pt-2">
            <div class="list-group mt-4">
                <a href="#" class="list-group-item list-group-item-action active"><i class="fab fa-hotjar"></i><span class="ml-2">Популярне</span></a>
                <a href="#" class="list-group-item list-group-item-action"><i class="fas fa-bars"></i> <span class="ml-2">Насвіжіше</span></a>
                <a href="#" class="list-group-item list-group-item-action"><i class="fas fa-search"></i><span class="ml-2">Пошук</span></a>
            </div>
            <a href="#">Про мережу</a> <a href="#">Контакти</a> <a href="#">Реклама</a> <a href="#">Правила</a>
        </div>
    </div>
  </div>
</div>
@endsection
