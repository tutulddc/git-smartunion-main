@extends('layouts.admin')

@section('content')
    <div class="col-lg-12 col-sm-12 m-auto">
        <div class="card-header">
            <h4>খানার কর আদায়</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('search.khana') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row ">
                    <div class="col-sm-4 m-auto">
                        <div class="mb-3">
                            <label for="ward_id">আপনার ওয়ার্ড নাম্বার লিখুন</label>
                            <select name="ward_id"  class="form-control">
                                <option value="">ওয়ার্ড সিলেক্ট করুন</option>
                                <option value="1">ওয়ার্ড নং ১</option>
                                <option value="2">ওয়ার্ড নং ২</option>
                                <option value="3">ওয়ার্ড নং ৩</option>
                                <option value="4">ওয়ার্ড নং ৪</option>
                                <option value="5">ওয়ার্ড নং ৫</option>
                                <option value="6">ওয়ার্ড নং ৬</option>
                                <option value="7">ওয়ার্ড নং ৭</option>
                                <option value="8">ওয়ার্ড নং ৮</option>
                                <option value="9">ওয়ার্ড নং ৯</option>
                            </select>
                            @error('ward_id')
                                <li class="text-danger small">{{ $message; }}</li>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="khana_id">আপনার খানা আইডি লিখুন</label>
                            <input type="number" name="khana_id" value="{{ old('khana_id') }}" class="form-control">
                            @error('khana_id')
                                <li class="text-danger small">{{ $message; }}</li>
                            @enderror
                        </div>
                        @if(Session('not_exists'))
                        <p class="alert alert-danger">{{ Session('not_exists') }}</p>
                        @endif
                        <div class="mb-3">
                            <button type="submit"  class="btn btn-primary">খুজুন</button>
                        </div>
                    </div>
                </div>
                
            </form>
        </div>

    </div>

@endsection
@section('footer_script')
<script>

    $('#khana_person_type').change(function(){
        // alert();


        if ($(this).val()=== '2') {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
            type: 'GET',
            url:'/getPersonid',
                success: function(data){
                    $('#khana_relation').html(data);
                }
            });

        }
        if ($(this).val()=== '1') {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
            type: 'GET',
            url:'/getPersonid1',
                success: function(data){
                    $('#khana_relation').html(data);
                }
            });

        }

    })
</script>
    <script>
        // Add an event listener to the select element
        document.getElementById('khana_person_type').addEventListener('change', function() {
            // Get the selected value
            var selectedValue = this.value;

            // Get the family-info element
            var familyInfo = document.getElementById('family-info');
            var taxInfo = document.getElementById('tax-info');

            // Update the display style based on the selected value
            familyInfo.style.display = selectedValue == 1 ? 'none' : 'block';
            taxInfo.style.display = selectedValue == 1 ? 'none' : 'block';
        });

        // Trigger the change event on page load to apply initial styling
        document.getElementById('khana_person_type').dispatchEvent(new Event('change'));
    </script>
@endsection

@section('footer_script')
    {{-- @if (session('khana_success'))
        <script>
            Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: '{{ session('khana_success') }}',
            showConfirmButton: false,
            timer: 1500
            })
        </script>
    @endif --}}
@endsection
