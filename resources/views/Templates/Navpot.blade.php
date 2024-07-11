<nav class="nav flex-column">
    <a class="nav-link active" href="#">Dashboard</a>
    <a class="nav-link" href="#inventorySubmenu" data-toggle="collapse" aria-expanded="false"
        class="dropdown-toggle">Inventory <i class="bi bi-arrow-down-square"></i> </a>
    <ul class="collapse list-unstyled" id="inventorySubmenu">
        <li class="nav-item">
            <a class="nav-link ml-2" href="{{ route('employe') }}">Barang masuk</a>
        </li>
        <li class="nav-item">
            <a class="nav-link ml-2" href="{{ route('employe') }}">Data Barang</a>
        </li>
    </ul>
    <a class="nav-link" href="#penjualanSubmenu" data-toggle="collapse" aria-expanded="false"
        class="dropdown-toggle">Penjualan <i class="bi bi-arrow-down-square"></i> </a>
    <ul class="collapse list-unstyled" id="penjualanSubmenu">
        <li class="nav-item">
            <a class="nav-link ml-2" href="{{ route('kasir') }}"> Kasir</a>
        </li>
        <li class="nav-item">
            <a class="nav-link ml-2" href="{{ route('kasir') }}"> Reture</a>
        </li>
    </ul>
    <a class="nav-link" href="#accountSubmenu" data-toggle="collapse" aria-expanded="false"
        class="dropdown-toggle">Account <i class="bi bi-arrow-down-square"></i></a>
    <ul class="collapse list-unstyled" id="accountSubmenu">
        <li class="nav-item">
            <a class="nav-link ml-2" href="#"> Profile</a>
        </li>
        <li class="nav-item">
            <a class="nav-link ml-2" href="{{ route('login') }}"> Sign out</a>
        </li>
    </ul>
</nav>
