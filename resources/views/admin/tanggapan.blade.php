@extends('layout.admin')
@section('title', 'Tanggapan')

@section('content')

<div class="container">
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>id Pengaduan</th>
                    <th>Isi</th>
                    <th>Tanggal</th>
                    <th>isi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tanggapan as $item)
                <tr>
                    <td class="col-1">{{ $item->pengaduan_id }}</td>
                    <td class="col-3">{{ $item->isi }}</td>
                    <td class="col">{{ $item->tanggal }}</td>

                    <td class="col-3">
                        <form action="{{ route('tanggapan.destroy', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Yakin ingin menghapus data?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


@endsection