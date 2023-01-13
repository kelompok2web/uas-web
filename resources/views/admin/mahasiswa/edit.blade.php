@extends('frontend.home')
@section('heading')
    Data Mahasiswa
@endsection
@section('page')
    <li class="breadcrumb-item active">Mahasiswa</li>
@endsection
@section('content')

{{-- {{ dd($data) }} --}}

<form action="{{ route('mahasiswa.updateV2',$data->id) }}" method="Post">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="nama_mahasiswa">Nama Mahasiswa</label>
                <input type="text" id="nama_mahasiswa" name="nama_mahasiswa"  class="form-control @error('nama_mahasiswa') is-invalid @enderror" value="{{ $data->nama_mahasiswa }}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="nim_mahasiswa">NIM Mahasiswa</label>
                <input type="text" id="nim_mahasiswa" name="nim_mahasiswa"  class="form-control @error('nim_mahasiswa') is-invalid @enderror" value="{{ $data->nim_mahasiswa }}">
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="tmp_lahir">Tempat Lahir</label>
                <input type="text" id="tmp_lahir" name="tmp_lahir" class="form-control @error('tmp_lahir') is-invalid @enderror" value="{{ $data->tmp_lahir }}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="tgl_lahir">Tanggal Lahir</label>
                <input type="date" id="tgl_lahir" name="tgl_lahir" class="form-control @error('tgl_lahir') is-invalid @enderror" value="{{ $data->tgl_lahir }}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="prodi_id">Prodi</label>
                <select id="prodi_id" name="prodi_id" class="select2bs4 form-control @error('prodi_id') is-invalid @enderror">
                    <option value="">-- Pilih Prodi --</option>
                    @foreach ($prodi as $d)
                        <option @if($d->id==$data->prodi_id) selected @endif value="{{ $d->id }}">{{ $d->nama_prodi }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="jk">Jenis Kelamin</label>
                <select id="jk" name="jk" class="select2bs4 form-control @error('jk') is-invalid @enderror">
                    <option value="">-- Pilih Jenis Kelamin --</option>
                    <option @if("L"==$data->jk) selected @endif  value="L">Laki-Laki</option>
                    <option @if("P"==$data->jk) selected @endif  value="P">Perempuan</option>
                </select>
            </div>
        </div>
    </div>
    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class='nav-icon fas fa-arrow-left'></i> &nbsp; Kembali</button>
        <button type="submit" class="btn btn-primary"><i class="nav-icon fas fa-save"></i> &nbsp; Update</button>
    </div>
</form>

@endsection
