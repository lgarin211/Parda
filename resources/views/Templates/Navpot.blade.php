<nav class="nav flex-column">
    <a class="nav-link active" href="#">Dashboard</a>
    <a class="nav-link" href="#inventorySubmenu" data-toggle="collapse" aria-expanded="false"
        class="dropdown-toggle">Inventory <i class="bi bi-arrow-down-square"></i> </a>
    <ul class="collapse list-unstyled" id="inventorySubmenu">
        <li class="nav-item">
            <a class="nav-link ml-2" href="{{ route('BarangMasuk') }}"><i class="far fa-circle nav-icon"></i> Barang
                masuk</a>
        </li>
        <li class="nav-item">
            <a class="nav-link ml-2" href="{{ route('Barang') }}"><i class="far fa-circle nav-icon"></i> Data
                Barang</a>
        </li>
    </ul>
    <a class="nav-link" href="#penjualanSubmenu" data-toggle="collapse" aria-expanded="false"
        class="dropdown-toggle">Penjualan <i class="bi bi-arrow-down-square"></i> </a>
    <ul class="collapse list-unstyled" id="penjualanSubmenu">
        <li class="nav-item">
            <a class="nav-link ml-2" href="{{ route('kasir') }}?fil=1"><i class="far fa-circle nav-icon"></i> Kasir</a>
        </li>
        {{-- <li class="nav-item">
            <a class="nav-link ml-2" href="{{ route('kasir') }}"><i class="far fa-circle nav-icon"></i> Reture</a>
        </li> --}}
    </ul>

    <a class="nav-link" href="#accountSubmenu2" data-toggle="collapse" aria-expanded="false"
        class="dropdown-toggle">Access Controller <i class="bi bi-arrow-down-square"></i></a>
    <ul class="collapse list-unstyled" id="accountSubmenu2">
        <li class="nav-item">
            @dump(session('user'))
            @if (session('user')->role == 'Admin')
                <a class="nav-link ml-2" href="{{ route('OwenerAccess') }}"><i class="far fa-circle nav-icon"></i> Data
                    Owner</a>
                <a class="nav-link ml-2" href="{{ route('Laporan') }}"><i class="far fa-circle nav-icon"></i>
                    Laporan</a>
            @elseif (session('user')->role == 'owner')
                <a class="nav-link ml-2" href="{{ route('UserAccess') }}"><i class="far fa-circle nav-icon"></i> Data
                    Employer</a>
                <a class="nav-link ml-2" href="{{ route('Laporan') }}"><i class="far fa-circle nav-icon"></i>
                    Laporan</a>
            @endif
        </li>

    </ul>

    <a class="nav-link" href="#accountSubmenu" data-toggle="collapse" aria-expanded="false"
        class="dropdown-toggle">Account <i class="bi bi-arrow-down-square"></i></a>
    <ul class="collapse list-unstyled" id="accountSubmenu">
        <li class="nav-item">
            <a class="nav-link ml-2" href="#"><i class="far fa-circle nav-icon"></i> Profile</a>
        </li>
        <li class="nav-item">
            <a class="nav-link ml-2" href="{{ route('login') }}"><i class="far fa-circle nav-icon"></i> Sign out</a>
        </li>
    </ul>
</nav>
