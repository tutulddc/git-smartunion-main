@extends("layouts.admin")

@section("content")
<div class="col-lg-12 m-auto">
    <div class="card">
        <div class="card-header">
            <h3>খানা প্রধানের তথ্য সমূহ </h3>
        </div>
        <div class="card-body">
            {{-- <table class="table table-bordered"> --}}
            <table id="dataTables" class="table table-striped table-bordered dataTables" style="width:100%">
                <tr>
                    <th>হোল্ডিং নং</th>
                    <th>খানা আইডি</th>
                    <th>নাম</th>
                    <th>পিতা/স্বামী</th>
                    <th>ঠিকানা</th>
                    <th>মোবাইল নং</th>
                </tr>
                <tr>
                    <td>{{ $khana_info->ward_number }}</td>
                    <td>{{ $khana_info->khana_id }}</td>
                    <td>{{ $khana_info->khana_person_name }}</td>
                    <td>{{ $khana_info->father_name }}</td>
                    <td>{{ $khana_info->pres_address }}</td>
                    <td>{{ $khana_info->phone }}</td>
                </tr>
            </table>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h4>কর বকেয়া তথ্য সমূহ</h4>
        </div>
        <div class="card-body">
            
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h4>কর আদায়</h4>
        </div>
        <div class="card-body">
                
        </div>
    </div>
</div>

@endsection
