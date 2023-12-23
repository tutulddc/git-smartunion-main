
@extends('layouts.admin')

@section('content')


    {{-- <h2>{{ session('name') }}</h2> --}}

    {{-- <h2>{{ Auth::user()->district_id }}</h2> --}}
    {{-- <h2>{{   Auth::user()->rel_to_dist->rel_to_division->name }}</h2><br> --}}
    {{-- <div class="col-lg-3">
        <h2>{{   Auth::user()->rel_to_div->name }} <br></h2><br>
        <h2>{{   Auth::user()->rel_to_dist->name }} <br></h2><br>
        <h2>{{   Auth::user()->rel_to_upazila->name }} <br></h2><br>
        <h2>{{   Auth::user()->rel_to_union->name }} <br></h2><br>
    </div> --}}
    {{-- <h2>{{ Auth::user()->district_id->rel_to_division->name }}</h2> --}}

    {{-- App\Models\OrderProduct::where('customer_id', Auth::guard('cutomer')->id())->where('product_id',$product_details->id)->whereNotNull('review')->first() == false) --}}



@endsection
