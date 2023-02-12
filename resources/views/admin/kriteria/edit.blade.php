@extends('frontend.home')

@section('heading')
    Data Edit Kriteria
@endsection
@section('page')
    
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h3 class="card-title">Edit Data</h3>
                </div>
            </div>
            <form role="form" action="{{ route('kriteria.update',$data->id) }}" method="POST">
                @csrf
                @method('put')
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nama_kriteria">Nama Kriteria</label>
                                <input type="text" id="nama_kriteria" name="nama_kriteria"
                                    class="form-control @error('nama_kriteria') is-invalid @enderror" value="{{ $data->nama_kriteria }}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="bobot">Bobot</label>
                                <input type="number" step="0.01" id="bobot" name="bobot"
                                    class="form-control @error('bobot') is-invalid @enderror" value="{{ $data->bobot }}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="tipe_data">Tipe</label>
                                <select id="tipe_data" name="tipe_data" class="select2bs4 form-control @error('tipe_data') is-invalid @enderror">
                                    <option value="">-- Pilih Tipe --</option>
                                    <option @if("Float"==$data->tipe_data) selected @endif value="Float">Float</option>
                                    <option @if("Crips"==$data->tipe_data) selected @endif value="Crips">Crips</option>
                                    <option @if("Integer"==$data->tipe_data) selected @endif value="Integer">Integer</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="crips_id">Crips (Optional)</label>
                                <select id="crips_id" name="crips_id" class="select2bs4 form-control">
                                    <option value="">-- Pilih Crips --</option>
                                    @foreach ($crip as $d)
                                        <option @if($d->id==$data->crips_id) selected @endif value="{{ $d->id }}">{{ $d->nama_crips }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <input type="text" id="status" name="status"
                                    class="form-control @error('status') is-invalid @enderror" value="{{ $data->status }}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="col-sm-10 offset-sm-1">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
</div>
@endsection