@extends('partials.main')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Peminjam</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.peminjaman') }}">Peminjam</a></li>
                        <li class="breadcrumb-item active">Tambah Peminjam</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <form action="{{ route('admin.peminjam.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Form Tambah Peminjam</h3>
                            </div>
                            <form>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Peminjam</label>
                                        <input type="text" name="peminjam" class="form-control" id="exampleInputEmail1" placeholder="Peminjam">
                                        @error('peminjam')
                                        <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tanggal Pinjam</label>
                                        <input type="date" name="tgl_pinjam" class="form-control" id="exampleInputEmail1" placeholder="Tanggal Pinjam">
                                        @error('tgl_pinjam')
                                        <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Nama Barang</label>
                                        @foreach ($barang as $b)  
                                        <input type="hidden" name="id_barang" value="{{ $b->id_barang }}">{{ $b->id_barang }}</input>
                                        @endforeach
                                        <select name="nama_barang" class="form-control">
                                            @foreach ($barang as $b)
                                            <option value="{{ $b->nama_barang }}">{{ $b->nama_barang }}</option>
                                            @endforeach
                                        </select>
                                        @error('nama_barang')
                                        <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Jumlah Barang</label>
                                        <input type="number" name="jml_barang" class="form-control" id="exampleInputEmail1" placeholder="Jumlah Barang">
                                        @error('jml_barang')
                                        <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tanggal Kembali</label>
                                        <input type="date" name="tgl_kembali" class="form-control" id="exampleInputEmail1" placeholder="Tanggal Kembali">
                                        @error('tgl_kembali')
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
