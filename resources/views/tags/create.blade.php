@extends('layouts.app')

@section('title', 'Nuovo tag')

@section('content')
    <h1 class="mb-4">Nuovo tag</h1>

    <form action="{{ route('tags.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nome tag</label>

            <input
                type="text"
                name="name"
                id="name"
                class="form-control"
                value="{{ old('name') }}"
                required
            >

            @error('name')
                <div class="text-danger mt-1">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">
            Salva tag
        </button>

        <a href="{{ route('articles.index') }}" class="btn btn-secondary">
            Annulla
        </a>
    </form>
@endsection
