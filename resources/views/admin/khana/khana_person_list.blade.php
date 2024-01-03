@extends('layouts.admin')
@section('content')


{{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap.min.css">
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap.min.js"></script> --}}
<div class="">
    <table id="khanapersonList" class="table table-striped table-bordered dataTables" style="width:100%">

        <tr>
            <th>#</th>
            <th>হোল্ডিং নং</th>
            <th>নাম</th>
            <th>পিতা/স্বামী</th>
            <th>ব্যক্তির ধরন</th>
            <th>ঠিকানা</th>
            <th>ছবি</th>
            <th>Action</th>
        </tr>
        @foreach ( $khana_per_infos as $key=>$khana_per_info )
        <tr>
            <td>{{ $khana_per_infos->firstitem()+$key }}</td>
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
                <a  title="খানা সদস্যের তথ্য হালনাগাদ" href="{{ route('khana.person.edit',$khana_per_info->khana_person_unique_id) }}" class="btn btn-info shadow btn-xs sharp"><i class="fa fa-pencil"></i></a>
                &nbsp;
            </td>
        </tr>

        @endforeach

    </table>
    {{ $khana_per_infos->links() }}
</div>

@endsection
@section('footer_script')
    <script>
        $(document).ready(function() {
            $('.dataTables').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
            });
        });
    </script>

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
