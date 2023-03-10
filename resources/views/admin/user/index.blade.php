@extends('frontend.home')
@section('heading', 'Data User')
@section('page')
  <li class="breadcrumb-item active">Data User</li>
@endsection
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target=".tambah-user">
                    <i class="nav-icon fas fa-folder-plus"></i> &nbsp; Tambah Data User
                </button>
            </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Lever User</th>
                        <th>Jumlah User</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $role=> $data)
                    <tr>
                        <td>{{ $role}}</td>
                        <td>{{ $data->count() }}</td>
                        <td>
                            <a href="{{ route('user.show', $role) }}" class="btn btn-info btn-sm"><i class="nav-icon fas fa-search-plus"></i> &nbsp; Details</a>
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

<!-- /.col -->

<!-- Extra large modal -->
<div class="modal fade bd-example-modal-lg tambah-user" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title">Tambah Data User</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form action="{{ route('user.store') }}" method="POST" >
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="email">Alamat Email</label>
                        <input id="email" type="email" placeholder="{{ __('E-Mail Address') }}" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" required>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="role">Level User</label>
                        <select id="role" type="text" class="form-control @error('role') is-invalid @enderror select2bs4" name="role" value="{{ old('role') }}" autocomplete="role" required>
                          <option value="">-- Select {{ __('Level User') }} --</option>
                          <option value="Admin">Admin</option>
                          <option value="Mahasiswa">Mahasiswa</option>
                        </select>
                        @error('role')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                    </div>
                    <div class="form-group" id="noId"></div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input id="password" type="password" placeholder="{{ __('Password') }}" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password" required>
                        @error('password')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password-confirm">Confirm Password</label>
                        <input id="password-confirm" type="password" placeholder="{{ __('Confirm Password') }}" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" autocomplete="new-password" required>
                        @error('password')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class='nav-icon fas fa-arrow-left'></i> &nbsp; Kembali</button>
                <button type="submit" class="btn btn-primary"><i class="nav-icon fas fa-save"></i> &nbsp; Tambah</button>
            </div>
        </form>
    </div>
    </div>
  </div>
</div>
@endsection

@section('script')
  <script>
    $(document).ready(function(){
        $('#role').change(function(){
            var kel = $('#role option:selected').val();
            if (kel == "Mahasiswa") {
              $("#noId").html('<label for="nim_mhs">NIM Mahasiswa</label><input id="nim_mhs" type="number" placeholder="NIM Mahasiswa" class="form-control" name="nim_mhs" autocomplete="off">');
            } else {
              $("#noId").html("")
            }
        });
    });

  </script>
@endsection
