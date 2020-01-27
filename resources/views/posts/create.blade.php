@extends('app.layout')
@section('content')
    <form action="{{route('posts.create')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <h3>Создать пост</h3>
        <div class="form-group">
            <input type="text" class="form-control" name="title" required>
        </div>
        <div class="form-group">
            <textarea name="description" rows="10" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <input type="file">
        </div>
        <input type="submit" value="Создать пост" class="btn btn-outline-success">
    </form>
@endsection


