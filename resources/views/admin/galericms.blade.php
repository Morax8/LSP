@extends('layout.admin')
@section('title', 'Galeri')

@section('content')

<div class="container">
    <button type="button" id="tambahButton" class="btn btn-warning" data-bs-toggle="modal"
        data-bs-target="#tambahModal">
        Tambah Gambar
    </button>
    <div class="table-responsive">
        @if ($galeri->count())
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($galeri as $item)
                <tr>
                    <td class="col-md-2">{{ $item->id }}</td>
                    <td class="col-md-2">{{ $item->nama }}</td>
                    <td class="col-md-8">
                        <img src="{{ asset('images/galeri/' . $item->gambar) }}" alt="" class="img-fluid"
                            style="display: block; margin: 0 auto; width: 80%; height: 80%;">
                    </td>
                    <td>
                        @if ($item->active)
                        <span class="badge badge-success">Active</span>
                        @else
                        <span class="badge badge-secondary">Inactive</span>
                        @endif
                    </td>
                    <td>
                        <a href="" class="btn btn-warning">Edit</a>
                        <p></p>
                        <form action="" method="POST">
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
        @else
        <p class="text-center fs-4">Gambar Tidak Ditemukan</p>
        @endif
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="tambahModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Gambar</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                        class="fa-solid fa-xmark"></i></button>
            </div>
            <hr>
            <form action="{{ route('galericms.store') }}" class="form-horizontal" role="form" method="post"
                enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nama" class="col-sm-3 control-label">Nama</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span>
                            </div>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" value=""
                                required>
                        </div>
                        @error('nama')
                        <small style="color: red">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="pengaduan" class="col-sm-3 control-label"> Gambar</label>
                    <div class="col-sm-9">
                        <input type="file" class="form-control" name="gambar">
                        @error('gambar')
                        <small style="color: red">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="pengaduan" class="col-sm-3 control-label"> Text (caption)</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <textarea class="form-control" rows="4" name="text" placeholder="Tuliskan caption"
                                required></textarea>
                        </div>
                        @error('text')
                        <small style="color: red">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-10 col-sm-offset-3">
                        <input id="submit" name="submit" type="submit" value="Tambah" class="btn btn-primary">
                    </div>
                </div>
                <hr>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Add an event listener to the button that will trigger the modal
        document.getElementById('tambahButton').addEventListener('click', function () {
            const tambahModal = new bootstrap.Modal(document.getElementById('tambahModal'));
            tambahModal.show();
        });

        // Optional: Close the modal when the form is submitted
        document.getElementById('tambahForm').addEventListener('submit', function () {
            const tambahModal = new bootstrap.Modal(document.getElementById('tambahModal'));
            tambahModal.hide();
        });
    });
</script>


@endsection