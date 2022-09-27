@extends('layouts.app')

@section('title', 'Status')

@section('content')


<div class="container-fluid">

    {{-- Alert Messages --}}
    @include('common.alert')

    <div class="container" id="app">

    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Data Servis</h2>
            </div>
            {{-- <div class="float-right">
                <a class="btn btn-success" href="{{ route('state.create') }}"> Create</a>
            </div> --}}
        </div>
    </div>

    @if ($message = Session::get('succes'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
     <form>
        <a href="{{ route('export-file', ['type'=>'xls']) }}" class="btn btn-sm btn-success">
            <i class="fas fa-check"></i> Export To Excel
        </a>
        @hasrole('admin')
        <a href="{{ route('state.import') }}" class="btn btn-sm btn-success">
            <i class="fas fa-check"></i> Upload Data Servis
        </a>
        @endhasrole
    </form>
<br>
<br>
<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <tr>
            <th width="20px" class="text-center">No</th>
            <th>No Servis</th>
            <th width="280px"class="text-center">Nama Barang</th>
            <th width="280px"class="text-center">Serial Number</th>
            <th width="280px"class="text-center">Nama Customer</th>
            <th width="280px"class="text-center">Status</th>
            <th width="280px"class="text-center">Nama Teknisi</th>
            <th width="280px"class="text-center">Remark Teknisi</th>
            @hasrole('user')
            <th width="280px"class="text-center">Tanggal Masuk</th>
            <th width="280px"class="text-center">Tanggal Keluar</th>
            @endhasrole
            @hasrole('admin')
            <th width="280px"class="text-center">Tanggal Masuk</th>
            <th width="280px"class="text-center">Tanggal Keluar</th>
            @endhasrole
            <th width="280px"class="text-center">Action</th>
        </tr>
        @foreach ($state as $i => $item)
        <tr>
            <td class="text-center">{{ ++$i }}</td>
            <td>{{ $item->Invoice }}</td>
            <td>{{ $item->NamaBarang }}</td>
            <td>{{ $item->SerialNumber }}</td>
            <td>{{ $item->NamaCustomer }}</td>
            <td>{{ $item->Status }}</td>
            <td>{{ $item->NamaTeknisi }}</td>
            <td>{{ $item->Remark }}</td>
            @hasrole('admin')
            <td>{{ $item->TglMasuk }}</td>
            <td>{{ $item->TglKeluar }}</td>
            @endhasrole
            @hasrole('user')
            <td>{{ $item->TglMasuk }}</td>
            <td>{{ $item->TglKeluar }}</td>
            @endhasrole
            <td class="text-center">

                @hasrole('teknisi')
                <form>

                    <a class="btn btn-danger btn-sm" href="{{ route('state.edit',$item->id) }}">Edit</a>
                    @csrf

                    </form>
                @endhasrole

                @hasrole('user')
                <form >
                    <a class="btn btn-primary btn-sm" href="{{ route('state.show',$item->id) }}">Show</a>

                    <a class="btn btn-danger btn-sm" href="{{ route('state.edit',$item->id) }}">Edit</a>

                    @csrf

                    </form>
                @endhasrole

                @hasrole('admin')
                <form action="{{ route('state.destroy',$item->id) }}" method="POST">

                   <a class="btn btn-info btn-sm" href="{{ route('state.show',$item->id) }}">Show</a>

                    <a class="btn btn-primary btn-sm" href="{{ route('state.edit',$item->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                </form>
                @endhasrole
            </td>
        </tr>
        @endforeach
    </table>
    </div>
</div>
</div>
    {{$state->links()}}

@endsection