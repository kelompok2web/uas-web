@extends('frontend.home')
@section('heading', 'Edit Profile')
@section('page')
  <li class="breadcrumb-item active"><a href="{{ route('profile') }}">Pengaturan</a></li>
  <li class="breadcrumb-item active">Edit Profile</li>
@endsection
@section('content')
<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Edit Profile {{ Auth::user()->name }}</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form action="{{ route('pengaturan.ubah-profile') }}" method="POST">
        @csrf

        <div class="card-body">
            @if (Auth::user()->role == "Mahasiswa")
                <div class="row">
                    <input type="hidden" name="role" value="{{ Auth::user()->mahasiswa(Auth::user()->nim_mahasiswa)->role }}">
                    

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Nama Mahasiswa</label>
                            <input type="text" id="name" name="name" value="{{ Auth::user()->name }}" class="form-control @error('name') is-invalid @enderror" >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nim_mahasiswa">NIM Mahasiswa</label>
                            <input type="text" id="nim_mahasiswa" name="nim_mahasiswa" value="{{ Auth::user()->mahasiswa(Auth::user()->nim_mahasiswa)->nim_mahasiswa }}" class="form-control @error('nim_mahasiswa') is-invalid @enderror" disabled>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tmp_lahir">Tempat Lahir</label>
                            <input type="text" id="tmp_lahir" name="tmp_lahir" value="{{ Auth::user()->mahasiswa(Auth::user()->nim_mahasiswa)->tmp_lahir }}" class="form-control @error('tmp_lahir') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tgl_lahir">Tanggal Lahir</label>
                            <input type="date" id="tgl_lahir" name="tgl_lahir" value="{{ Auth::user()->mahasiswa(Auth::user()->nim_mahasiswa)->tgl_lahir }}" class="form-control @error('tgl_lahir') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="prodi_id">Prodi</label>
                           <select id="prodi_id" name="prodi_id" class="select2bs4 form-control @error('prodi_id') is-invalid @enderror">
                                <option value="">-- Pilih Mapel --</option >
                                @foreach ($prodi as $data)
                                    <option value="{{ $data->id }}"
                                        @if (Auth::user()->mahasiswa(Auth::user()->nim_mahasiswa)->prodi_id == $data->id)
                                            selected
                                        @endif
                                    >{{ $data->nama_prodi }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="jk">Jenis Kelamin</label>
                            <select id="jk" name="jk" class="select2bs4 form-control @error('jk') is-invalid @enderror">
                                <option value="">-- Pilih Jenis Kelamin --</option>
                                <option value="L"
                                    @if (Auth::user()->mahasiswa(Auth::user()->nim_mahasiswa)->jk == 'L')
                                        selected
                                    @endif
                                >Laki-Laki</option>
                                <option value="P"
                                    @if (Auth::user()->mahasiswa(Auth::user()->nim_mahasiswa)->jk == 'P')
                                        selected
                                    @endif
                                >Perempuan</option>
                            </select>
                        </div>
                    </div>
                </div>
            

            @else
                <div class="row">
                    <div class="col-md-12">
                    <div class="form-group">
                        <label for="name">Username</label>
                        <input id="name" type="text" value="{{ Auth::user()->name }}" class="form-control @error('name') is-invalid @enderror" name="name" autocomplete="off">
                    </div>
                    </div>
                </div>
            @endif
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <a href="{{ route('profile') }}" name="kembali" class="btn btn-default" id="back"><i class='nav-icon fas fa-arrow-left'></i> &nbsp; Kembali</a> &nbsp;
          <button name="submit" class="btn btn-primary" type="submit"><i class="nav-icon fas fa-save"></i> &nbsp; Simpan</button>
        </div>
      </form>
    </div>
    <!-- /.card -->
</div>
@endsection
