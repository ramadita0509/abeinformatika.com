<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Models\Transaksi;
use App\Models\Teknisi;
use App\Models\Update;
use App\Exports\StatusExport;
use App\Imports\StatusesImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;
use PDF;

class TeknisiControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


         $teknisi = Teknisi::with(['status','update']);
         $teknisi = Teknisi::orderBy('created_at','desc')->paginate(5);


        return view('teknisi.index')->with('teknisi', $teknisi)->with('i', (request()->input('page', 1) -1) * 5);

    }

    public function index1()
    {

        return view('hometeknisi');

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $state = Status::all();
        return view('teknisi.create',compact('state'));

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

            'id_invoice' => 'required',
            'id_status' => 'required',
            'NamaTeknisi' => 'required',
        ]);

        Teknisi::create($request->all());

        return redirect()->route('teknisi.index')->with('succes','Data Berhasil di Input');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Teknisi $teknisi)
    {

        return view('teknisi.edit',compact('teknisi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teknisi $teknisi)
    {
        $request->validate([

            'NamaTeknisi' => 'required',
        ]);

        $teknisi->update($request->all());

        return redirect()->route('teknisi.index')->with('succes','Transaksi Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teknisi $teknisi)
    {
        $teknisi ->delete();
        return redirect()->route('teknisi.index')->with('succes','Transaksi Berhasil di Hapus');
    }
}
