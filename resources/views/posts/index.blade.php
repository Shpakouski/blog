@extends('app.layout')

@section('content')
@if(isset($request->search))
        @if($posts->count())
        <h2 class="mb-5 mt-2">По запросу <span class="text-danger">{{$request->search}}</span> найдено <span class="text-danger">{{$posts->count()}}</span> : </h2>
           @else
            <h2 class="mb-5 mt-2">По запросу <span class="text-danger">{{$request->search}}</span> ничего не найдено! </h2>
            <a href="{{route('index')}}" class="btn btn-outline-primary">Отобразить все посты</a>
@endif
        @endif

        <div class="row">
@foreach($posts as $post)
        <div class="col-6">
            <div class="card mb-2">
                <div class="card-header"><h2>{{$post->short_title}}</h2></div>
                <div class="card-body mb-2">
                    <img src="{{$post->img ?? asset('img/default.jpg')}}" class="mb-2 img-fluid" alt="Responsive image">
                    <div class="mb-2">Автор: {{$post->author->name}}</div>
                    <a href="{{route('posts.show',['id'=>$post->id])}}" class="btn btn-outline-primary">Посмотреть пост</a>

                </div>

            </div>
        </div>
@endforeach
    </div>
        @if(!isset($request->search))
    {{$posts->render()}}
            @endif
@endsection
