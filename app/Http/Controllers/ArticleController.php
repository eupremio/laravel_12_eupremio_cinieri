<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with('tags')->latest()->get();

        return view('articles.index', compact('articles'));
    }

    public function create()
    {
        $tags = Tag::all();

        return view('articles.create', compact('tags'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
            'tags' => ['nullable', 'array'],
            'tags.*' => ['exists:tags,id'],
        ]);

        $article = Article::create([
            'title' => $validated['title'],
            'content' => $validated['content'],
        ]);

        $article->tags()->sync($validated['tags'] ?? []);

        return redirect()->route('articles.index');
    }

    public function show(Article $article)
    {
        $article->load('tags');

        return view('articles.show', compact('article'));
    }

    public function edit(Article $article)
    {
        $tags = Tag::all();

        $article->load('tags');

        return view('articles.edit', compact('article', 'tags'));
    }

    public function update(Request $request, Article $article)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
            'tags' => ['nullable', 'array'],
            'tags.*' => ['exists:tags,id'],
        ]);

        $article->update([
            'title' => $validated['title'],
            'content' => $validated['content'],
        ]);

        $article->tags()->sync($validated['tags'] ?? []);

        return redirect()->route('articles.show', $article);
    }

    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()->route('articles.index');
    }
}
