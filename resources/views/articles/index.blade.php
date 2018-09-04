@extends('layout')

@section('content')
        <h1>
            Articles
            @auth
            {{-- ログインしている時だけ表示 --}}
                <a href="{{ route('articles.create') }}" class="btn btn-primary float-right">新規作成</a>
            @endauth
        </h1>

        <hr/>

    @foreach($articles as $article)
        ...
    @endforeach
@endsection
