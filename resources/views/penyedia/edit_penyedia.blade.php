@extends('partials.main')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Penyedia</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Edit Penyedia</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <form action="{{ route('admin.penyedia.update',['id' => $data->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Form Edit Penyedia</h3>
                            </div>
                            <form>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama Penyedia</label>
                                        <input type="text" name="nama_penyedia" value="{{ $data->nama_penyedia }}" class="form-control" id="exampleInputEmail1" placeholder="Nama Penyedia">
                                        @error('nama_penyedia')
                                        <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Alamat Penyedia</label>
                                        <input type="text" name="alamat_penyedia" value="{{ $data->alamat_penyedia }}" class="form-control" id="exampleInputEmail1" placeholder="Alamat Penyedia">
                                        @error('alamat_penyedia')
                                        <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Telepon Penyedia</label>
                                        <input type="text" name="telpon_penyedia" value="{{ $data->telepon_penyedia }}" class="form-control" id="exampleInputPassword1" placeholder="Telepon Penyedia">
                                        @error('telpon_penyedia')
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
