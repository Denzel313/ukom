@extends('partials.main')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Barang Masuk</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.barang-masuk') }}">Barang Masuk</a></li>
                        <li class="breadcrumb-item active">Tambah Barang Masuk</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <form action="{{ route('admin.barang-masuk.proses-masuk') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Form Tambah Barang Masuk</h3>
                            </div>
                            <form>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="id_barang">Nama Barang</label>
                                        <select name="id_barang" class="form-control" id="position-option">
                                            @foreach ($data as $d)
                                            <option value="{{ $d->id }}">{{ $d->nama_barang }}</option>
                                            @endforeach
                                        </select>
                                        @error('id_barang')
                                        <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Jumlah Masuk</label>
                                        <input type="number" name="jml_masuk" class="form-control" id="exampleInputPassword1" placeholder="Jumlah Masuk">
                                        @error('jml_masuk')
                                        <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="id_penyedia">Nama Penyedia</label>
                                        <select name="id_penyedia" class="form-control" id="position-option">
                                            @foreach ($penyedia as $p)
                                            @if(old('id_penyedia') == $p->id)
                                            <option value="{{ $p->id }}" selected>{{ $p->nama_penyedia }}</option>
                                            @else
                                            <option value="{{ $p->id }}">{{ $p->nama_penyedia }}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                        @error('id_penyedia')
                                        <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                        </div>
                    </div>
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
