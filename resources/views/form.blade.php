@extends('layout.main')
@section('title', 'Formulir Aspirasi')

@section('container')
<div class="container">
    <div class="main-content">

        <h3>Formulir Pengaduan Masyarakat</h3>
        <hr />
        <div class="row">
            <div class="col-md-8 card-shadow-2 form-custom">
                <form class="form-horizontal" role="form" method="post" action="{{ route('form.store') }}">
                    @csrf
                    <div class="form-group">
                        {{-- <label for="nomor" class="col-sm-3 control-label">Nomor Pengaduan</label> --}}
                        <div class="col-sm-9">
                            <div class="input-group">
                                <div class="input-group-addon"><span
                                        class="glyphicon glyphicon-exclamation-sign"></span>
                                </div>
                                <input type="hidden" class="form-control" id="nomor" name="nomor" value="" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama" class="col-sm-3 control-label">Nama</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Nama Lengkap"
                                    value="" required>
                            </div>
                            @error('nama')
                            <small style="color: red">{{ $message }}</small>
                            @enderror

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="example@domain.com" value="" required>
                            </div>
                            @error('email')
                            <small style="color: red">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="telpon" class="col-sm-3 control-label">Telpon</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <div class="input-group-addon"><span class="glyphicon glyphicon-phone"></span></div>
                                <input type="text" class="form-control" id="telpon" name="telpon"
                                    placeholder="087123456789" value="" required>
                            </div>
                            @error('telpon')
                            <small style="color: red">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alamat" class="col-sm-3 control-label">Alamat</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <div class="input-group-addon"><span class="glyphicon glyphicon-home"></span></div>
                                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat"
                                    value="<?= @$_GET['alamat'] ?>" required>
                            </div>
                            @error('alamat')
                            <small style="color: red">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="tanggal" class="col-sm-3 control-label">Tanggal</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <div class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></div>
                                <input type="date" class="form-control" id="tanggal" name="tanggal"
                                    placeholder="Tanggal" value="" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tujuan" class="col-sm-3 control-label">Tujuan Pengaduan</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <div class="input-group-addon"><span class="glyphicon glyphicon-random"></span></div>
                                <select class="form-control" name="tujuan_id">
                                    <option>Pilih</option>
                                    <option value="1">Pelayanan Pendaftaran Penduduk</option>
                                    <option value="2">Pelayanan Pencatatan Sipil</option>
                                    <option value="3">Pengelolaan Informasi Administrasi Kependudukan</option>
                                    <option value="4">Pemanfaatan Data Dan Inovasi Pelayanan</option>
                                </select>
                            </div>
                            @error('tujuan')
                            <small style="color: red">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="pengaduan" class="col-sm-3 control-label">Isi Pengaduan</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <div class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span></div>
                                <textarea class="form-control" rows="4" name="isi" placeholder="Tuliskan Isi Pengaduan"
                                    required></textarea>
                            </div>
                            @error('isi')
                            <small style="color: red">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-10 col-sm-offset-3">
                            <input id="submit" name="submit" type="submit" value="Kirim Pengaduan"
                                class="btn btn-primary-custom form-shadow">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-10 col-sm-offset-2">
                            <p class="error"><em>* Catat Nomor Pengaduan Untuk Melihat Status Pengaduan</em></p>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-4"></div>
        </div>


        <!-- link to top -->
        <a id="top" href="#" onclick="topFunction()">
            <i class="fa fa-arrow-circle-up"></i>
        </a>
        <script>
            // When the user scrolls down 100px from the top of the document, show the button
    window.onscroll = function() {scrollFunction()};
    function scrollFunction() {
        if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
            document.getElementById("top").style.display = "block";
        } else {
            document.getElementById("top").style.display = "none";
        }
    }
    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
        </script>
        <!-- link to top -->


        <!-- /.section -->
        <hr>
    </div>
</div>

@endsection