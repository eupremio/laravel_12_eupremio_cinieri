@extends('layouts.app')

@section('title', 'Nuovo articolo')

@section('content')
    <h1 class="mb-4">Nuovo articolo</h1>

    <form action="{{ route('articles.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>

            <input
                type="text"
                name="title"
                id="title"
                class="form-control"
                value="{{ old('title') }}"
                required
            >

            @error('title')
                <div class="text-danger mt-1">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Contenuto</label>

            <textarea
                name="content"
                id="content"
                rows="6"
                class="form-control"
                required
            >{{ old('content') }}</textarea>

            @error('content')
                <div class="text-danger mt-1">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-4">
            <label class="form-label">Tag</label>

            @if ($tags->isEmpty())
                <p class="text-muted">
                    Non ci sono ancora tag disponibili.
                </p>
            @else
                @foreach ($tags as $tag)
                    <div class="form-check">
                        <input
                            type="checkbox"
                            name="tags[]"
                            value="{{ $tag->id }}"
                            id="tag-{{ $tag->id }}"
                            class="form-check-input"
                            @checked(in_array($tag->id, old('tags', [])))
                        >

                        <label for="tag-{{ $tag->id }}" class="form-check-label">
                            {{ $tag->name }}
                        </label>
                    </div>
                @endforeach
            @endif

            @error('tags')
                <div class="text-danger mt-1">
                    {{ $message }}
                </div>
            @enderror

            @error('tags.*')
                <div class="text-danger mt-1">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">
            Salva articolo
        </button>

        <a href="{{ route('articles.index') }}" class="btn btn-secondary">
            Annulla
        </a>
    </form>
@endsection
