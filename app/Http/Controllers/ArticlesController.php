<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticlesController extends Controller
{
  public function index() {
      $articles = Article::all();

      return view('articles.index', compact('articles'));
  }

  public function show($id) {
    $article = Article::findOrFail($id);

      return view('articles.show', compact('article'));
  }

  public function create()
    {
        return view('articles.create');
    }

    public function store(Request $request) {
      $rules = [
            'title' => 'required|min:3',
            'body' => 'required',
            'published_at' => 'required|date',
        ];
        $validated = $this->validate($request, $rules);
        Article::create($validated);
        return redirect('articles');
      }
}
