@extends('frontend.home')
@section('heading')
    Data Jurusan 
@endsection
@section('page')
    
@endsection
@section('content')
{{-- {{ dd($data) }} --}}

<form action="{{ route('jurusan.update',$data->id) }}" method="Post">
    @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="nama_jurusan">Nama Jurusan</label>
                <input type="text" id="nama_jurusan" name="nama_jurusan"  class="form-control @error('nama_jurusan') is-invalid @enderror" value="{{ $data->nama_jurusan }}">
            </div>
        </div>
    </div>
    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class='nav-icon fas fa-arrow-left'></i> &nbsp; Kembali</button>
        <button type="submit" class="btn btn-primary"><i class="nav-icon fas fa-save"></i> &nbsp; Update</button>
    </div>
</form>


@endsection
