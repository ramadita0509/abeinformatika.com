<div class="abe-page-head">
    <div>
        <p class="abe-kicker">Dashboard</p>
        <h1>{{ auth()->user()->first_name }}</h1>
        <p class="text-secondary mb-0">Pilih pekerjaan yang ingin dilanjutkan hari ini.</p>
    </div>
</div>

<div class="row g-3">
    @if ($showIntake ?? true)
        @hasanyrole('admin|user')
            <div class="col-md-6 col-xl-3">
                <a class="abe-shortcut" href="{{ route('state.create') }}">
                    <i class="bi bi-inbox"></i>
                    <strong>Penerimaan Servis</strong>
                    <span>Catat unit yang baru masuk.</span>
                </a>
            </div>
        @endhasanyrole
    @endif

    @hasrole('admin')
        <div class="col-md-6 col-xl-3">
            <a class="abe-shortcut" href="{{ url('trx') }}">
                <i class="bi bi-cash-coin"></i>
                <strong>Data Transaksi</strong>
                <span>Invoice dan pembayaran admin.</span>
            </a>
        </div>
    @endhasrole

    <div class="col-md-6 col-xl-3">
        <a class="abe-shortcut" href="{{ route('state.index') }}">
            <i class="bi bi-clipboard-data"></i>
            <strong>Data Servis</strong>
            <span>Status pengerjaan seluruh unit.</span>
        </a>
    </div>

    <div class="col-md-6 col-xl-3">
        <a class="abe-shortcut" href="{{ route('state.index2') }}">
            <i class="bi bi-receipt"></i>
            <strong>Laporan Servis</strong>
            <span>Rekap data servis yang sudah masuk.</span>
        </a>
    </div>
</div>
