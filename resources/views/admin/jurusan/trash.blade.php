@extends('frontend.home')
@section('heading', 'Trash Jurusan')
@section('page')
  <li class="breadcrumb-item active">Trash Jurusan</li>
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
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Jurusan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jrs as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->nama_jurusan }}</td>
                            <td>
                                <form action="{{ route('jurusan.execute', $data->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <a href="{{ route('jurusan.restore', $data->id) }}" class="btn btn-success btn-sm"><i class="nav-icon fas fa-undo"></i></a>
                                    <button class="btn btn-danger btn-sm"><i class="nav-icon fas fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>

@endsection
