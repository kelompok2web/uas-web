@extends('frontend.home')
@section('heading')
    Data Mahasiswa
@endsection
@section('page')
    <li class="breadcrumb-item active">Mahasiswa</li>
@endsection
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title ">
                <a href="{{ route('home') }}" class="btn btn-default btn-sm"><i class="nav-icon fas fa-arrow-left"></i> &nbsp; Kembali</a>
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target=".tambah-mhs">
                    <i class="nav-icon fas fa-folder-plus"></i> &nbsp; Tambah Data Mahasiswa
                </button>
            </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Mahasiswa</th>
                    <th>Nim</th>
                    <th>Prodi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                 {{-- {{ dd($mhs) }}   --}}
                @foreach ($mhs as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->nama_mahasiswa }}</td>
                    <td>{{ $data->nim_mahasiswa }}</td>
                    <td>{{ $data->prodi->nama_prodi}}</td>
                    <td>
                        <form action="{{ route('mahasiswa.destroyV2',$data->id) }}"method="GET">
                            @csrf
                            @method('delete')
                            <a href="" class="btn btn-info btn-sm mt-2"><i class="nav-icon fas fa-id-card"></i></a>
                            <a href="{{ route('mahasiswa.edit', $data->id) }}" class="btn btn-success btn-sm mt-2"><i class="nav-icon fas fa-edit"></i></a>
                            <button type="submit" class="btn btn-danger btn-sm mt-2"><i class="nav-icon fas fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>

        </div>

        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>

<!-- /.col -->

<div class="modal fade bd-example-modal-lg tambah-mhs" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Mahasiswa</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <div class="modal-body">
            <form action="{{ route('mahasiswa.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama_mahasiswa">Nama Mahasiswa</label>
                            <input type="text" id="nama_mahasiswa" name="nama_mahasiswa"  class="form-control @error('nama_mahasiswa') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nim_mahasiswa">NIM Mahasiswa</label>
                            <input type="text" id="nim_mahasiswa" name="nim_mahasiswa"  class="form-control @error('nim_mahasiswa') is-invalid @enderror">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tmp_lahir">Tempat Lahir</label>
                            <input type="text" id="tmp_lahir" name="tmp_lahir" class="form-control @error('tmp_lahir') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tgl_lahir">Tanggal Lahir</label>
                            <input type="date" id="tgl_lahir" name="tgl_lahir" class="form-control @error('tgl_lahir') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="prodi_id">Prodi</label>
                            <select id="prodi_id" name="prodi_id" class="select2bs4 form-control @error('prodi_id') is-invalid @enderror">
                                <option value="">-- Pilih Prodi --</option>
                                @foreach ($prodi as $data)
                                    <option value="{{ $data->id }}">{{ $data->nama_prodi }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="jk">Jenis Kelamin</label>
                            <select id="jk" name="jk" class="select2bs4 form-control @error('jk') is-invalid @enderror">
                                <option value="">-- Pilih Jenis Kelamin --</option>
                                <option value="L">Laki-Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class='nav-icon fas fa-arrow-left'></i> &nbsp; Kembali</button>
                    <button type="submit" class="btn btn-primary"><i class="nav-icon fas fa-save"></i> &nbsp; Tambah</button>
                </div>
            </form>
        </div>
      </div>
    </div>
</div>
@endsection
