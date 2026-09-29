@extends('layouts.app')

@section('title', $tag->name)

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Articoli con tag: {{ $tag->name }}</h1>

        <a href="{{ route('tags.index') }}" class="btn btn-secondary">
            Torna ai tag
        </a>
    </div>

    @if ($tag->articles->isEmpty())
        <div class="alert alert-info">
            Non ci sono articoli associati a questo tag.
        </div>
    @else
        <div class="row g-4">
            @foreach ($tag->articles as $article)
                <div class="col-md-6">
                    <div class="card h-100">
                        <div class="card-body">
                            <h2 class="card-title h4">
                                {{ $article->title }}
                            </h2>

                            <p class="card-text">
                                {{ Str::limit($article->content, 150) }}
                            </p>

                            <a href="{{ route('articles.show', $article) }}" class="btn btn-outline-primary">
                                Visualizza
                            </a>

                            <a href="{{ route('articles.edit', $article) }}" class="btn btn-outline-secondary">
                                Modifica
                            </a>

                            <form action="{{ route('articles.destroy', $article) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger">
                                    Cancella
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection
