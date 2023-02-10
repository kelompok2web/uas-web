@extends('frontend.home')
@section('heading')
    Data Atribut
@endsection
@section('page')
<li class="breadcrumb-item active">Data Atribut</li>
@endsection
@section('content')
    <div class="col-md-12">
        <div class="card">

            <div class="card-header">
                <h3 class="card-title ">
                    <a href="{{ route('home') }}" class="btn btn-default btn-sm"><i class="nav-icon fas fa-arrow-left"></i>
                        &nbsp; Kembali
                    </a>
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#staticBackdrop">
                        <i class="nav-icon fas fa-folder-plus"></i> &nbsp; Tambah Data Penilaian 
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
                                <th>Nama Mahasiswa</th>
                                @foreach($kriteria as $k)
                                    <th class="text-center align-middle">
                                        {{$k->nama_kriteria}}
                                    </th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataNew as $item)
                                <tr class="text-center align-middle">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nim_mahasiswa }}</td>
                                    <td>{{ $item->p1 }}</td>
                                    <td>{{ $item->p2 }}</td>
                                    <td>{{ $item->p3 }}</td>
                                    <td>{{ $item->p4 }}</td>
                                    <td>{{ $item->p5 }}</td>
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
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Penilaian Mahasiswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('atribut.store')}}" method="POST">
                        @csrf
                        <div class="row">
                           
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="mahasiswa_id">Mahasiswa</label>
                                    <select id="mahasiswa_id" name="mahasiswa_id" class="select2bs4 form-control @error('mahasiswaa_id') is-invalid @enderror" required>
                                        <option value="">-- Pilih Mahasiswa --</option>
                                        @foreach ($mhs as $data)
                                            <option value="{{ $data->id }}">{{ $data->nim_mahasiswa }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="ipk">IPK</label>
                                    <input type="number"  max="4.00" min="0.00" step="0.01" id="ipk" name="ipk"  class="form-control @error('ipk') is-invalid @enderror" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="penghasilan">Penghasilan Ortu/bln (juta)</label>
                                    <select id="penghasilan" name="penghasilan" class="form-control">
                                        <option value="">--Pilih Salah Satu--</option>
                                        @foreach($penghasilan as $p)
                                            <option value="{{$p->kelompok}}">{{$p->deskripsi}}</option>
                                        @endforeach
                                    </select>
                                    @error('penghasilan') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="tanggungan">Jumlah Tanggungan (org)</label>
                                    <input type="number" id="tanggungan" name="tanggungan"  class="form-control @error('tanggungan') is-invalid @enderror" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="prestasi">Prestasi</label>
                                    <select id="prestasi" name="prestasi" class="form-control">
                                        <option value="">--Pilih Salah Satu--</option>
                                        @foreach($prestasi as $pres)
                                            <option value="{{$pres->kelompok}}">{{$pres->deskripsi}}</option>
                                        @endforeach
                                    </select>
                                    @error('prestasi') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="rumah">Kondisi Rumah</label>
                                    <select id="rumah" name="rumah" class="form-control">
                                        <option value="">--Pilih Salah Satu--</option>
                                        @foreach($rumah as $r)
                                            <option value="{{$r->kelompok}}">{{$r->deskripsi}}</option>
                                        @endforeach
                                    </select>
                                    @error('rumah') <span class="error">{{ $message }}</span> @enderror
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
