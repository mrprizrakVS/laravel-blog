@extends('layouts.admin.headerAdmin')
@section('title', 'Create Category')

@section('content')
        <form class="form-signin" method="POST">
            {!! csrf_field() !!}
        <h2 class="form-signin-heading">НовАя категория</h2>
        
        <div class="form-group">
        <label for="inputText" class="sr-only">Название:</label>
        <input type="text" id="inputTitle" name="title" class="form-control" placeholder="Название" required autofocus>
        </div>
        <div class="form-group">
        <label for="inputText" class="sr-only">Описание</label>
        <textarea name="description" class="form-control" required> </textarea>
        </div>
       
      
        <button class="btn btn-lg btn-primary btn-block" name="registr" type="submit">Добавить</button>
      </form>

@endsection