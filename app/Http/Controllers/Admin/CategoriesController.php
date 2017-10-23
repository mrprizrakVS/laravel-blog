<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Categories;

class CategoriesController extends Controller
{
    public function index(){
      $categories = Categories::all();
      return view('admin.categories')->with('categories', $categories);
    }
    
    public function create(){
        return view('admin.catcreate');
    }
    
    public function store(Request $request){
        try{
        Categories::create($request->all());
        return redirect(route('categories'));
        } catch(Exception $e){
            return "Что-то пошло не так!";
        }
    }
    
    public function edit(Request $request, $id){
        $category = Categories::find($id);
        return view('admin.editcat', ['category' => $category]);
    }
}
