<x-layout>
    <x-slot name="title">Cek Status Servis</x-slot>

    <section class="page-hero">
        <div class="container">
            <p class="text-uppercase small fw-bold mb-2" style="letter-spacing:.14em;color:#fbbf24;">Cek servis</p>
            <h1>Pantau kondisi barang.</h1>
            <p class="mb-0 col-lg-8">Masukkan serial number atau nomor RMA. Status mengikuti data servis yang sedang dikerjakan teknisi.</p>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <form class="lacak-form" id="lacakForm" method="GET" action="{{ route('site.lacak') }}">
                        <label class="visually-hidden" for="nomor">Serial number atau nomor RMA</label>
                        <input id="nomor" name="nomor" type="text" value="{{ $nomor }}" maxlength="64" placeholder="Serial number atau nomor RMA" autocomplete="off" required>
                        <button type="submit" class="btn btn-dark rounded-pill px-4">Cek</button>
                    </form>
                    <p class="lacak-note" id="lacakNote" hidden>Memantau pembaruan dari data servis.</p>
                    <div id="lacakHasil">
                        @if ($lacak)
                            @include('site.lacak', ['lacak' => $lacak])
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        (function () {
            var form = document.getElementById('lacakForm');
            var hasil = document.getElementById('lacakHasil');
            var note = document.getElementById('lacakNote');
            var input = document.getElementById('nomor');
            if (!form || !hasil || !input) return;

            var timer = null;
            var endpoint = @json(route('site.cek'));

            function teks(nilai, kosong) {
                var isi = nilai == null ? '' : String(nilai).trim();
                if (isi === '') isi = kosong || '-';
                return isi.replace(/[&<>"']/g, function (huruf) {
                    return { '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;' }[huruf];
                });
            }

            function badge(status) {
                if (status === 'In Progress') return 'is-progress';
                if (status === 'Finish') return 'is-finish';
                if (status === 'Closed') return 'is-closed';
                return '';
            }

            function render(data) {
                if (!data.ok) {
                    hasil.innerHTML = '<div class="lacak-empty">' + teks(data.message, 'Masukkan serial number atau nomor RMA.') + '</div>';
                    note.hidden = true;
                    return;
                }
                if (!data.ditemukan) {
                    hasil.innerHTML = '<div class="lacak-empty">Nomor tidak ditemukan. Periksa kembali serial number atau nomor RMA.</div>';
                    note.hidden = true;
                    return;
                }
                hasil.innerHTML = data.items.map(function (item) {
                    return '<article class="lacak-card"><div class="lacak-head"><div><h3>' + teks(item.barang, 'Perangkat servis') + '</h3><span class="text-secondary">No. servis ' + teks(item.invoice) + '</span></div><span class="lacak-badge ' + badge(item.status) + '">' + teks(item.status, 'Belum ada status') + '</span></div><dl class="lacak-grid"><div><dt>Serial number</dt><dd>' + teks(item.serial) + '</dd></div><div><dt>Nomor RMA</dt><dd>' + teks(item.rma) + '</dd></div><div><dt>Kerusakan</dt><dd>' + teks(item.kerusakan) + '</dd></div><div><dt>Sparepart</dt><dd>' + teks(item.sparepart) + '</dd></div><div><dt>Keterangan</dt><dd>' + teks(item.ket) + '</dd></div><div><dt>Catatan teknisi</dt><dd>' + teks(item.remark) + '</dd></div><div><dt>Teknisi</dt><dd>' + teks(item.teknisi) + '</dd></div><div><dt>Tanggal masuk</dt><dd>' + teks(item.masuk) + '</dd></div><div><dt>Tanggal keluar</dt><dd>' + teks(item.keluar, 'Belum diambil') + '</dd></div></dl></article>';
                }).join('');
                note.hidden = false;
            }

            function cari(nomor) {
                return fetch(endpoint + '?nomor=' + encodeURIComponent(nomor), {
                    headers: { 'Accept': 'application/json' }
                }).then(function (res) { return res.json(); });
            }

            function pantau(nomor) {
                if (timer) clearInterval(timer);
                timer = setInterval(function () {
                    cari(nomor).then(render).catch(function () {});
                }, 8000);
            }

            form.addEventListener('submit', function (event) {
                event.preventDefault();
                var nomor = input.value.trim();
                if (nomor.length < 3) return;
                var url = new URL(window.location.href);
                url.searchParams.set('nomor', nomor);
                url.hash = '';
                history.replaceState({}, '', url);
                cari(nomor).then(function (data) {
                    render(data);
                    if (data.ok && data.ditemukan) pantau(nomor);
                }).catch(function () {
                    form.submit();
                });
            });

            if (input.value.trim().length >= 3 && hasil.querySelector('.lacak-card')) {
                note.hidden = false;
                pantau(input.value.trim());
            }
        })();
    </script>
</x-layout>
