@extends('partials.main')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Barang Keluar</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.barang-keluar') }}">Barang Keluar</a></li>
                        <li class="breadcrumb-item active">Tambah Data Barang Keluar</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <form action="{{ route('admin.barang-keluar.proses-keluar') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-6">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Form Tambah Barang Keluar</h3>
                            </div>
                            <!-- form start -->
                            <form>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama Barang</label>
                                        <input type="text" name="nama_barang" class="form-control" id="exampleInputEmail1" placeholder="Nama Barang">
                                        @error('nama_barang')
                                        <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tanggal Keluar</label>
                                        <input type="date" name="tgl_keluar" class="form-control" id="exampleInputEmail1" placeholder="Tanggal Keluar">
                                        @error('tgl_keluar')
                                        <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Jumlah Keluar</label>
                                        <input type="number" name="jml_keluar" class="form-control" id="exampleInputPassword1" placeholder="Jumlah Keluar">
                                        @error('jml-keluar')
                                        <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Lokasi</label>
                                        <input type="text" name="lokasi" class="form-control" id="exampleInputPassword1" placeholder="Lokasi">
                                        @error('lokasi')
                                        <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Penerima</label>
                                        <input type="text" name="penerima" class="form-control" id="exampleInputPassword1" placeholder="Penerima">
                                        @error('penerima')
                                        <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>
@endsection
