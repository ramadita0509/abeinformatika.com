<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function lacak(Request $request)
    {
        $nomor = trim((string) $request->query('nomor', ''));

        return view('site.cek', [
            'nomor' => $nomor,
            'lacak' => $nomor !== '' ? $this->cariServis($nomor) : null,
        ]);
    }

    public function cekServis(Request $request)
    {
        $nomor = trim((string) $request->query('nomor', ''));

        return response()->json($this->cariServis($nomor));
    }

    public function profil()
    {
        return view('site/profil');
    }

    private function cariServis(string $nomor): array
    {
        if ($nomor === '' || strlen($nomor) < 3 || strlen($nomor) > 64) {
            return [
                'ok' => false,
                'message' => 'Masukkan serial number atau nomor RMA.',
            ];
        }

        $rows = Status::query()
            ->where(function ($query) use ($nomor) {
                $query->where('SerialNumber', $nomor)
                    ->orWhere('RMA', $nomor);
            })
            ->orderByDesc('id')
            ->limit(5)
            ->get([
                'Invoice',
                'RMA',
                'NamaBarang',
                'SerialNumber',
                'Kerusakan',
                'Sparepart',
                'Status',
                'NamaTeknisi',
                'Remark',
                'Ket',
                'TglMasuk',
                'TglKeluar',
                'updated_at',
            ]);

        return [
            'ok' => true,
            'nomor' => $nomor,
            'ditemukan' => $rows->isNotEmpty(),
            'items' => $rows->map(fn (Status $row) => [
                'invoice' => $row->Invoice,
                'rma' => $row->RMA,
                'barang' => $row->NamaBarang,
                'serial' => $row->SerialNumber,
                'kerusakan' => $row->Kerusakan,
                'sparepart' => $row->Sparepart,
                'status' => $row->Status,
                'teknisi' => $row->NamaTeknisi,
                'remark' => $row->Remark,
                'ket' => $row->Ket,
                'masuk' => $row->TglMasuk,
                'keluar' => $row->TglKeluar,
                'diperbarui' => optional($row->updated_at)->toIso8601String(),
            ])->values(),
        ];
    }
}