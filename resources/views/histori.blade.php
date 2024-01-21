@extends('layout.main')
@section('title', 'Formulir Aspirasi')

@section('container')

<div class="container">
    <div class="row">
        <div class="col-md-3">
            <form action="/histori" method="GET">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search" name="search"
                        value="{{ request('search') }}">
                    <button class="btn btn-dark" type="submit">Search Menggunakan ID</button>
                </div>
            </form>
        </div>
    </div>

    @if ($pengaduan->count())
    <div class="row">
        <div class="col-md-8">
            @foreach ($pengaduan as $item)
            <div class="card-body shadow p-3 mb-5 bg-body rounded">
                <div class="row">
                    <div class="col-md-4">
                        <h3 class="h3-laporan custom">Laporan</h3>
                    </div>
                    <div class="col-md-8">
                        <h4 class="text-muted text-end fs-6">
                            {{ $item->tujuan->name }}
                        </h4>

                    </div>
                </div>
                <hr class="hr-laporan">
                <div class="media-body">
                    <div>
                        <h4 class="text-green profil-name" style="font-family: monospace;">
                            {{ $item->name }}
                        </h4>
                        <p class="text-muted text-sm"><i class="fa-regular fa-calendar-days"></i> -
                            {{ $item->tanggal }}
                        </p>
                    </div>
                    <hr class="hr-nama">
                    <div class="isi-laporan">
                        <p class="text-justify">
                            <img src="{{ asset('images/pengaduan/' .$item->gambar ) }}" alt="" class="img-thumbnail">
                        </p>
                    </div>
                    <div class="isi-laporan">
                        <p class="text-justify">
                            {{ $item->isi }}
                        </p>
                    </div>
                    <hr class="hr-laporan">

                    <!-- Comments -->
                    <div class="ms-4">
                        <h3 class="custom">Tindak Lanjut Laporan</h3>
                        <hr class="hr-laporan">
                        <div class="media-block comment">
                            <div class="media-body">
                                <div>
                                    @if ($item->tanggapan)
                                    <h4 class="text-primary profil-name" style="font-family: monospace;">
                                        Admin
                                    </h4>
                                    <p class="text-muted text-sm"><i class="fa-regular fa-calendar-days"></i> -
                                        {{ $item->tanggapan->tanggal }}
                                    </p>
                                    <hr class="hr-nama-admin">
                                    <p class="text-justify">
                                        {{ $item->tanggapan->isi }}
                                    </p>
                                    @else
                                    <p class="text-muted text-sm">No response yet</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    @else
    <p class="text-center fs-4">Laporan Tidak Ditemukan</p>
    @endif

    @endsection