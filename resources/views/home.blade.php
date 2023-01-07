@extends('frontend.home')
@section('heading', 'Dashboard')
@section('page')
    <li class="breadcrumb-item active">Admin</li>
    <li class="breadcrumb-item active">Dashboard</li>
@endsection
@section('content')
 <div class="row">


    <h1 class="h3 mb-4 text-gray-800">
        Selamat Datang {{ Auth::user()->name }}
    </h1>

</div>
@endsection
