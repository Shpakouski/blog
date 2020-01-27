<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">

    <div class="container collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="col-6 navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/">Главная <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="#">Создать пост</a>
            </li>

        </ul>
        <form class="form-inline my-2 my-lg-0" action="{{route('search.index')}}">
            <input class="form-control mr-sm-2" name= "search" type="search" placeholder="Найти пост..." aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Поиск</button>
        </form>
    </div>
</nav>

<div class="container">

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
                    <a href="#" class="btn btn-outline-primary">Посмотреть пост</a>

                </div>

            </div>
        </div>
@endforeach
    </div>
        @if(!isset($request->search))
    {{$posts->render()}}
            @endif

</div>


</body>
</html>
