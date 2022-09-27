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
use DB;
use PDF;

class CustomerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('homeuser');
    }
}
