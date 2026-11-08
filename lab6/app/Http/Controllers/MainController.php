<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    private function loadArticles(): array
    {
        $json = file_get_contents(public_path('element/articles.json'));
        return json_decode($json, true);
    }

    public function index()
    {
        $articles = $this->loadArticles();
        return view('home', ['articles' => $articles]);
    }

    public function gallery($id)
    {
        $articles = $this->loadArticles();
        abort_if(!isset($articles[$id]), 404);
        return view('gallery', ['article'=> $articles[$id]]);
    }
}


