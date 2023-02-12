@extends('frontend.home')
@section('heading')
    Data Edit Prodi
@endsection
@section('page')
    
@endsection
@section('content')
{{-- {{ dd($data) }} --}}

<form action="{{ route('prodi.update',$data->id) }}" method="Post">
    @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="nama_prodi">Nama Prodi</label>
                <input type="text" id="nama_prodi" name="nama_prodi"  class="form-control @error('nama_prodi') is-invalid @enderror" value="{{ $data->nama_prodi }}">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="jurusan_id">Jurusan</label>
                <select id="jurusan_id" name="jurusan_id" class="select2bs4 form-control @error('jurusan_id') is-invalid @enderror">
                    <option value="">-- Pilih Jurusan --</option>
                    @foreach ($jurusan as $d)
                    <option @if($d->id==$data->jurusan_id) selected @endif value="{{ $d->id}}">{{ $d->nama_jurusan }}</option>
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


@endsection