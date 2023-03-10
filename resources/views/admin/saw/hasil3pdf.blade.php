@extends('frontend.homepdf')
@section('heading')
    Data Penilaian 
@endsection
@section('page')
<li class="breadcrumb-item active">Tahap Perankingan</li>
@endsection
@section('content')

<div class="mt-4 col-md-12">
    <div class="card">
        <div class="card-body">
            <div class="row">
           <div class="col-12 mb-3">
            <div class="row">
                <div class="col-auto">
                    <img alt="" src="/assets/img/pnp.png" style="width:100px"/>
                </div>
                <div class="col text-center">
                    <br>
                    <h1>
                        Data Nama Mahasiswa Beasiswa 
                    </h1>
                    <h1>
                        Politeknik Negeri Padang 
                    </h1>
                </div>
            </div>
            
           </div>
           
           <div class="col-12">
            {{-- <h2>
                Tahap Perankingan
            </h2> --}}
           </div>
           <div class="col-12">
            <table class="table table-bordered" width="100%" cellspacing="0">
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

            
        </div>
    </div>
</div>

   


@endsection
