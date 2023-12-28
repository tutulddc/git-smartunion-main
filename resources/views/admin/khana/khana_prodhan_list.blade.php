@extends("layouts.admin")

@section("content")
<div class="col-lg-12 m-auto">
    <div class="card">
        <div class="card-header">
            <h3>খানাপ্রধানের তালিকা </h3>
        </div>
        <div class="card-body">
            {{-- <table class="table table-bordered"> --}}
            <table id="dataTables" class="table table-striped table-bordered dataTables" style="width:100%">
                <tr><td class="text-center" colspan="12">ই-খানা তথ্য - হোল্ডিং (ওয়াড নং -১)</td></tr>
                <tr>
                    <td>sl</td>
                    <td>হোল্ডিং নং</td>
                    <td>নাম</td>
                    <td>পিতা/স্বামী</td>
                    <td>ঠিকানা</td>
                    <td>মোবাইল নং</td>
                    <td>ছবি</td>
                    <td>Action</td>
                </tr>
                @foreach ( $khana_per_infos as $key=>$khana_per_info )

                <tr>
                    <td>{{ $key++ }}</td>
                    <td>{{ $khana_per_info->holding_number }}</td>
                    <td>{{ $khana_per_info->khana_person_name }}</td>
                    <td>{{ $khana_per_info->father_name }}</td>
                    <td>{{ $khana_per_info->pres_address }}</td>
                    <td>{{ $khana_per_info->phone }}</td>
                    <td>
                        @if ($khana_per_info->khana_person_img == null)
                        <img width="70" src="{{ Avatar::create($khana_per_info->khana_person_name)->toBase64() }}" />
                        @else
                            <img width="70" src="{{asset('uploads/khana/persons')}}/{{ $khana_per_info->khana_person_img }}" alt="">
                        @endif


                    </td>
                    <td>

                        <div class="d-flex">
                            {{-- <a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a> --}}
                            {{-- <button data-link="" class="btn btn-danger shadow btn-xs sharp del_btn"><i class="fa fa-trash"></i></button>
                            &nbsp; &nbsp; --}}
                            <a  title="খানা সদস্যদের তালিকা" href="{{ route('khana.persons.list',$khana_per_info->khana_id) }}" class="btn btn-info shadow btn-xs sharp"><i class="fa fa-eye"></i></a>
                            &nbsp;
                            {{-- <button title="খানার অন্য সদস্যসমূহ" data-link="{{ route('khana.persons.list') }}" class="btn btn-info shadow btn-xs sharp"><i class="fa fa-eye"></i></button> --}}
                            {{-- <button title="খানার অন্য সদস্যসমূহ" data-link="{{ route('khana.persons.list',$khana_per_info->khana_id) }}" class="btn btn-info shadow btn-xs sharp"><i class="fa fa-eye"></i></button> --}}
                        </div>

                    </td>

                </tr>

                @endforeach
            </table>
        </div>
    </div>
</div>

@endsection



@section('footer_script')

    <script>
        // $(document).ready(function() {
        //     $('.dataTables').DataTable({
        //         "paging": true // Enable pagination
        //         "searching": true // Enable search bar
        //     });
        // });


        $(document).ready(function() {
            $('.dataTables').DataTable();
        });

    </script>
    {{-- <script>
        $('.del_btn').click(function(){

            var link = $(this).attr('data-link');

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.isConfirmed) {

                    window.location.href=link;

                }
                })
        })
    </script> --}}


    {{-- @if (session('delete'))
        <script>

            Swal.fire({
            title: 'Deleted',
            text: 'The user Deleted Successfully',
            imageUrl: 'https://unsplash.it/400/200',
            imageWidth: 400,
            imageHeight: 200,
            imageAlt: 'Custom image',
            })

        </script>
    @endif --}}
    {{-- <script>
        $('#division').change(function(){
            var division_id = $(this).val();
            // alert(division_id);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
            type: 'POST',
            url:'/getDistrict',
            data:{'division_id': division_id},
                success: function(data){
                    $('#district').html(data);
                }
            });
        })
    </script>
    <script>
        $('#district').change(function(){
            var district_id = $(this).val();
            // alert(division_id);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
            type: 'POST',
            url:'/getUpazila',
            data:{'district_id': district_id},
                success: function(data){
                    $('#upazila').html(data);
                }
            });
        })
    </script>
    <script>
        $('#upazila').change(function(){
            var upazila_id = $(this).val();
            // alert(upazila_id);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
            type: 'POST',
            url:'/getUnion',
            data:{'upazila_id': upazila_id},
                success: function(data){
                    $('#union').html(data);
                    // alert(data);
                }
            });
        })
    </script> --}}


@endsection
@section('footer_script')
    <script>
        // $('#division').change(function(){
        //     var division_id = $(this).val();
        //     alert(division_id);
            // $.ajaxSetup({
            //     headers: {
            //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //     }
            // });

            // $.ajax({
            // type: 'POST',
            // url:'/getDistrict',
            // data:{'division_id': division_id},
            //     success: function(data){
            //         alert(data);
            //     }
            // });
        // })
    </script>
@endsection
