@extends('layouts.header')
@section('title', 'Posts')

        @section('content')
        
        
        @foreach($post as $posts)
         <div class="row">
          <div class="col-md-4">
            <h2>{{$posts->title}}</h2>
            <p>{{$posts->short_text}} </p>
            <p><a class="btn btn-secondary" href="/post/{{$posts->id}}" role="button">Читать &raquo;</a></p>
            @if(\Auth::guard()->check() && \Auth::user()->isAdmin == 1  )
          <p><a class="btn btn-secondary" href="/post/edit/{{$posts->id}}" role="button">Редактировать</a></p>
        @endif
          </div>
         
        </div>
        @endforeach
        
        @endsection
