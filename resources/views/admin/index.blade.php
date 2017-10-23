@extends('layouts.admin.headerAdmin')
@section('title', 'Admin panel')

@section('content')

           @include('post.index', $post)
           @include('admin.categories', $categories)
          

@endsection