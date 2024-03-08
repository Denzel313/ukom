@extends('partials.main')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Barang Masuk</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Data Barang Masuk</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-12">
                    @hasrole('admin')
                    <a href="{{ route('admin.barang-masuk.create-masuk') }}" class="btn btn-primary mb-3">Tambah Data</a>
                    @endhasrole
                    <a href="" class="btn btn-success mb-3">Export Excel</a>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Table Barang Masuk</h3>

                            <div class="card-tools">
                                <form action="{{ route('admin.index') }}" method="GET">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        {{-- <input type="text" name="search" class="form-control float-right" placeholder="Search" value=""> --}}

                                </form>

                                <div class="input-group-append">
                                    {{-- <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Tanggal Masuk</th>
                                    <th>Jumlah Masuk</th>
                                    <th>Penyedia</th>
                                    @hasrole('admin')
                                    <th>Action</th>
                                    @endhasrole
                                </tr>
                            </thead>
                            @hasrole('admin')
                            <tbody>
                                @foreach ($data as $d)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $d->nama_barang }}</td>
                                    <td>{{ $d->created_at->isoFormat('dddd, D MMMM Y') }}</td>
                                    <td>{{ $d->jml_masuk }}</td>
                                    <td>{{ $d->nama_penyedia }}</td>
                                    <td>
                                        <a data-toggle="modal" data-target="#modal-hapus{{ $d->id }}" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Hapus</a>
                                    </td>
                                </tr>
                                <div class="modal fade" id="modal-hapus{{ $d->id }}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Konfirmasi Hapus Data</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Apakah Kamu yakin ingin menghapus data barang<b>{{ $d->nama_barang }}</b></p>
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <form action="{{ route('admin.delete.barang-masuk',['id' => $d->id]) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Ya, Hapus</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </tbody>
                            @endhasrole

                            @hasrole('manajemen')
                            <tbody>
                                @foreach ($data as $d)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $d->nama_barang }}</td>
                                    <td>{{ $d->tgl_masuk->isoFormat('dddd, D MMMM Y') }}</td>
                                    <td>{{ $d->jml_masuk }}</td>
                                    <td>{{ $d->nama_penyedia }}</td>
                                    @endforeach
                            </tbody>
                            @endhasrole
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
