@extends('layouts.header')
@section('title', 'Posts')

@section('content')
        <form class="form-signin" method="POST">
            {!! csrf_field() !!}
            {{ method_field('PATCH') }}
        <h2 class="form-signin-heading">Редактировать пост </h2>
        <div class="form-group">
        <label for="inputText" class="sr-only">Название:</label>
        <input type="text" id="inputTitle" name="title" class="form-control" value="{{$post->title}}"  placeholder="Название" required autofocus>
        </div>
        <div class="form-group">
        <label for="inputText" class="sr-only">Короткое содержание</label>
        <textarea name="short_text" class="form-control" required>{{$post->description}} </textarea>
        </div>
       <div class="form-group">
        <label for="inputText" class="sr-only">Категория</label>
        <select name="cat">
        @foreach($catall as $cat)
        <option {{ !empty($category) ? ($category->id == $cat->id  ? 'selected' : NULL) : NULL }} value="{{ $cat->id}}">{{$cat->title}}</option>
        @endforeach
        </select>
         </div>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="1" name="active" {{ $post->active == 1 ? 'checked' : NULL }}> Опубликовать
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" name="registr" type="submit">Изменить</button>
      </form>

@endsection