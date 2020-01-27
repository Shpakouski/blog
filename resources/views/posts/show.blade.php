@extends('app.layout')

@section('content')
        <div class="row">
        <div class="col-12">
            <div class="card mb-2">
                <div class="card-header"><h2>{{$post->title}}</h2></div>
                <div class="card-body mb-2">
                    <img src="{{$post->img ?? asset('img/default.jpg')}}" class="mb-2 img-fluid" alt="Responsive image">
                    <div class="mb-2">Автор: {{$post->author->name}}</div>
                    <div class="mb-2">Пост создан: {{$post->created_at->diffForHumans()}}</div>
                    <a href="{{route('posts.index')}}" class="btn btn-outline-primary">На главную</a>
                </div>
            </div>
        </div>
    </div>

@endsection
