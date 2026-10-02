<header class="abe-topbar noPrint">
    <button class="btn btn-outline-secondary d-lg-none" type="button" id="sidebarToggle" aria-label="Buka menu">
        <i class="bi bi-list"></i>
    </button>
    <form method="GET" action="{{ (request()->is('trx') || request()->is('trx/*')) ? url('trx.search') : url('search') }}">
        <div class="input-group">
            <input type="search" class="form-control" name="search" placeholder="Cari data servis atau transaksi" aria-label="Cari" pattern=".*\S.*" required>
            <button class="btn btn-dark" type="submit"><i class="bi bi-search"></i></button>
        </div>
    </form>
    <div class="dropdown ms-auto">
        <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-person-circle me-1"></i>{{ auth()->user()?->first_name ?? 'Akun' }}
        </button>
        <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="{{ route('profile.detail') }}"><i class="bi bi-person me-2"></i>Profil</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#logoutModal"><i class="bi bi-box-arrow-right me-2"></i>Logout</a></li>
        </ul>
    </div>
</header>
