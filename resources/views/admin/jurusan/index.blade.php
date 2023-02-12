@extends('frontend.home')
@section('heading')
    Data Jurusan
@endsection
@section('page')
<li class="breadcrumb-item active">Data Jurusan</li>
@endsection
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header justify-content-between">
                <h3 class="card-title ">
                    <a href="{{ route('home') }}" class="btn btn-default btn-sm"><i class="nav-icon fas fa-arrow-left"></i>
                        &nbsp; Kembali</a>

                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#staticBackdrop">
                        <i class="nav-icon fas fa-folder-plus"></i> &nbsp; Tambah Data Jurusan
                    </button>

                </h3>

            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Jurusan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jurusan as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->nama_jurusan }}</td>
                                    <td>
                                        <form action="{{ route('jurusan.destroy', $data->id) }}"method="GET">
                                            @csrf
                                            @method('delete')
                                            <a href="" class="btn btn-info btn-sm mt-2"><i
                                                    class="nav-icon fas fa-id-card"></i></a>
                                            <a href="{{ route('jurusan.edit', $data->id) }}"class="btn btn-success btn-sm mt-2"><i
                                                    class="nav-icon fas fa-edit"></i></a>
                                            <button class="btn btn-danger btn-sm mt-2"
                                                onclick="return confirm('Apakah yakin menghapus data ini?');"><i
                                                    class="nav-icon fas fa-trash-alt"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>

    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Jurusan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('jurusan.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="nama_jurusan">Nama Jurusan</label>
                                    <input type="text" id="nama_jurusan" name="nama_jurusan"
                                        class="form-control @error('no_induk') is-invalid @enderror" required>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i
                                    class='nav-icon fas fa-arrow-left'></i> &nbsp; Kembali</button>
                            <button type="submit" class="btn btn-primary"><i class="nav-icon fas fa-save"></i> &nbsp;
                                Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- /.col -->
@endsection
