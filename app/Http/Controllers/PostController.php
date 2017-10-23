<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Entities\Post;
use App\Model\Categories;
use App\Model\CategoryArticles;

class PostController extends Controller
{
    public function index(){
        $post = Post::where('active', 1)->get();
        return view('post.index')->with('post', $post);
    }
    
    public function create(){
        $categories = Categories::all();
        return view('admin.create', ['categories' => $categories]);
    }
    
    public function store(Request $request){
        if(Auth::guard()->check() && self::isAdmin()){
            try{
                
                $this->validate($request, [
                    'title' => 'required|min:3|max:64',
                    'short_text' => 'required|min:6|max:32',
                    'full_text' => 'required|min:6|max:255'
                ]);
                
        $post = Post::create([
            'title'      => $request->input('title'),
            'short_text' => $request->input('short_text'),
            'full_text'  => $request->input('full_text'),
            'author'     => Auth::user()->email,
            'active'     => $request->input('active')
                ])->id;
        $poscat = \App\Model\CategoryArticles::create([
            'category_id' => $request->input('cat'),
            'article_id'  => $post
        ]);
               return redirect(route('account'));
            }
            catch(Exception $e)
            {
                dd($e);
                return redirect('/');
            }
            
            } 
                        
            return redirect('/');
        } 
              
    public function show(Request $request, $id){
        $post = Post::find($id);
        return view('post.show', ['post' => $post]);
    }
    
    public function edit(Request $request, $id){
        
        $post = Post::find($id);
        $catall = Categories::all();
        $categorya = CategoryArticles::where('article_id', $id)->first();
        if(!empty($categorya)){
        $category = Categories::where('id', $categorya->category_id)->first();
        return view('admin.edit', ['post' => $post, 'category' => $category, 'catall' => $catall]);
        }
        
          
        return view('admin.edit', ['post' => $post, 'catall' => $catall]);
    }
    
    public function update(Request $request, $id){
         $post = Post::find($id);
         $post->title = $request->input('title');
         $post->short_text = $request->input('short_text');
         $post->full_text = $request->input('full_text');         
         $post->save();
         return redirect('/post/'.$id);
    }
    
    public function isAdmin(){
        if(Auth::user()->isAdmin == 1){
            return true;
        } else{
            return false;
        }
    }
}
