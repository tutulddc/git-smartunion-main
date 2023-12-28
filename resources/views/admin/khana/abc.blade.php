@extends('layouts.admin')
@section('content')

<table id="khanaProdhanList" class="table table-striped table-bordered" style="width:100%">
    <tr><td class="text-center" colspan="12">ই-খানা তথ্য - হোল্ডিং (ওয়াড নং -১)</td></tr>
    <tr>
        <td>sl</td>
        <td>হোল্ডিং নং</td>
        <td>নাম</td>
        <td>পিতা/স্বামী</td>
        <td>ঠিকানা</td>
        <td>ছবি</td>
        <td>Action</td>
    </tr>
    @foreach ( $khana_per_infos as $khana_per_info )
    <tr>
        <td>sl</td>
        <td>হোল্ডিং নং</td>
        <td>{{ $khana_per_info->khana_person_name}}</td>
        <td>পিতা/স্বামী</td>
        <td>ঠিকানা</td>
        <td>ছবি</td>
        <td>Action</td>
    </tr>
        {{-- <h1>{{ $khana_per_info->khana_person_name}}</h1> --}}
    @endforeach
</table>

@endsection
