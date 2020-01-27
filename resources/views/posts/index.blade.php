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
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Найти пост..." aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Поиск</button>
        </form>
    </div>
</nav>

<div class="container">
    <div class="row">
@foreach($posts as $post)
        <div class="col-6">
            <div class="card mb-2">
                <div class="card-header">{{$post->short_title}}</div>
                <card-body>{{$post->description}}</card-body>
            </div>
        </div>
@endforeach
    </div>
    {{$posts->render()}}
</div>


</body>
</html>
