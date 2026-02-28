<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->paginate(15);
        return view('admin.articles.index', compact('articles'));
    }

    public function create()
    {
        return view('admin.articles.create');
    }

    public function store(Request $request)
    {
        $v = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:articles,slug',
            'featured_image' => 'nullable|image|max:2048',
            'excerpt' => 'nullable|string|max:500',
            'content' => 'nullable|string',
            'category' => 'nullable|string|max:100',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'status' => 'required|in:published,draft',
            'published_at' => 'nullable|date',
        ]);
        $v['slug'] = $v['slug'] ?? Str::slug($v['title']);
        if ($request->hasFile('featured_image')) {
            $v['featured_image'] = $request->file('featured_image')->store('articles', 'public');
        }
        Article::create($v);
        return redirect()->route('admin.articles.index')->with('success', 'Article created.');
    }

    public function edit(Article $article)
    {
        return view('admin.articles.edit', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        $v = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:articles,slug,' . $article->id,
            'featured_image' => 'nullable|image|max:2048',
            'excerpt' => 'nullable|string|max:500',
            'content' => 'nullable|string',
            'category' => 'nullable|string|max:100',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'status' => 'required|in:published,draft',
            'published_at' => 'nullable|date',
        ]);
        if ($request->hasFile('featured_image')) {
            if ($article->featured_image) {
                Storage::disk('public')->delete($article->featured_image);
            }
            $v['featured_image'] = $request->file('featured_image')->store('articles', 'public');
        }
        $article->update($v);
        return redirect()->route('admin.articles.index')->with('success', 'Article updated.');
    }

    public function destroy(Article $article)
    {
        if ($article->featured_image) {
            Storage::disk('public')->delete($article->featured_image);
        }
        $article->delete();
        return redirect()->route('admin.articles.index')->with('success', 'Article deleted.');
    }
}
