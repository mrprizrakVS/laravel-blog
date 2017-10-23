@extends('layouts.header')
@section('title', 'Posts')

@section('content')
        <form class="form-signin" method="POST">
            {!! csrf_field() !!}
            {{ method_field('PATCH') }}
        <h2 class="form-signin-heading">Редактировать категорию </h2>
        <div class="form-group">
        <label for="inputText" class="sr-only">Название:</label>
        <input type="text" id="inputTitle" name="title" class="form-control" value="{{$category->title}}"  placeholder="Название" required autofocus>
        </div>
        <div class="form-group">
        <label for="inputText" class="sr-only">Короткое содержание</label>
        <textarea name="short_text" class="form-control" required>{{$category->description}} </textarea>
        </div>
        <button class="btn btn-lg btn-primary btn-block" name="registr" type="submit">Изменить</button>
      </form>

@endsection