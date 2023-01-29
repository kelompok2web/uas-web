@extends('frontend.home')

@section('content')
    <div class="col-md-12">

        <div class="card">
            <div class="card-header">
                <h3 class="card-title ">
                    <a href="{{ route('home') }}" class="btn btn-default btn-sm"><i class="nav-icon fas fa-arrow-left"></i>
                        &nbsp; Kembali</a>

                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#staticBackdrop">
                        <i class="nav-icon fas fa-folder-plus"></i> &nbsp; Tambah Data Kriteria
                    </button>
                </h3>
            </div>
            <div class="card-body">
                <div class="row">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Kode</th>
                            <th>Nama Kriteria</th>
                            <th>Jenis</th>
                            <th>Bobot</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kriteria as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->kode }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->jenis }}</td>
                                <td>{{ $item->bobot }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <div class="modal fade " id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Kriteria</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('kriteria.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="kode">Kode Kriteria</label>
                                    <input type="text" id="kode" name="kode"
                                        class="form-control @error('kode') is-invalid @enderror" required autofocus>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama">Nama Kriteria</label>
                                    <input type="text" id="nama" name="nama"
                                        class="form-control @error('nama') is-invalid @enderror" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jenis">Jenis</label>
                                    <input type="text" id="jenis" name="jenis"
                                        class="form-control @error('jenis') is-invalid @enderror" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="bobot">Bobot</label>
                                    <input type="text" id="bobot" name="bobot"
                                        class="form-control @error('bobot') is-invalid @enderror" required>
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
@endsection
