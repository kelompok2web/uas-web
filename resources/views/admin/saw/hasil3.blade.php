@extends('frontend.home')
@section('heading')
    Data Penilaian 
@endsection
@section('page')
<li class="breadcrumb-item active">Tahap Perankingan</li>
@endsection
@section('content')

<div class="mt-4 col-md-12">
    <div class="card">

        <div class="card-header">
            <h3 class="card-title ">
                Tahap Perankingan
                <a type="button" href="{{ route('atr-saw.sample3PDFC') }}" target="_blank" class="btn btn-primary btn-sm">
                    <i class="nav-icon fas fa-folder-plus"></i> &nbsp; Cetak
                </a>
            </h3>
        </div>


        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                    <thead class="text-center align-middle">
                        <tr  >
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
                        @foreach ($DATA as $item)
                            <tr class="text-center align-middle">
                                <td class="text-center align-middle">{{ $item->nim_mahasiswa }}</td>
                                <td class="text-center align-middle">{{ $item->p1_level3 }}</td>
                                <td class="text-center align-middle">{{ $item->p2_level3 }}</td>
                                <td class="text-center align-middle">{{ $item->p3_level3 }}</td>
                                <td class="text-center align-middle">{{ $item->p4_level3 }}</td>
                                <td class="text-center align-middle">{{ $item->p5_level3 }}</td>
                                <td class="text-center align-middle">{{ $item->pSum_level3 }}</td>
                                <td class="text-center align-middle">{{ $item->ranking }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                
                </table>
            </div>
            
        </div>
    </div>
</div>




@endsection
@section('script')
    <script type="text/javascript">
       $(document).ready(function() {
            $('#dataTable2').DataTable( {
                "order": [[ 6, "desc" ]]
            } );
        } );
    </script>
@endsection

