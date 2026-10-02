@extends('layouts.app')

@section('title', 'Dashboard Teknisi')

@section('content')
    @include('partials.dashboard', ['showIntake' => false])
@endsection
