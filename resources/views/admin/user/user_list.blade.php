@extends("layouts.admin")

@section("content")
<div class="col-lg-8 m-auto">
    <div class="card">
        <div class="card-header">
            <h3>User List </h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <td>sl</td>
                    <td>Photo</td>
                    <td>Name</td>
                    <td>Email</td>
                    <td>Department</td>
                    <td>Action</td>
                </tr>
                @foreach ( $users as $key=>$user )

                <tr>
                    <td>{{ $key++ }}</td>
                    <td>
                        @if ($user->photo == null)
                        <img width="70" src="{{ Avatar::create($user->department)->toBase64() }}" />
                        @else
                            <img width="70" src="{{asset('uploads/user')}}/{{ $user->logo }}" alt="">
                        @endif

                    </td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->department }}</td>
                    <td>

                        <div class="d-flex">
                            {{-- <a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a> --}}
                            <button data-link="{{ route('user.remove',$user->id) }}" class="btn btn-danger shadow btn-xs sharp del_btn"><i class="fa fa-trash"></i></button>
                            {{-- <button data-link="{{ route('user.remove',$user->id) }}" class="btn btn-danger shadow btn-xs sharp del_btn"><i class="fa fa-trash"></i></button> --}}
                        </div>

                    </td>

                </tr>

                @endforeach

            </table>
        </div>
    </div>
</div>
<div class="col-lg-4">
    <div class="card">
        <div class="card-header">
            <h3>Add New User </h3>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <form action="{{ route('custom.register') }}" method="POST">
                @csrf
                <div class="mb-3">
                    {{-- <label for="name" class="form_label">User Name</label> --}}
                    <input type="text" name="name" id="name" class="form-control rounded" placeholder="User Name">
                </div>
                @error('name')
                    <strong class="text-danger">{{$message}}</strong>
                @enderror
                <div class="mb-3">
                    {{-- <label for="email" class="form_label">Email</label>
                    <input type="email" name="email" id="email" class="form-control"> --}}
                    <select name="department" id=""  class="form-control rounded" >
                        <option value=""  class="form-control">Select Department</option>
                        <option value="Upazila_Parishad"  class="form-control">Upazilla Parishad</option>
                        <option value="Union_Parishad"  class="form-control">Union Parishad</option>
                        <option value="Doptor"  class="form-control">Doptor</option>
                        <option value="Office_User"  class="form-control">Office User</option>
                    </select>
                </div>
                @error('department')
                    <strong class="text-danger">{{$message}}</strong>
                @enderror
                <div class="mb-3">
                    {{-- <label for="password" class="form_label">Password</label> --}}
                    <input type="password" name="password" id="password" class="form-control rounded" placeholder="Password">
                </div>
                @error('password')
                    <strong class="text-danger">{{$message}}</strong>
                @enderror
                <div class="mb-3">
                    {{-- <label for="" class="form-label">Division</label> --}}
                    <select name="division" id="division" class="form-control rounded">
                        <option value="">Seclect Division</option>
                        <option value="">All Division</option>
                        @foreach ($divisions as $division)
                        <option value="{{ $division->id }}">{{ $division->bn_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    {{-- <label for="" class="form-label">District</label> --}}
                    <select name="district" id="district" class="form-control rounded">
                        <option value="">Seclect District</option>
                        @foreach ($districts as $district)
                        <option value="{{ $district->id }}">{{ $district->bn_name ." ". $district->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    {{-- <label for="" class="form-label">Upazila</label> --}}
                    <select name="upazila" id="upazila" class="form-control rounded">
                        <option value="">Seclect Upazila</option>
                        @foreach ($upazilas as $upazila)
                        <option value="{{ $upazila->id }}">{{ $upazila->bn_name ." ". $upazila->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    {{-- <label for="" class="form-label">Union</label> --}}
                    <select name="union" id="union" class="form-control rounded">
                        <option value="">Seclect Union</option>
                        @foreach ($unions as $union)
                        <option value="{{ $union->id }}">{{ $union->bn_name ." ". $union->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <input type="submit" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection



@section('footer_script')
    <script>
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
    </script>


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
    <script>
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
    </script>


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
        })
    </script>
@endsection
