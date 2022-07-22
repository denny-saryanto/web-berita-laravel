<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Articles;

class DashboardController extends Controller
{
    public function index(){
        return view('dashboard.index');
    }

    public function showArticle(){
        $data = Articles::join('categories', 'articles.category_id', '=', 'categories.id')
        ->join('users', 'articles.user_id', '=', 'users.id')
        ->select('articles.*', 'users.name as username', 'categories.name as categoryname')
        ->orderBy('articles.created_at', 'DESC')
        ->paginate('5');
        return view('dashboard.articles.showArticle', [
            'articles' => $data,
        ]);
    }

    public function createArticle(Request $request){
        return view('dashboard.articles.createArticle');
    }

    public function updateArticle(Request $request, $id){
        return view('dashboard.articles.createArticle');
    }

    // Categories

    public function showCategory(){
        return view('dashboard.categories.showCategories');
    }

    public function createCategory(){
        return view('dashboard.categories.createCategories');
    }
}
