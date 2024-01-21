@extends('layout.admin')
@section('title', 'Pengaduan')

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
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Telpon</th>
                    <th>isi</th>
                    <th>Status</th>
                    <th colspan="3" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pengaduan as $item)
                <tr>
                    <td class="col-1">{{ $item->name }}</td>
                    <td class="col-2">{{ $item->email }}</td>
                    <td class="col-1">{{ $item->telpon }}</td>
                    <td class="col-4">{{ $item->isi }}</td>
                    <td>
                        @if ($item->active == 0)
                        <p class="badge badge-danger">Belum Ditanggapi</p>
                        @else
                        <p class="badge badge-success">Ditanggapi</p>
                        @endif
                    </td>
                    <td class="text-center">
                        <button type="button" id="detailButton{{ $item->id }}" class="btn btn-warning"
                            data-bs-toggle="modal" data-bs-target="#detailModal{{ $item->id }}">
                            Detail
                        </button>
                    </td>
                    <td class="text-center">
                        <button type="button" id="balasButton{{ $item->id }}" class="btn btn-warning"
                            data-bs-toggle="modal" data-bs-target="#balasModal{{ $item->id }}">
                            Balas
                        </button>
                    </td>
                    <td class="text-center">
                        <form action="{{ route('pengaduan.destroy', $item->id) }}" method="POST">
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


        <!-- Modal Detail -->
        @foreach ($pengaduan as $key)
        <?php
        // Check if there is a response for the current report
        $reportId = $key->id;
        $response = \App\Models\Tanggapan::where('id', $reportId)->first();

        // Set a variable to indicate if a response is found
        $foundReply = $response ? true : false;
        ?>
        <div class="modal fade" id="detailModal{{ $key->id }}" tabindex="-1" aria-labelledby="staticBackdropLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                                class="fa-solid fa-xmark"></i></button>
                    </div>
                    <div class="modal-body">
                        <table class="info-table">
                            <tr>
                                <td>Nama :</td>
                                <td>{{ $key->name }}</td>
                            </tr>
                            <tr>
                                <td>Email :</td>
                                <td>{{ $key->email }}</td>
                            </tr>
                            <tr>
                                <td>Telpon :</td>
                                <td>{{ $key->telpon }}</td>
                            </tr>
                            <tr>
                                <td>Alamat :</td>
                                <td>{{ $key->alamat }}</td>
                            </tr>
                            <tr>
                                <td>Tujuan :</td>
                                <td>{{ $key->tujuan->name }}</td>
                            </tr>
                            <tr>
                                <td>Isi :</td>
                                <td>{{ $key->isi }}</td>
                            </tr>
                            <tr>
                                <td>Status :</td>
                                <td>
                                    @if ($key->active == 0)
                                    <p class="badge badge-danger">Belum Ditanggapi</p>
                                    @else
                                    <p class="badge badge-success">Ditanggapi</p>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Gambar :</td>
                                <td>
                                    <img src="{{ asset('images/pengaduan/' . $key->gambar) }}" alt="Gambar Pengaduan"
                                        style="height: 100px;">
                            </tr>

                        </table>
                    </div>
                    <div class="modal-footer">
                        @if ($foundReply)
                        <!-- Display something when a response is found -->
                        <p>Response Found!</p>
                        @else
                        <!-- Display something when no response is found -->
                        <p>No Response Yet</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        {{-- Modal Balasan --}}
        <div class="modal fade" id="balasModal{{ $key->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <hr>
                    <form action="{{ route('pengaduan.tanggapan', ['id' => $key->id]) }}" class="form-horizontal"
                        role="form" method="post">
                        @csrf
                        <div class="form-group">
                            <textarea class="form-control" rows="4" name="isi" placeholder="Tuliskan Isi Taggapan"
                                required></textarea>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-10 col-sm-offset-3">
                                <input id="submit" name="submit" type="submit" value="Kirim Pengaduan"
                                    class="btn btn-primary">
                            </div>
                        </div>
                        <hr>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>


{{-- <script>
    // Initialize both modals
    const detailModal = new bootstrap.Modal(document.getElementById('detailModal'));
    const balasModal = new bootstrap.Modal(document.getElementById('balasModal'));

    // Show the detail modal
    const detailButton = document.getElementById('detailButton');
    detailButton.addEventListener('click', () => {
        detailModal.show();
    });

    // Attach an event listener to the Detail button to show the balas modal when clicked
    const balasButton = document.getElementById('balasButton');
    balasButton.addEventListener('click', () => {
        balasModal.show();
    });

    // Optionally, you can show the balas modal immediately if needed
    // balasModal.show();
</script> --}}
<script>
    // Initialize both modals
    const detailModals = document.querySelectorAll('[id^="detailModal"]');
    const balasModals = document.querySelectorAll('[id^="balasModal"]');

    // Attach event listeners to all Detail buttons
    document.querySelectorAll('[id^="detailButton"]').forEach((button, index) => {
        button.addEventListener('click', () => {
            const detailModal = new bootstrap.Modal(detailModals[index]);
            detailModal.show();
        });
    });

    // Attach event listeners to all Balas buttons
    document.querySelectorAll('[id^="balasButton"]').forEach((button, index) => {
        button.addEventListener('click', () => {
            const balasModal = new bootstrap.Modal(balasModals[index]);
            balasModal.show();
        });
    });
</script>
<style>
    .info-table {
        width: 100%;
        /* Set the table width */
        border-collapse: collapse;
        /* Remove default spacing between table cells */
    }

    .info-table tr {
        border-bottom: 1px solid #ddd;
        /* Add a bottom border to separate rows */
    }

    .info-table td {
        padding: 10px;
        /* Adjust cell padding */
    }
</style>
@endsection