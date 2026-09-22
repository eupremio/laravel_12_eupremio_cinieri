@extends('layouts.app')

@section('title', $article->title)

@section('content')
    <article>
        <h1 class="mb-3">{{ $article->title }}</h1>

        <div class="mb-4">
            @foreach ($article->tags as $tag)
                <span class="badge text-bg-secondary">
                    {{ $tag->name }}
                </span>
            @endforeach
        </div>

        <div class="mb-4">
            {!! nl2br(e($article->content)) !!}
        </div>

        <a href="{{ route('articles.edit', $article) }}" class="btn btn-primary">
            Modifica articolo
        </a>

        <a href="{{ route('articles.index') }}" class="btn btn-secondary">
            Torna agli articoli
        </a>
    </article>
@endsection
