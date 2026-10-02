<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Models\Transaksi;
use App\Models\Teknisi;
use App\Models\Updates;
use App\Exports\StatusExport;
use App\Imports\StatusesImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use DB;
use PDF;

class StatusControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $bulan = $this->selectedMonth($request);
        $state = $this->serviceByMonth($bulan)->paginate(5)->withQueryString();

        return view('state.index', compact('state', 'bulan'))->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function index2(Request $request)
    {
        $bulan = $this->selectedMonth($request);
        $state = $this->serviceByMonth($bulan)->paginate(5)->withQueryString();

        return view('state.index2', compact('state', 'bulan'))->with('i', ($request->input('page', 1) - 1) * 5);
    }

    private function selectedMonth(Request $request): string
    {
        $bulan = (string) $request->query('bulan', now()->format('Y-m'));

        return preg_match('/^\d{4}-\d{2}$/', $bulan) ? $bulan : now()->format('Y-m');
    }

    private function serviceByMonth(string $bulan)
    {
        [$year, $month] = explode('-', $bulan);

        return Status::query()
            ->whereYear('TglMasuk', $year)
            ->whereMonth('TglMasuk', $month)
            ->orderByDesc('TglMasuk')
            ->orderByDesc('id');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $update = Updates::all();
        $nomorServis = str_pad((string) (((int) Status::query()->selectRaw('MAX(CAST(Invoice AS UNSIGNED)) as nomor')->value('nomor')) + 1), 7, '0', STR_PAD_LEFT);

        return view('state.create', compact('update', 'nomorServis'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

            'NamaBarang' => 'required',
            'SerialNumber' => 'required',
            'NamaCustomer' => 'required',
            'Alamat' => 'required',
            'Tlp' => 'required',
            'Kerusakan' => 'required',
            'Kelengkapan' => 'required',
            'Garansi' => 'required',
            'TglMasuk' => 'required',
        ]);

        DB::transaction(function () use ($request) {
            $request->merge(['Invoice' => Status::nextInvoice()]);
            Status::create($request->all());
        });

        return redirect()->route('state.index')->with('succes','Data Berhasil di Input');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Status $state)
    {
        return view('state.show',compact('state'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $state = Status::find($id);
        return view('state.edit', compact('state'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Status $state)
    {
        $request->validate([

            'NamaBarang',
            'SerialNumber',
            'NamaCustomer',
            'Alamat',
            'Tlp',
            'Kerusakan',
            'Kelengkapan',
        ]);

        $state->update($request->all());

        return redirect()->route('state.index')->with('succes','Status Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Status $state)
    {
        $state->delete();

      return redirect()->route('state.index')->with('succes','Status Berhasil di Hapus');
    }

    public function search(Request $request)
    {
        $bulan = $this->selectedMonth($request);
        $keyword = $request->search;
        $state = $this->serviceByMonth($bulan)
            ->where(function ($query) use ($keyword) {
                $query->where('SerialNumber', 'like', '%'.$keyword.'%')
                    ->orWhere('Invoice', 'like', '%'.$keyword.'%')
                    ->orWhere('RMA', 'like', '%'.$keyword.'%');
            })
            ->paginate(5)
            ->withQueryString();

        return view('state.index', compact('state', 'bulan'))->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function invoice(Status $state)
    {

     return view('state.invoice');
    }

    public function nota(Status $state)
    {

    return view('state.nota',compact('state'));
    }


    public function export(Request $request)
    {
        $bulan = $this->selectedMonth($request);

        return Excel::download(new StatusExport($bulan), 'data-servis-'.$bulan.'.xlsx');
    }

    /**
    * Import Status
    * @param Null
    * @return View File
    */
   public function importStatus()
   {
       return view('state.import');
   }

   public function uploadStatus(Request $request)
   {

        Excel::import(new StatusesImport,request()->file('file'));
        return redirect()->route('state.index')->with('success', 'Status Imported Successfully');

   }


}
