<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Articles;
use App\Models\Categories;

class MainPageController extends Controller
{
    public function articles(){
        $data = Articles::join('categories', 'articles.category_id', '=', 'categories.id')
        ->select('articles.*', 'categories.name as categoryname')
        ->paginate(5);

        if($data->isEmpty()){
            return view('main.main', [
                'articles' => 'not found'
            ]);
        } else {
            return view('main.main', [
                'articles' => $data
            ]);
        }
    }

    public function articlesById($id){
        $data = Articles::where('id', $id)->first();

        if($data){
            return view('main.mainById', [
                'article' => $data
            ]);
        } else {
            return view('main.mainById', [
                'article' => 'not found'
            ]);
        }
    }

    public function categoryById($id){
        $data = Articles::where('category_id', $id)
        ->join('categories', 'articles.category_id', '=', 'categories.id')
        ->select('articles.*', 'categories.name as categoryname')
        ->paginate(5);

        if($data){
            return view('main.main', [
                'articles' => $data
            ]);
        } else {
            return view('main.main', [
                'articles' => 'not found'
            ]);
        }
    }
}
