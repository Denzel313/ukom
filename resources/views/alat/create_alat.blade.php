@extends('partials.main')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Alat Bahan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.alat-bahan') }}">Alat Bahan</a></li>
                        <li class="breadcrumb-item active">Tambah Alat Bahan</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <form action="{{ route('admin.store.alat-bahan') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Form Tambah Alat Bahan</h3>
                            </div>
                            <form>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama Barang</label>
                                        <input type="test" name="nama_barang" class="form-control" id="exampleInputEmail1" placeholder="Nama Barang">
                                        @error('nama_barang')
                                        <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Spesifikasi</label>
                                        <input type="text" name="spesifikasi" class="form-control" id="exampleInputEmail1" placeholder="Spesifikasi">
                                        @error('spesifikasi')
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
                                        <label for="exampleInputPassword1">Kondisi</label>
                                        <input type="text" name="kondisi" class="form-control" id="exampleInputPassword1" placeholder="Kondisi">
                                        @error('kondisi')
                                        <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Jumlah Barang</label>
                                        <input type="number" name="jumlah_barang" class="form-control" id="exampleInputPassword1" placeholder="Jumlah Barang">
                                        @error('jumlah_barang')
                                        <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Sumber Dana</label>
                                        <input type="text" name="sumber_dana" class="form-control" id="exampleInputPassword1" placeholder="Sumber Dana">
                                        @error('sumber_dana')
                                        <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
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
