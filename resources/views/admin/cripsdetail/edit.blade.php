@extends('frontend.home')
@section('heading')
    Data Jurusan 
@endsection
@section('page')
    
@endsection
@section('content')
{{-- {{ dd($data) }} --}}

<form action="{{ route('cripsdetail.update',$data->id) }}" method="Post">
    @csrf
    @method('put')
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="crips_id">Nama Crips</label>
                <select id="crips_id" name="crips_id" class="select2bs4 form-control @error('crips_id') is-invalid @enderror" >
                    <option value="">-- Pilih Crips --</option>
                    @foreach ($crips as $d)
                        <option @if($d->id == $data->crips_id) selected @endif value="{{ $d->id}}">{{ $d->nama_crips }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-12">
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <input type="text" id="deskripsi" name="deskripsi"
                    class="form-control @error('nama_crips') is-invalid @enderror" value="{{ $data->deskripsi }}">
            </div>
        </div>

    </div>
    <div class="row">

        <div class="col-12">
            <div class="form-group">
                <label for="kelompok">Kelompok</label>
                <input type="number" id="kelompok" name="kelompok"
                    class="form-control @error('kelompok') is-invalid @enderror" value="{{ $data->kelompok }}">
            </div>
        </div>

    </div>

    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class='nav-icon fas fa-arrow-left'></i> &nbsp; Kembali</button>
        <button type="submit" class="btn btn-primary"><i class="nav-icon fas fa-save"></i> &nbsp; Update</button>
    </div>
</form>


@endsection
