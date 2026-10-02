@if (! $lacak['ok'])
    <div class="lacak-empty">{{ $lacak['message'] }}</div>
@elseif (! $lacak['ditemukan'])
    <div class="lacak-empty">Nomor tidak ditemukan. Periksa kembali serial number atau nomor RMA.</div>
@else
    @foreach ($lacak['items'] as $item)
        @php
            $status = $item['status'] ?: 'Belum ada status';
            $badge = match ($item['status']) {
                'In Progress' => 'is-progress',
                'Finish' => 'is-finish',
                'Closed' => 'is-closed',
                default => '',
            };
        @endphp
        <article class="lacak-card">
            <div class="lacak-head">
                <div>
                    <h3>{{ $item['barang'] ?: 'Perangkat servis' }}</h3>
                    <span class="text-secondary">No. servis {{ $item['invoice'] ?: '-' }}</span>
                </div>
                <span class="lacak-badge {{ $badge }}">{{ $status }}</span>
            </div>
            <dl class="lacak-grid">
                <div><dt>Serial number</dt><dd>{{ $item['serial'] ?: '-' }}</dd></div>
                <div><dt>Nomor RMA</dt><dd>{{ $item['rma'] ?: '-' }}</dd></div>
                <div><dt>Kerusakan</dt><dd>{{ $item['kerusakan'] ?: '-' }}</dd></div>
                <div><dt>Sparepart</dt><dd>{{ $item['sparepart'] ?: '-' }}</dd></div>
                <div><dt>Keterangan</dt><dd>{{ $item['ket'] ?: '-' }}</dd></div>
                <div><dt>Catatan teknisi</dt><dd>{{ $item['remark'] ?: '-' }}</dd></div>
                <div><dt>Teknisi</dt><dd>{{ $item['teknisi'] ?: '-' }}</dd></div>
                <div><dt>Tanggal masuk</dt><dd>{{ $item['masuk'] ?: '-' }}</dd></div>
                <div><dt>Tanggal keluar</dt><dd>{{ $item['keluar'] ?: 'Belum diambil' }}</dd></div>
            </dl>
        </article>
    @endforeach
@endif
