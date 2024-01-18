@extends('layout.admin')
@section('title', 'Dashboard')

@section('content')

<div class="container">
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    {{-- <th>ID</th> --}}
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Telpon</th>
                    <th>Alamat</th>
                    <th>tanggal</th>
                    <th>tujuan</th>
                    <th>isi</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pengaduan as $item)
                <tr>
                    {{-- <td class="col-1">{{ $item->id }}</td> --}}
                    <td class="col-1">{{ $item->name }}</td>
                    <td class="col-2">{{ $item->email }}</td>
                    <td class="col-2">{{ $item->telpon }}</td>
                    <td class="col-2">{{ $item->alamat }}</td>
                    <td class="col-1">{{ $item->tanggal }}</td>
                    <td class="col-1">{{ $item->tujuan->name }}</td>
                    <td class="col-3">{{ $item->isi }}</td>
                    <td class="col-1">
                        @if ($item->active == 0)
                        <p class="badge badge-danger">Belum Ditanggapi</p>
                        @else
                        <p class="badge badge-success">Ditanggapi</p>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</div>
@endsection