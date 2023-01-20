@extends('frontend.home')
@section('heading')
    Data User @foreach ($role as $d => $data) {{ $d }} @endforeach
@endsection
@section('page')
    <li class="breadcrumb-item active"><a href="{{ route('user.index') }}">User</a></li>
    @foreach ($role as $d => $data)
    <li class="breadcrumb-item active">{{ $d }}</li>
    @endforeach
@endsection
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <a href="{{ route('user.index') }}" class="btn btn-default btn-sm"><i class="nav-icon fas fa-arrow-left"></i> &nbsp; Kembali</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Username</th>
                    <th>Email</th>
                    @foreach ($role as $d => $data)
                        @if ($d == 'Mahasiswa')
                            <th>NIM</th>
                        @endif
                    @endforeach
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if ($user->count() > 0)
                    @foreach ($user as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td class="text-capitalize">{{ $data->name }}</td>
                            <td>{{ $data->email }}</td>
                            @if ($data->role == 'Mahasiswa')
                            <td>{{ $data->nim_mahasiswa }}</td>
                            @endif
                            <td>
                                <form action="#" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger btn-sm"><i class="nav-icon fas fa-trash-alt"></i> &nbsp; Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan='5' style='background:#fff;text-align:center;font-weight:bold;font-size:18px;'>Silahkan Buat Akun Terlebih Dahulu!</td>
                    </tr>
                @endif
            </tbody>
          </table>

        </div>

        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>

<!-- /.col -->
@endsection
