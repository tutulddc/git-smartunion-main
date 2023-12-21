
@extends('layouts.admin')

@section('content')
    {{-- <h2>{{ session('name') }}</h2> --}}
    <h2>{{ Auth::user()->department }}</h2>


@endsection
