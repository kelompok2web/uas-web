@extends('frontend.home')
@section('heading', 'Dashboard')
@section('page')
  <li class="breadcrumb-item active">Dashboard</li>
@endsection
@section('content')

<div class="row">

    <!-- Jadwal -->
    <div class="col-lg-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            <h3></h3>Kriteria
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>

                </div>
                <a href=#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>

    <!-- Mapel -->
    <div class="col-lg-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            <h3></h3>Sub Kriteria
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-book fa-2x text-gray-300"></i>
                    </div>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>

    <!-- Kelas -->
    <div class="col-lg-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            <h3>{{$jurusan}}</h3>Jurusan
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            <h3>{{$prodi}}</h3>Prodi
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Data Mahasiswa</h6>
                <span class="text-primary">
                    <i class="fas fa-arrow-up"></i> {{ $mhs }}
                </span>

            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="col-md-10">
                    <div class="chart-responsive">
                        <canvas id="pieChartMhs" height="100"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                        <span class="mr-2">
                            <i class="fas fa-circle text-primary"></i> Laki-Laki
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-danger"></i> Perempuan
                        </span>
    
                    </div>
                </div>
                
            </div>
        </div>
    </div>

</div>

@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
            'use strict'


            var pieChartCanvasMhs = $('#pieChartMhs').get(0).getContext('2d')
            var pieDataMhs        = {
                labels: [
                    'Laki-laki',
                    'Perempuan',
                ],
                datasets: [
                    {
                    data: [{{ $mhslk }}, {{ $mhspr }}],
                    backgroundColor : ['#007BFF', '#DC3545'],
                    }
                ]
            }
            var pieOptions     = {
                legend: {
                    display: false
                }
            }
            var pieChart = new Chart(pieChartCanvasMhs, {
                type: 'doughnut',
                data: pieDataMhs,
                options: pieOptions
            })


        })

    </script>
@endsection

