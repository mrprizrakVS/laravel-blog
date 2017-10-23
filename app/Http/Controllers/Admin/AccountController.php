<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PostController;
use App\Entities\Post;
use App\Model\Categories;


class AccountController extends Controller {
    
      public function index(){
          if(Auth::guard()->check()){
       if(Auth::user()->isAdmin == 0){
           return redirect(route('account'));
       }
       
       $post = Post::all();
       $categories = Categories::all();
       return view('admin.index', ['post' => $post, 'categories' => $categories] );
       
          } else{
              return redirect('/');
          }
    }
}
