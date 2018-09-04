<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;
use App\Article;
use Carbon\Carbon;

class ArticlesController extends Controller
{
  public function __construct()
    {
        $this->middleware('auth')
            ->except(['index', 'show']);
    }

  public function index() {
      $articles = Article::latest('published_at')->latest('created_at')
      ->published()
      ->get();
      return view('articles.index', compact('articles'));
  }

  public function show(Article $article) {
    $article = Article::findOrFail($id);

      return view('articles.show', compact('article'));
  }

  public function create()
    {
        $tag_list = Tag::pluck('name', 'id');
        return view('articles.create');
    }

    public function store(Request $request) {
        $article = Auth::user()->articles()->create($request->validated());
        $article->tags()->attach($request->input('tags'));
        return redirect()->route('articles.index')
        ->with('message', '記事を追加しました。');
      }

      public function edit(Article $article) {
          $tag_list = Tag::pluck('name', 'id');

          return view('articles.edit', compact('article'));
      }

      public function update(ArticleRequest $request, Article $article) {
          $article->update($request->validated());
          $article->tags()->sync($request->input('tags'));
          return redirect()->route('articles.show', [$article->id])
          ->with('message', '記事を更新しました。');
      }

      public function destroy(Article $article) {
        $article = Article::findOrFail($id);

        $article->delete();

        return redirect('articles')->with('message', '記事を削除しました。');
    }
}
