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
                        &nbsp; Kembali</a>
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

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Mahasiswa</th>
                            <th>Kriteria</th>
                            <th>Values</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($atribut as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->mahasiswa->name }}</td>
                                {{-- <td>{{ $item->nama_crips }}</td> --}}
                                {{-- <td>{{ $item->nama_crips }}</td> --}}
                                <td>
                                    <form action="{{ route('crips.destroy', $item->id) }}"method="Post">
                                        @csrf
                                        @method('delete')
                                        <a href="" class="btn btn-info btn-sm mt-2"><i
                                                class="nav-icon fas fa-id-card"></i></a>
                                        <a href="{{ route('crips.edit', $item->id) }}"class="btn btn-success btn-sm mt-2"><i
                                                class="nav-icon fas fa-edit"></i></a>
                                        <button class="btn btn-danger btn-sm mt-2"
                                            onclick="return confirm('Apakah yakin menghapus data ini?');"><i
                                                class="nav-icon fas fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
