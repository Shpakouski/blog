@extends('app.layout',['title'=>'Редактировать пост'])
@section('content')
    <form action="{{route('posts.update',['post'=>$post->id])}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <h3>Редактировать пост</h3>
@include('posts.parts.form')
        <input type="submit" value="Редактировать пост" class="btn btn-outline-success">
    </form>
@endsection


