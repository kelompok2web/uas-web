@extends('frontend.home')
@section('heading')
    Data Penilaian 
@endsection
@section('page')
<li class="breadcrumb-item active">Tahap Normalisasi</li>
@endsection
@section('content')
<div class="col-md-12">
    <div class="card">

        <div class="card-header">
            <h3 class="card-title ">
                Tahap Normalisasi
            </h3>
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
                                <td class="text-center align-middle">{{ $item->p1_level2 }}</td>
                                <td class="text-center align-middle">{{ $item->p2_level2 }}</td>
                                <td class="text-center align-middle">{{ $item->p3_level2 }}</td>
                                <td class="text-center align-middle">{{ $item->p4_level2 }}</td>
                                <td class="text-center align-middle">{{ $item->p5_level2 }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                
                </table>
            </div>
            
        </div>
    </div>
</div>
    {{-- <div class="mt-4 col-md-12">
        <div class="card">

            <div class="card-header">
                <h3 class="card-title ">
                    Tahap Perankingan
                </h3>
            </div>

            <div class="card-body">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="text-center align-middle">
                        <tr  >
                            <th>NIM</th>
                            <th>IPK</th>
                            <th>Penghasilan Ortu/bln (Juta)</th>
                            <th>Jumlah Tanggungan Orgtua</th>
                            <th>Prestasi</th>
                            <th>Kondisi Rumah</th>
                            <th>Total</th>
                            <th>Rangking</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($DATA as $item)
                            <tr class="text-center align-middle">
                                <td>{{ $item->nim_mahasiswa }}</td>
                                <td>{{ $item->p1_level3 }}</td>
                                <td>{{ $item->p2_level3 }}</td>
                                <td>{{ $item->p3_level3 }}</td>
                                <td>{{ $item->p4_level3 }}</td>
                                <td>{{ $item->p5_level3 }}</td>
                                <td>{{ $item->pSum_level3 }}</td>
                                <td>{{ $item->ranking }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                
                </table>

                
            </div>
        </div>
    </div> --}}


@endsection
