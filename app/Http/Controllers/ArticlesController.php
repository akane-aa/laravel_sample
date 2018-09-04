<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticlesController extends Controller
{
  public function index() {
      $articles = Article::all();

      return view('articles.index', compact('articles'));
  }

  public function show($id) {
      return $id;
  }
}
