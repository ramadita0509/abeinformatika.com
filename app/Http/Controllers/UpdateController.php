<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Models\Update;
use App\Models\Teknisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;
use PDF;

class UpdateControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $update= Update::orderBy('created_at','desc')->paginate(5);
   //     $update = Status::paginate(5)
     //   ->orderByDesc('created_at');

     //   $update = Status::all()->paginate(5);
      return view ('update.index',compact('update'))->with('i', (request()->input('page', 1) -1) * 5);
    }




}
