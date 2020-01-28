@extends('app.layout',['title'=>$post->title])

@section('content')
        <div class="row">
        <div class="col-12">
            <div class="card mb-2">
                <div class="card-header"><h2>{{$post->title}}</h2></div>
                <div class="card-body mb-2">
                    <img src="{{$post->img ?? asset('img/default.jpg')}}" class="mb-2 img-fluid" alt="Responsive image">
                    <div class="mb-2">Описание: {{$post->description}}</div>
                    <div class="mb-2">Автор: {{$post->author->name}}</div>
                    <div class="mb-2">Пост создан: {{$post->created_at->diffForHumans()}}</div>
                    <div class="d-flex">
                        <a href="{{route('posts.index')}}" class="btn btn-outline-primary mr-2">На главную</a>
                        <a href="{{route('posts.edit',['post'=>$post->id])}}" class="btn btn-outline-success mr-2">Редактировать</a>

                        <form method="POST" action="{{ route('posts.destroy',['post'=>$post->id]) }}" onsubmit="if(confirm('Точно удалить пост?')){return true} else {return false}">
                            @method('DELETE')
                            @csrf
                            <input type="submit" class="btn btn-outline-danger mr-2" value="Удалить">
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
