@extends('layout.main')
@section('title', 'Formulir Aspirasi')

@section('container')

<div class="container">
    <div class="row">
        @foreach ($galeri as $item)
        <div class="col-md-4">
            <article class="d-flex flex-column h-100">
                <img class="img-thumbnail" src="{{ asset('images/galeri/' . $item->gambar) }}" alt="" />
                <h2>{{ $item->nama }}</h2>
                <hr class="title-underline" />
                <p>
                    <small class="text-muted">
                        {{ $item->created_at->diffForHumans() }}
                    </small>
                </p>
                <p class="card-text">{{ $item->text }}</p>
            </article>
        </div>
        @endforeach
    </div>
</div>

@endsection