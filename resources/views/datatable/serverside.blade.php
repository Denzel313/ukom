@extends('partials.main')

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.1/css/dataTables.dataTables.css" />
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">User</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Data User (Server Side)</li>
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
                    <a href="{{ route('admin.user.create') }}" class="btn btn-primary mb-3">Tambah Data</a>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Responsive Hover Table</h3>

                            <div class="card-tools">
                                <form action="{{ route('admin.index') }}" method="GET">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <input type="text" name="search" class="form-control float-right" placeholder="Search" value="{{ $request->get('search') }}">
                                </form>

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap" id="serverside">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Photo</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</div>
</section>
</div>
@endsection

@section('scripts')
<script src="https://cdn.datatables.net/2.0.1/js/dataTables.js"></script>

<script>
    $(document).ready(function() {
        loadData();
    });

    function loadData() {
        $('#serverside').DataTable({
            processing: true
            , pagination: true
            , responsive: false
            , serverSide: true
            , searching: true
            , ordering: false
            , ajax: {
                url: "{{ route('admin.serverside') }}"
            },
            columns: [
                {
                    data: 'no', 
                    name: 'no',
                }, 
                {
                    data: 'photo',
                    name: 'photo', 
                }, 
                {
                    data: 'nama',
                    name: 'nama', 
                }, 
                {
                    data: 'email',
                    name: 'email',
                },
                {
                    data: 'action',
                    name: 'action',
                },
            ]
        });
    }

</script>
@endsection
