@extends('frontend.home')
@section('heading')
    Data Prodi 
@endsection
@section('page')
    
@endsection
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header justify-content-between">
            <h3 class="card-title ">
                <a href="{{ route('home') }}" class="btn btn-default btn-sm"><i class="nav-icon fas fa-arrow-left"></i> &nbsp; Kembali</a>
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target=".tambah-siswa">
                    <i class="nav-icon fas fa-folder-plus"></i> &nbsp; Tambah Data Prodi
                </button>
            </h3>
            
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Prodi</th>
                    <th>Jurusan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
 {{-- {{ dd($prodi) }}   --}}
                @foreach ($prodi as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->nama_prodi }}</td>
                    <td>{{ $data->jurusans->nama_jurusan}}</td>
                    <td>
                        <form action="{{ route('prodi.destroy',$data->id) }}"method="GET">
                            @csrf
                            @method('delete')
                            <a href="" class="btn btn-info btn-sm mt-2"><i class="nav-icon fas fa-id-card"></i></a>
                            <a href="{{ route('prodi.edit', $data->id) }}" class="btn btn-success btn-sm mt-2"><i class="nav-icon fas fa-edit"></i></a>
                            <button class="btn btn-danger btn-sm mt-2"><i class="nav-icon fas fa-trash-alt"></i></button>
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


<div class="modal fade bd-example-modal-md tambah-siswa" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Prodi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('prodi.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nama_prodi">Nama Prodi</label>
                                <input type="text" id="nama_prodi" name="nama_prodi"  class="form-control @error('nama_prodi') is-invalid @enderror">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="jurusan_id">Jurusan</label>
                                <select id="jurusan_id" name="jurusan_id" class="select2bs4 form-control @error('jurusan_id') is-invalid @enderror">
                                    <option value="">-- Pilih Jurusan --</option>
                                    @foreach ($jurusan as $data)
                                        <option value="{{ $data->id }}">{{ $data->nama_jurusan }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class='nav-icon fas fa-arrow-left'></i> &nbsp; Kembali</button>
                        <button type="submit" class="btn btn-primary"><i class="nav-icon fas fa-save"></i> &nbsp; Perbarui</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- /.col -->
@endsection
