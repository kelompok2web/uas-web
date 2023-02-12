@extends('frontend.home')
@section('heading')
    Data Penilaian 
@endsection
@section('page')
<li class="breadcrumb-item active">Tahap Dasar</li>
@endsection
@section('content')

    <div class="col-12">
        <div class="card">

            <div class="card-header">
                <h4 class="card-title ">
                   Tahap Analisa
                </h4>
            </div>

            <div class="card-body">
                <ol class="mt-2">
                    <li>IPK : Benefit</li>
                    <li>Penghasilan Orang Tua / bln : Cost</li>
                    <li>Jumlah Tanggungan : Benefit</li>
                    <li>Prestasi : Benefit</li>
                    <li>Kondisi Rumah : Cost</li>
                </ol>

                
            </div>
        </div>
    </div>

    <div class="mt-4 col-md-12">
        <div class="card">

            <div class="card-header">
                <h4 class="card-title ">
                    Tahap Dasar
                </h4>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="text-center align-middle">
                            <tr  >
                                <th class="text-center align-middle">NIM</th>
                                <th class="text-center align-middle">IPK</th>
                                <th class="text-center align-middle">Penghasilan Ortu/bln (Juta)</th>
                                <th class="text-center align-middle">Jumlah Tanggungan Orgtua</th>
                                <th class="text-center align-middle">Prestasi</th>
                                <th class="text-center align-middle">Kondisi Rumah</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($DATA as $item)
                                <tr class="text-center align-middle">
                                    <td class="text-center align-middle">{{ $item->nim_mahasiswa }}</td>
                                    <td class="text-center align-middle">{{ $item->p1 }}</td>
                                    <td class="text-center align-middle">{{ $item->p2 }}</td>
                                    <td class="text-center align-middle">{{ $item->p3 }}</td>
                                    <td class="text-center align-middle">{{ $item->p4 }}</td>
                                    <td class="text-center align-middle">{{ $item->p5 }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    
                    </table>
                </div>
                
            </div>
        </div>
    </div>


@endsection
