@extends('frontend.home')
@section('heading')
    Data Kriteria
@endsection
@section('page')
<li class="breadcrumb-item active">Data Kriteria</li>
@endsection
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
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Kriteria</th>
                                <th>Bobot (%)</th>
                                <th>Tipe</th>
                                <th>Data Crips</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kriteria as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama_kriteria }}</td>
                                    <td>{{ $item->bobot }}</td>
                                    <td>{{ $item->tipe_data }}</td>
                                    <td>{{ $item->crips_id? :'Tidak ada' }}</td>
                                    <td>
                                        <form action="{{ route('kriteria.destroy', $item->id) }}"method="Post">
                                            @csrf
                                            @method('delete')
                                            <a href="#"class="btn btn-success btn-sm mt-2"><i
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
                                    <label for="nama_kriteria">Nama Kriteria</label>
                                    <input type="text" id="nama_kriteria" name="nama_kriteria"
                                        class="form-control @error('nama_kriteria') is-invalid @enderror" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="bobot">Bobot</label>
                                    <input type="number" step="0.01" id="bobot" name="bobot"
                                        class="form-control @error('kode') is-invalid @enderror" required autofocus>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tipe_data">Tipe</label>
                                    <select id="tipe_data" name="tipe_data" class="select2bs4 form-control @error('tipe_data') is-invalid @enderror" required>
                                        <option value="">-- Pilih Tipe --</option>
                                        <option value="Float">Float</option>
                                        <option value="Crips">Crips</option>
                                        <option value="Integer">Integer</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="crips_id">Crips (Optional)</label>
                                    <select id="crips_id" name="crips_id" class="select2bs4 form-control">
                                        <option value="">-- Pilih Crips --</option>
                                        @foreach ($crips as $data)
                                            <option value="{{ $data->id }}">{{ $data->nama_crips }}</option>
                                        @endforeach
                                    </select>
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
