<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Status;
use App\Models\Teknisi;
use App\Exports\TransaksisExport;
use App\Imports\TransaksiImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use DB;
use Barryvdh\DomPDF\Facade\Pdf;

class TransaksiControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


    //   $trx = DB::table('transaksis')
     //  ->join('statuses', 'statuses.id', '=', 'transaksis.id_transaksi')
     //  ->get();

     $trx = Transaksi::with(['status']);
     $trx = Transaksi::orderBy('created_at','desc')->paginate(5);

       return view('trx.index')->with('trx', $trx)->with('i', (request()->input('page', 1) -1) * 5);

          // $trx = Transaksi::latest()->paginate(5);
          // return view ('trx.index',compact('trx'))->with('i', (request()->input('page', 1) -1) * 5);
    }

    public function index2(Request $request)
    {
        $bulan = $this->selectedMonth($request);
        [$year, $month] = explode('-', $bulan);
        $trx = Transaksi::with(['status'])
            ->whereYear('created_at', $year)
            ->whereMonth('created_at', $month)
            ->orderByDesc('created_at')
            ->paginate(5)
            ->withQueryString();

        return view('trx.index2', compact('trx', 'bulan'))->with('i', ($request->input('page', 1) - 1) * 5);
    }

    private function selectedMonth(Request $request): string
    {
        $bulan = (string) $request->query('bulan', now()->format('Y-m'));

        return preg_match('/^\d{4}-\d{2}$/', $bulan) ? $bulan : now()->format('Y-m');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

       // $state = Status::all();
      //  return view('trx.create',compact('state'));

        $state = Status::all();

        return view('trx.create', compact('state'));

      //  return view('trx.create');
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

            'id_invoice' => 'required|max:50|unique:transaksis,id_invoice|exists:statuses,id',
            'BiayaServis' => 'required',
            'BiayaPart' => 'required',
        ]);

        $request->merge([
            'Invoice' => Transaksi::invoiceFor(Status::findOrFail($request->id_invoice)),
        ]);

        Transaksi::create($request->all());

        return redirect()->route('trx.index')->with('succes','Data Berhasil di Input');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $trx = Transaksi::find($id);
        $state = Status::all();
        return view('trx.show', compact('trx','state'))->with('i', (request()->input('page', 1) -1) * 5);


      //  $trx = Transaksi::with(['status']);
       //  $trx = Transaksi::orderBy('created_at','desc')->paginate(5);
       // return view('trx.show')->with('trx', $trx);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $trx)
    {

        return view('trx.edit',compact('trx'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $trx)
    {
        $request->validate([

            'BiayaServis' => 'required',
            'BiayaPart' => 'required',
        ]);

        $trx->update($request->all());

        return redirect()->route('trx.index')->with('succes','Transaksi Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $trx)
    {

        $trx ->delete();
       return redirect()->route('trx.index')->with('succes','Transaksi Berhasil di Hapus');

    }


    public function search(Request $request)
    {
        $keyword = $request->search;
        $trx = Transaksi::with(['status']);
        $trx = Transaksi::where('id_invoice', 'like', "%" . $keyword . "%")->paginate(5);
        return view('trx.index',compact('trx'))->with('i', (request()->input('page', 1) - 1) * 5);
      //  $keyword = $request->search;
        //   $trx = Transaksi::where('id_invoice', 'like', "%" . $keyword . "%")->paginate(5);
       // return view('trx.index',compact('trx'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function export(Request $request)
    {
        $bulan = $this->selectedMonth($request);

        return Excel::download(new TransaksisExport($bulan), 'transaksi-'.$bulan.'.xlsx');
    }

     /**
    * Import Status
    * @param Null
    * @return View File
    */
   public function importTransaksi()
   {
       return view('trx.import');
   }

   public function uploadTransaksi(Request $request)
   {

        Excel::import(new TransaksiImport,request()->file('file'));
        return redirect()->route('trx.index')->with('success', 'Status Imported Successfully');

   }

   public function orderReport(Request $request)
    {
        $bulan = $this->selectedMonth($request);

        return view('report.order', [
            'rows' => $this->laporanBulan($bulan),
            'bulan' => $bulan,
        ]);
    }


    public function orderReportPdf(string $bulan)
    {
        if (! preg_match('/^\d{4}-\d{2}$/', $bulan)) {
            abort(404);
        }

        $rows = $this->laporanBulan($bulan);
        $pdf = Pdf::loadView('report.order_pdf', compact('rows', 'bulan'));

        return $pdf->stream();
    }

    private function laporanBulan(string $bulan)
    {
        [$year, $month] = explode('-', $bulan);

        return Status::with('transaksi')
            ->whereYear('TglMasuk', $year)
            ->whereMonth('TglMasuk', $month)
            ->orderByDesc('TglMasuk')
            ->orderByDesc('id')
            ->get();
    }


}
