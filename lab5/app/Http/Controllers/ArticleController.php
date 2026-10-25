<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::select('id', 'date', 'title', 'short_description', 'preview_image')
            ->latest('date')
            ->paginate(5);

        return view('articles.index', ['articles' => $articles]);
    }

    public function create()
    {
        return view('articles.create', ['article' => new Article()]);
    }

    public function store(ArticleRequest $request)
    {
        $article = Article::create($request->validated());

        return redirect()->route('articles.show', $article)
            ->with('status', 'Article created');
    }

    public function show(Article $article)
    {
        return view('articles.show', ['article' => $article]);
    }

    public function edit(Article $article)
    {
        return view('articles.edit', ['article' => $article]);
    }

    public function update(ArticleRequest $request, Article $article)
    {
        $article->update($request->validated());

        return redirect()->route('articles.show', $article)
            ->with('status', 'Article updated');
    }

    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()->route('articles.index')
            ->with('status', 'Article deleted');
    }
}