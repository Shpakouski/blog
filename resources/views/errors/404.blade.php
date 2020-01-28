@extends('app.layout',['title'=>'Страница не найдена!'])
@section('content')
    <img src="{{asset('img/404.png')}}" class="mb-2 img-fluid" alt="Responsive image">
    <a href="{{route('posts.index')}}" class="btn btn-outline-primary">Вернуться на главную</a>
@endsection
