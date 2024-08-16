<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon">
            {{-- <i class="fas fa-hospital"></i> --}}
            <img src="{{ asset('img/logo.png') }}" style=”float:left;
                    width="55";height="55"” />
        </div>
        <div class="sidebar-brand-text mx-3">KLINIK INTI SEHAT TCM </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="/dashboard">
            <i class="fas fa-fw fa-cog"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Umum
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link" href="/antrian-pasien-admin">
            <i class="fas fa-fw fa-pen">

            </i>
            <span>Antrian Pasien</span>
        </a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="/laporan-harian">
            <i class="collapse-item fas fa-folder-open">

            </i>
            <span>Laporan Pendaftaran</span>
        </a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link" href="{{ url('pasien') }}">
            <i class="fa fa-users"></i>
            <span>Data Pendaftaran</span></a>

    <li class="nav-item">
        <a class="nav-link" href="{{ url('dokter') }}">
            <i class="fa fa-user-md"></i>
            <span> Data Ahli</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('keuangan.index') }}">
            <i class="fa fa-id-card"></i>
            <span> Data Keuangan</span></a>
    </li>

    @if(auth()->check() && auth()->user()->is_superadmin === 1)
        <li class="nav-item">
            <a class="nav-link" href="/akun">
                <i class="fas fa-fw fa-user"></i>
                <span>Akun</span></a>
        </li>
    @endif

    {{-- <li class="nav-item">
        <form action="/logout" method="POST">
            @csrf
            <button class="btn btn-danger m-3"  onClick="return confirm('Yakin ingin hapus data?')">Logout</button>
        </form>
    </li> --}}

    <li class="nav-item">
        <div class="sidebar-card d-none d-lg-flex">
            <img class="sidebar-card-illustration mb-2" src="img/logo.png" alt="...">
            <p class="text-center mb-2"><strong></strong>Klinik INTI SEHAT TCM</p>
            <a class="btn btn-success btn-sm" href="/">Ke Beranda</a>
        </div>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>


    </li>

    <div class="sidebar-heading">
        Powered by &copy; {{ date('Y') }} | Rumah Sehat Herbal Inti Sehat TCM.
    </div>

</ul>
