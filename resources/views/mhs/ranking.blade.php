@extends('frontend.home')
@section('heading', 'Nilai Perankingan')
@section('page')
  <li class="breadcrumb-item active">Nilai Ranking SAW</li>
@endsection
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Nilai Akhir</h3>
        </div>
        <div class="card-body">
            <div class="row">
              <div class="col-md-12" style="margin-top: -21px;">
                  <table class="table">
                        <tr>
                            <td>No Induk Siswa</td>
                            <td>:</td>
                            <td>{{ Auth::user()->nim_mahasiswa }}</td>
                        </tr>
                        <tr>
                            <td>Nama Siswa</td>
                            <td>:</td>
                            <td class="text-capitalize">{{ Auth::user()->name }}</td>
                        </tr>
                        <tr>
                            <td>Prodi</td>
                            <td>:</td>
                            <td>{{ $PRODI->nama_prodi }}</td>
                        </tr>
                  </table>
                  <hr>
              </div>
              <div class="col-md-12">
                <div class="row">

                    <div class="col-12 mb-3">
                        <h4 class="mb-3">Hasil Perhitungan Akhir</h4>
                        
                        <table id="dataTable" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center align-middle">NIM</th>
                                    <th class="text-center align-middle">IPK</th>
                                    <th class="text-center align-middle">Penghasilan Ortu/bln (Juta)</th>
                                    <th class="text-center align-middle">Jumlah Tanggungan Orgtua</th>
                                    <th class="text-center align-middle">Prestasi</th>
                                    <th class="text-center align-middle">Kondisi Rumah</th>
                                    <th class="text-center align-middle">Total</th>
                                    <th class="text-center align-middle">Rangking</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($DATA as $val => $data)
                                <tr class="text-center align-middle">
                                <td class="text-center align-middle">{{ $data->nim_mahasiswa }}</td>
                                <td class="text-center align-middle">{{ $data->p1_level3 }}</td>
                                <td class="text-center align-middle">{{ $data->p2_level3 }}</td>
                                <td class="text-center align-middle">{{ $data->p3_level3 }}</td>
                                <td class="text-center align-middle">{{ $data->p4_level3 }}</td>
                                <td class="text-center align-middle">{{ $data->p5_level3 }}</td>
                                <td class="text-center align-middle">{{ $data->pSum_level3 }}</td>
                                <td class="text-center align-middle">{{ $data->ranking }}</td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                    </div>
                </div>
              </div>
            </div>
        </div>

    </div>
    <!-- /.card -->
</div>


@endsection
