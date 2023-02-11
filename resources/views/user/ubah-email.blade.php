@extends('frontend.home')
@section('heading', 'Ubah Email')
@section('page')
    <li class="breadcrumb-item active"><a href="{{ route('profile') }}">Pengaturan</a></li>
    <li class="breadcrumb-item active">Ubah Email</li>
@endsection
@section('content')
<div class="col-md-12">
    
    <div class="card ">
        <div class="card-header">
          <h3 class="card-title text-capitalize">Ubah Email {{ Auth::user()->name }}</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('pengaturan.ubah-email') }}" method="POST">
          @csrf
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                  <div class="form-group">
                      <label for="email-old">Email Lama</label>
                      <input id="email-old" type="email" class="form-control"  value="{{ Auth::user()->email }}" readonly>
                  </div> 
                  <div class="form-group">
                      <label for="email">Email Baru</label>
                      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" autocomplete="off" autofocus>
                  </div> 
                  
              </div>
            </div>
          </div>
          <!-- /.card-body -->
  
          <div class="card-footer">
            <a href="{{ route('profile') }}" class="btn btn-default"><i class='nav-icon fas fa-arrow-left'></i> &nbsp; Kembali</a> &nbsp;
            <button name="submit" class="btn btn-primary"><i class="nav-icon fas fa-save"></i> &nbsp; Update</button>
          </div>
        </form>
      </div>
        
</div>



@endsection
