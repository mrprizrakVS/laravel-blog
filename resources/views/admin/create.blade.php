@extends('layouts.header')
@section('title', 'Posts')

@section('content')
        <form class="form-signin" method="POST">
            {!! csrf_field() !!}
        <h2 class="form-signin-heading">Новый пост </h2>
        
        <div class="form-group">
        <label for="inputText" class="sr-only">Название:</label>
        <input type="text" id="inputTitle" name="title" class="form-control" placeholder="Название" required autofocus>
        </div>
        <div class="form-group">
        <label for="inputText" class="sr-only">Короткое содержание</label>
        <textarea name="short_text" class="form-control" required> </textarea>
        </div>
        <div class="form-group">
        <label for="inputText" class="sr-only">Полный текст</label>
        <textarea name="full_text" class="form-control" required></textarea>
      </div>
           <div class="form-group">
        <label for="inputText" class="sr-only">Категория</label>
        <select name="cat">
        @foreach($categories as $category)
        <option value="{{$category->id}}">{{$category->title}}</option>
        @endforeach
        </select>
         </div>
         <div class="form-group">
        <select name="active">
        <option value="0">Модерация</option>
        <option value="1">Публикация</option>
        </select>
     </div>
      
        <button class="btn btn-lg btn-primary btn-block" name="registr" type="submit">Добавить</button>
      </form>

@endsection