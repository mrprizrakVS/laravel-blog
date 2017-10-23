@extends('layouts.admin.headerAdmin')
@section('title', 'Show categories')


        @section('content')
        @if(!empty($categories))
        @foreach($categories as $category)
        <h1>{{ $category->title }}</h1>
        <p>{{$category->description }}</p>
        @if(\Auth::guard()->check() && \Auth::user()->isAdmin == 1  )
          <p><a class="btn btn-secondary" href="/admin/categories/edit/{{$category->id}}" role="button">Редактировать</a></p>
        @endif
        @endforeach
        @else
        <h1>Нету категорий!</h1>
        @endif
        
        @endsection
