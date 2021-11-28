<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $articles = Article::when(isset(request()->search), function ($q) {
            $search = request()->search;
            return $q->where("title", "LIKE", "%$search%")->orWhere("description", "LIKE", "%$search%");
        })->with(["user", "category"])->latest("id")->paginate(5);
        return view("welcome", compact("articles"));
    }

    public function detail($slug)
    {
        $article = Article::where("slug", $slug)->first();
        if (empty($article)) {
            return abort("404");
        }
        return view("blog.detail", compact("article"));
    }

    public function baseOnCategory($id)
    {
        $articles = Article::when(isset(request()->search), function ($q) {
            $search = request()->search;
            return $q->where("title", "LIKE", "%$search%")->orWhere("description", "LIKE", "%$search%");
        })->where("category_id", $id)->with(["user", "category"])->latest("id")->paginate(5);
        return view("welcome", compact("articles"));
    }
}
