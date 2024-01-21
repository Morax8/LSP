@extends('layout.admin')
@section('title', 'Dashboard')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-3">
            <form action="/pengaduan" method="GET">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search" name="search"
                        value="{{ request('search') }}">
                    <button class="btn btn-dark" type="submit">Search</button>
                </div>
            </form>
        </div>

        <div class="col-md-4">
            <form action="/pengaduan" method="GET">
                <div class="input-group">
                    <div class="input-group-addon"><span class="glyphicon glyphicon-random"></span></div>
                    <select class="form-control" name="tujuan_id">
                        <option>Pilih</option>
                        <option value="1">Pelayanan Pendaftaran Penduduk</option>
                        <option value="2">Pelayanan Pencatatan Sipil</option>
                        <option value="3">Pengelolaan Informasi Administrasi Kependudukan</option>
                        <option value="4">Pemanfaatan Data Dan Inovasi Pelayanan</option>
                    </select>
                    <button class="btn btn-dark" type="submit">Search</button>
                </div>
            </form>
        </div>

        <div class="col-md-3">
            <form action="/pengaduan" method="GET">
                <div class="input-group">
                    <div class="input-group-addon"><span class="glyphicon glyphicon-random"></span></div>
                    <select class="form-control" name="active">
                        <option>Pilih</option>
                        <option value="0">Belum Ditanggapi</option>
                        <option value="1">Sudah Ditanggapi</option>
                    </select>
                    <button class="btn btn-dark" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>

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