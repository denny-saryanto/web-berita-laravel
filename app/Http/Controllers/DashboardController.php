<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        return view('dashboard.index');
    }

    public function showArticle(){
        return view('dashboard.articles.showArticle');
    }

    public function createArticle(){
        return view('dashboard.articles.createArticle');
    }

    public function showCategory(){
        return view('dashboard.categories.showCategories');
    }

    public function createCategory(){
        return view('dashboard.categories.createCategories');
    }
}
