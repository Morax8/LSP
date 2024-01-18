@extends('layout.admin')
@section('title', 'Pengaduan')

@section('content')

<div class="container">
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Telpon</th>
                    <th>isi</th>
                    <th>Status</th>
                    <th>aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pengaduan as $item)
                <tr>
                    <td class="col-1">{{ $item->name }}</td>
                    <td class="col-2">{{ $item->email }}</td>
                    <td class="col-2">{{ $item->telpon }}</td>
                    <td class="col-3">{{ $item->isi }}</td>
                    <td>
                        @if ($item->active == 0)
                        <p class="badge badge-danger">Belum Ditanggapi</p>
                        @else
                        <p class="badge badge-success">Ditanggapi</p>
                        @endif
                    </td class="col-1">
                    <td class="col-3">
                        <button type="button" id="detailButton{{ $item->id }}" class="btn btn-warning"
                            data-bs-toggle="modal" data-bs-target="#detailModal">
                            Detail
                        </button>
                        <button type="button" id="balasButton{{ $item->id }}" class="btn btn-warning"
                            data-bs-toggle="modal" data-bs-target="#balasModal">
                            Balas
                        </button>
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
        <div class="modal fade" id="detailModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>{{ $key->name }}</p>
                        <p>{{ $key->email }}</p>
                        <p>{{ $key->telpon }}</p>
                        <p>{{ $key->alamat }}</p>
                        <p>{{ $key->tanggal }}</p>
                        <p>{{ $key->tujuan->name }}</p>
                        <p>{{ $key->isi }}</p>
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
        <div class="modal fade" id="balasModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <hr>
                    <form action="{{ route('pengaduan.tanggapan', ['id' => $item->id]) }}" class="form-horizontal"
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


<script>
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
</script>



</script>
@endsection