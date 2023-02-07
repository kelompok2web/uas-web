@extends('frontend.home')

@section('heading')
    Data Crips
@endsection

@section('page')
@endsection

@section('content')
    {{-- {{ dd($data) }} --}}

    <form action="{{ route('crips.update', $item->id) }}" method="Post">
        @csrf
        {{-- @method('put') --}}
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="nama_crips">Nama crips</label>
                    <input type="text" id="nama_crips" name="nama_crips"
                        class="form-control @error('nama_crips') is-invalid @enderror" value="{{ $item->nama_crips }}">
                </div>
            </div>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal"><i class='nav-icon fas fa-arrow-left'></i>
                &nbsp; Kembali</button>
            <button type="submit" class="btn btn-primary"><i class="nav-icon fas fa-save"></i> &nbsp; Update</button>
        </div>
    </form>
@endsection
