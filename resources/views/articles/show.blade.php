@extends('layouts.app')

@section('title', $article->title)

@section('content')
    <article>
        <h1 class="mb-3">{{ $article->title }}</h1>

        <div class="mb-4">
            @foreach ($article->tags as $tag)
                <a href="{{ route('tags.show', $tag) }}" class="badge text-bg-secondary text-decoration-none">
                    {{ $tag->name }}
                </a>
            @endforeach
        </div>

        <div class="mb-4">
            {!! nl2br(e($article->content)) !!}
        </div>

        <a href="{{ route('articles.edit', $article) }}" class="btn btn-primary">
            Modifica articolo
        </a>

        <form action="{{ route('articles.destroy', $article) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">
                Cancella articolo
            </button>
        </form>

        <a href="{{ route('articles.index') }}" class="btn btn-secondary">
            Torna agli articoli
        </a>
    </article>
@endsection
