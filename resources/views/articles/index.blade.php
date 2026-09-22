@extends('layouts.app')

@section('title', 'Articoli')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Articoli</h1>

        <a href="{{ route('articles.create') }}" class="btn btn-primary">
            Nuovo articolo
        </a>
    </div>

    @if ($articles->isEmpty())
        <div class="alert alert-info">
            Non ci sono ancora articoli.
        </div>
    @else
        <div class="row g-4">
            @foreach ($articles as $article)
                <div class="col-md-6">
                    <div class="card h-100">
                        <div class="card-body">
                            <h2 class="card-title h4">
                                {{ $article->title }}
                            </h2>

                            <p class="card-text">
                                {{ Str::limit($article->content, 150) }}
                            </p>

                            @if ($article->tags->isNotEmpty())
                                <div class="mb-3">
                                    @foreach ($article->tags as $tag)
                                        <span class="badge text-bg-secondary">
                                            {{ $tag->name }}
                                        </span>
                                    @endforeach
                                </div>
                            @endif

                            <a href="{{ route('articles.show', $article) }}" class="btn btn-outline-primary">
                                Leggi articolo
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection
