@extends('frontend.home')
@section('heading', 'Trash Mahasiswa')
@section('page')
  <li class="breadcrumb-item active">Trash Mahasiswa</li>
@endsection
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
               
            </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Mahasiswa</th>
                    <th>Nim</th>
                    <th>Prodi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mhs as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->nama_mahasiswa }}</td>
                    <td>{{ $data->nim_mahasiswa }}</td>
                    <td>{{ $data->prodis->nama_prodi}}</td>
                    <td>
                        <form action="{{ route('mahasiswa.execute', $data->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <a href="{{ route('mahasiswa.restore', $data->id) }}" class="btn btn-success btn-sm"><i class="nav-icon fas fa-undo"></i></a>
                            <button class="btn btn-danger btn-sm"><i class="nav-icon fas fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>

        </div>

        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>

@endsection
