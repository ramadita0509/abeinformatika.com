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
    public function index()
    {

        $state = Status::with(['updates']);
        $state = Status::orderBy('created_at','desc')->paginate(5);

       return view('state.index')->with('state', $state)->with('i', (request()->input('page', 1) -1) * 5);
    }

    public function index2()
    {

        $state= Status::orderBy('created_at','desc')->paginate(5);
   //     $state = Status::paginate(5)
     //   ->orderByDesc('created_at');

     //   $state = Status::all()->paginate(5);
      return view ('state.index2',compact('state'))->with('i', (request()->input('page', 1) -1) * 5);
    }

    public function index3()
    {

        $state= Status::orderBy('created_at','desc')->paginate(5);
   //     $state = Status::paginate(5)
     //   ->orderByDesc('created_at');

     //   $state = Status::all()->paginate(5);
      return view ('state.index3',compact('state'))->with('i', (request()->input('page', 1) -1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $update = Updates::all();
        return view('state.create',compact('update'));
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

            'Invoice' => 'required|unique:statuses|max:50',
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

        Status::create($request->all());

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
        $update = Updates::all();
        return view('state.edit', compact('state','update'));
    }

    public function edit2(Status $state)
    {
        return view('state.edit2', compact('state'));
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

    public function update2(Request $request, Status $state)
    {
        $request->validate([

            'Status',

        ]);

        $state->update2($request->all());

        return redirect()->route('state.index3')->with('succes','Status Berhasil di Update');
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
        $keyword = $request->search;
           $state = Status::where('SerialNumber', 'like', "%" . $keyword . "%")->paginate(5);
        return view('state.index',compact('state'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function invoice(Status $state)
    {

     return view('state.invoice');
    }

    public function nota(Status $state)
    {

    return view('state.nota',compact('state'));
    }


    public function export()
    {

        return Excel::download(new StatusExport, 'status.xlsx');
    }
   // public function export()
  //  {
   //     return Excel::download(new StatusExport, 'status.xlsx');
  //  }

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
