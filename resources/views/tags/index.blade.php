@extends('layouts.app')

@section('title', 'Tag')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Tag</h1>

        <a href="{{ route('tags.create') }}" class="btn btn-primary">
            Nuovo tag
        </a>
    </div>

    @if ($tags->isEmpty())
        <div class="alert alert-info">
            Non ci sono ancora tag.
        </div>
    @else
        <div class="row g-3">
            @foreach ($tags as $tag)
                <div class="col-md-4">
                    <div class="card h-100">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <h2 class="h5 mb-0">{{ $tag->name }}</h2>

                            <a href="{{ route('tags.show', $tag) }}" class="btn btn-outline-primary">
                                Vedi articoli
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection
