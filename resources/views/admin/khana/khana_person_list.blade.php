@extends('layouts.admin')
@section('content')

    <table id="khanapersonList" class="table table-striped table-bordered dataTables" style="width:100%">
        <tr><td class="text-center" colspan="12">ই-খানা তথ্য - হোল্ডিং (ওয়াড নং -১)</td></tr>
        <tr>
            <td>sl</td>
            <td>হোল্ডিং নং</td>
            <td>নাম</td>
            <td>পিতা/স্বামী</td>
            <td>ব্যক্তির ধরন</td>
            <td>ঠিকানা</td>
            <td>ছবি</td>
            <td>Action</td>
        </tr>
        @foreach ( $khana_per_infos as $key=>$khana_per_info )
        <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $khana_per_info->holding_number }}</td>
            <td>{{ $khana_per_info->khana_person_name}}</td>
            <td>{{ $khana_per_info->father_name }}</td>
            <td>
                @if ($khana_per_info->khana_person_type == 2)
                    <span class="text-danger">খানা প্রধান</span>
                @else
                    <span class="text-success">খানা সদস্য</span>
                @endif
            </td>
            <td>{{ $khana_per_info->pres_address }}</td>
            <td>
                @if ($khana_per_info->khana_person_img == null)
                <img width="50" src="{{ Avatar::create($khana_per_info->khana_person_name)->toBase64() }}" />
                @else
                    <img width="70" src="{{asset('uploads/khana/persons')}}/{{ $khana_per_info->khana_person_img }}" alt="">
                @endif


            </td>
            <td>
                <button data-link="" class="btn btn-danger shadow btn-xs sharp del_btn"><i class="fa fa-trash"></i></button>
                &nbsp; &nbsp;
                <a  title="খানা সদস্যের তথ্য হালনাগাদ" href="{{ route('khana.person.edit',$khana_per_info->id) }}" class="btn btn-info shadow btn-xs sharp"><i class="fa fa-pencil"></i></a>
                &nbsp;
            </td>
        </tr>
            {{-- <h1>{{ $khana_per_info->khana_person_name}}</h1> --}}
        @endforeach
    </table>


{{-- <script>
        $(document).ready(function() {
            $('#tbl-person-list').DataTable();
        });
</script> --}}

@endsection
{{-- @section('footer_script')
    <script>
        $(document).ready(function() {
            $('#khanapersonList').DataTable({
                "paging": true
            });
        });
    </script>
@endsection --}}
