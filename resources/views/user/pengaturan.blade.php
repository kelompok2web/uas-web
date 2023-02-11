@extends('frontend.home')
@section('heading', 'Profile')
@section('page')
  <li class="breadcrumb-item active">User Profile</li>
@endsection
@section('content')
<div class="col-md-12">
    <div class="row">
        <div class="col-5">
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    
                    <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>
                    <p class="text-muted text-center">{{ Auth::user()->role }}</p>
                    @if (Auth::user()->role == 'Mahasiswa')
                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>NIM</b> <a class="float-right">{{ Auth::user()->nim_mahasiswa }}</a>
                            </li>
                        </ul>
                    @endif
                    @if (Auth::user()->role == 'Mahasiswa')
                        <a href="{{ route('pengaturan.profile') }}" class="btn btn-primary btn-block"><b>Edit Profile</b></a>
                    @else
                        <a href="{{ route('pengaturan.profile') }}" class="btn btn-primary btn-block"><b>Edit Profile</b></a>
                    @endif


                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">Pengaturan Akun</h3>
                </div>
                <div class="card-body">
                    <table class="table" style="margin-top: -21px;">
                    <tr>
                        <td width="50"><i class="nav-icon fas fa-envelope"></i></td>
                        <td>Ubah Email</td>
                        <td width="50"><a href="{{ route('pengaturan.edit-email')}}" class="btn btn-default btn-sm">Edit</a></td>
                    </tr>
                    <tr>
                        <td width="50"><i class="nav-icon fas fa-key"></i></td>
                        <td>Ubah Password</td>
                        <td width="50"><a href="{{ route('pengaturan.edit-password')}}" class="btn btn-default btn-sm">Edit</a></td>
                    </tr>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.col -->

        <div class="col-7">
            <!-- About Me Box -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">About Me</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <strong><i class="far fa-envelope mr-1"></i> Email</strong>
                    <p class="text-muted">{{ Auth::user()->email }}</p>
                    <hr>

                    @if (Auth::user()->role == 'Guru')
                        <strong><i class="fas fa-book mr-1"></i> Guru Mapel</strong>
                        <p class="text-muted">{{ Auth::user()->guru(Auth::user()->id_card)->mapel->nama_mapel }}</p>
                        <hr>
                        <strong><i class="far fa-file-alt mr-1"></i> Kode Jadwal</strong>
                        <p class="text-muted">{{ Auth::user()->guru(Auth::user()->id_card)->kode }}</p>
                        <hr>
                        <strong><i class="fas fa-id-badge mr-1"></i> Status</strong>
                        <p class="text-muted">{{ Auth::user()->guru(Auth::user()->id_card)->status }}</p>
                        <hr>
                    @elseif (Auth::user()->role == 'Siswa')
                        <strong><i class="fas fa-home mr-1"></i> Kelas</strong>
                        <p class="text-muted">{{ Auth::user()->siswa(Auth::user()->no_induk)->kelass->nama_kelas }}</p>
                        <hr>
                    @else
                    @endif

                    @if (Auth::user()->role == 'Guru')
                        <strong><i class="fas fa-map-marker-alt mr-1"></i> Tempat Lahir</strong>
                        <p class="text-muted">{{ Auth::user()->guru(Auth::user()->id_card)->tmp_lahir }}</p>
                        <hr>
                    @elseif (Auth::user()->role == 'Siswa')
                        <strong><i class="fas fa-map-marker-alt mr-1"></i> Tempat Lahir</strong>
                        <p class="text-muted">{{ Auth::user()->siswa(Auth::user()->no_induk)->tmp_lahir }}</p>
                        <hr>
                    @else
                    @endif

                    @if (Auth::user()->role == 'Guru')
                        <strong><i class="far fa-calendar mr-1"></i> Tanggal Lahir</strong>
                        <p class="text-muted">{{ date('l, d F Y', strtotime(Auth::user()->guru(Auth::user()->id_card)->tgl_lahir)) }}</p>
                        <hr>
                    @elseif (Auth::user()->role == 'Siswa')
                        <strong><i class="far fa-calendar mr-1"></i> Tanggal Lahir</strong>
                        <p class="text-muted">{{ date('l, d F Y', strtotime(Auth::user()->siswa(Auth::user()->no_induk)->tgl_lahir)) }}</p>
                        <hr>
                    @else
                    @endif

                    @if (Auth::user()->role == 'Guru')
                        <strong><i class="fas fa-phone mr-1"></i> No Telepon</strong>
                        <p class="text-muted">{{ Auth::user()->guru(Auth::user()->id_card)->telp }}</p>
                    @elseif (Auth::user()->role == 'Siswa')
                        <strong><i class="fas fa-phone mr-1"></i> No Telepon</strong>
                        <p class="text-muted">{{ Auth::user()->siswa(Auth::user()->no_induk)->telp }}</p>
                    @else
                    @endif



                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
</div>



@endsection
