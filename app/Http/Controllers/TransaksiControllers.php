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
use PDF;

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

    public function index2()
    {

        $trx = Transaksi::with(['status']);
        $trx = Transaksi::orderBy('created_at','desc')->paginate(5);

        return view('trx.index2')->with('trx', $trx)->with('i', (request()->input('page', 1) -1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $state = Status::all();
        return view('trx.create',compact('state'));


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

            'id_invoice' => 'required|max:50|unique:transaksis,id_invoice',
            'BiayaServis' => 'required',
            'BiayaPart' => 'required',
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
           $trx = Transaksi::where('id_invoice', 'like', "%" . $keyword . "%")->paginate(5);
        return view('trx.index',compact('trx'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function export()
    {
        return Excel::download(new TransaksisExport, 'transaksi.xlsx');
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

   public function orderReport()
    {
        $start = Carbon::now()->startOfMonth()->format('Y-m-d H:i:s');
        $end = Carbon::now()->endOfMonth()->format('Y-m-d H:i:s');

        if (request()->date != '') {
            $date = explode(' - ' ,request()->date);
            $start = Carbon::parse($date[0])->format('Y-m-d') . ' 00:00:01';
            $end = Carbon::parse($date[1])->format('Y-m-d') . ' 23:59:59';
        }

        $trx = Transaksi::with(['status'])->whereBetween('created_at', [$start, $end])->get();
        return view('report.order', compact('trx'));
    }


    public function orderReportPdf($daterange)
    {
        $date = explode('+', $daterange);
        $start = Carbon::parse($date[0])->format('Y-m-d') . ' 00:00:01';
        $end = Carbon::parse($date[1])->format('Y-m-d') . ' 23:59:59';

        $trx = Transaksi::with(['status'])->whereBetween('created_at', [$start, $end])->get();
        $pdf = PDF::loadView('report.order_pdf', compact('trx', 'date'));
        return $pdf->stream();
    }


}
