<!-- Sidebar -->

<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon ">
            <i class="fas fa-school"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SPK BEASISWA</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Pages Collapse Menu -->
    @if (Auth::user()->role == 'Admin')
        <li class="nav-item">
            <a class="nav-link" href="{{route('home')}}">
                <i class="fas fa-fw fa-cog"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Perhitungan SAW
        </div>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-wrench"></i>
                <span>Perhitungan</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingUtilities"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Hasil Perhitungan</h6>
                    <a class="collapse-item" href="#">Perhitungan Metode SAW</a>
                    <a class="collapse-item" href="#">Hasil SAW</a>
                </div>
            </div>
        </li>

        <hr class="sidebar-divider">

        <div class="sidebar-heading">
            Data
        </div>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-wrench"></i>
                <span>Data Master</span>
            </a>
            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Edit Data Master</h6>
                    <a class="collapse-item" href="{{route('jurusan.index')}}">Data Jurusan</a>
                    <a class="collapse-item" href="{{route('prodi.index')}}">Data Prodi</a>
                    <a class="collapse-item" href="{{route('mahasiswa.index')}}">Data Mahasiswa</a>
                    <a class="collapse-item" href="{{route('user.index')}}">Data User</a>
                </div>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-fw fa-folder"></i>
                <span>View Trash</span>
            </a>
            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Custom View Trash:</h6>
                    <a class="collapse-item" href="#">Trash Jurusan</a>
                    <a class="collapse-item" href="#">Trash Prodi</a>
                    <a class="collapse-item" href="{{ route('mahasiswa.trash') }}">Trash Mahasiswa</a>
                </div>
            </div>
        </li>
    
    @elseif (Auth::user()->role == 'Mahasiswa' && Auth::user()->mahasiswa(Auth::user()->nim_mahasiswa))

        <li class="nav-item">
            <a class="nav-link" href="{{route('home')}}">
                <i class="fas fa-fw fa-cog"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <hr class="sidebar-divider">
        <div class="sidebar-heading">
            Perhitungan SAW
        </div>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-wrench"></i>
                <span>Perhitungan</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingUtilities"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Hasil Perhitungan</h6>
                    <a class="collapse-item" href="#">Perhitungan Metode SAW</a>
                    <a class="collapse-item" href="#">Hasil SAW</a>
                </div>
            </div>
        </li>
    @else
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/home') }}">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Dashboard</span></a>
        </li>

    @endif
        
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>
<!-- End of Sidebar -->
