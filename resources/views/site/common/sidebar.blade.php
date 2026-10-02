<aside class="abe-sidebar noPrint" id="sidebar">
    <a class="abe-brand" href="{{ route('home') }}">
        <span class="abe-brand-mark">ABE</span>
        <span>ABE Informatika<small>Panel internal</small></span>
    </a>

    <nav>
        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
            <i class="bi bi-house"></i> Dashboard
        </a>

        @hasrole('admin')
            <div class="abe-nav-label">Management</div>
            <a class="nav-link {{ request()->routeIs('profile.*') ? 'active' : '' }}" href="{{ route('profile.detail') }}">
                <i class="bi bi-person"></i> User Management
            </a>
        @endhasrole

        <div class="abe-nav-label">Servis</div>
        <a class="nav-link {{ request()->routeIs('state.index') ? 'active' : '' }}" href="{{ route('state.index') }}">
            <i class="bi bi-pc-display"></i> Data Service
        </a>

        @hasanyrole('admin|user')
            <a class="nav-link" data-bs-toggle="collapse" href="#menuTransaksi" role="button" aria-expanded="false" aria-controls="menuTransaksi">
                <i class="bi bi-receipt"></i> Transaksi Service
            </a>
            <div class="collapse abe-sub" id="menuTransaksi">
                <a href="{{ route('state.create') }}">Penerimaan Barang</a>
                <a href="{{ route('trx.index') }}">Create Invoice</a>
            </div>
        @endhasanyrole

        <a class="nav-link {{ request()->routeIs('state.index2') ? 'active' : '' }}" href="{{ route('state.index2') }}">
            <i class="bi bi-cloud-upload"></i> Laporan Data Servis
        </a>

        @hasrole('admin')
            <div class="abe-nav-label">Admin</div>
            <a class="nav-link" data-bs-toggle="collapse" href="#menuLaporan" role="button" aria-expanded="false" aria-controls="menuLaporan">
                <i class="bi bi-folder"></i> Laporan
            </a>
            <div class="collapse abe-sub" id="menuLaporan">
                {{-- <a href="{{ route('trx.index2') }}">Laporan Transaksi Servis</a> --}}
                <a href="{{ route('report.order') }}">Laporan Periode</a>
            </div>
        @endhasrole

        <a class="nav-link mt-3" href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">
            <i class="bi bi-box-arrow-right"></i> Logout
        </a>
    </nav>
</aside>
