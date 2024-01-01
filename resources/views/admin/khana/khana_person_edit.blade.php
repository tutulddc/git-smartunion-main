@extends('layouts.admin')

@section('content')
    <div class="col-lg-12 col-sm-12 m-auto">
        <div class="card-header">
            <h4>খানার তথ্য সংগ্রহ ফরম</h4>
            {{-- 'khana_per_infos' =>$khana_per_infos,
            'person_info' =>$person_info,
            'khana_benefit_infos' =>$khana_benefit_infos,
            'khana_oth_benefit_infos' =>$khana_oth_benefit_infos,
            'khana_farmer_infos' =>$khana_farmer_infos,
            'khana_family_infos' =>$khana_family_infos,
            'khana_holding_tax_infos' =>$khana_holding_tax_infos, --}}
            <p>{{ $person_info->khana_id }}</p>
            <p>{{ $person_info->khana_person_unique_id }}</p>
            <p></p>
            <p></p>
            <p></p>
            <p></p>
            <p></p>
            <p></p>
        </div>
        <div class="card-body">
            @if (session('khanaSuccess'))
                <div class="alert alert-success">{{session('khanaSuccess')}}</div>
            @endif
            @if (session('khana_prodhan'))
                <div class="alert alert-danger">{{session('khana_prodhan')}}</div>
            @endif
            {{-- <form action="{{ route('khana.store') }}" method="POST" enctype="multipart/form-data"> --}}
            <form action="{{ route('khana.personal.info.update', $person_info->khana_person_unique_id) }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div id="accordion">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h5>
                                <a class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    (১)ব্যক্তিগত ও সামাজিক তথ্য
                                  </a>
                            </h5>
                        </div>
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-12 col-sm-4 col-lg-2">
                                        <label for="ward_number">ওয়ার্ড নং</label>
                                        <select name="ward_number" class="form-control form-control-new rounded">
                                            <option value="1" {{ old('ward_number', $person_info->ward_number) == 1 ? 'selected' : '' }}>ওয়ার্ড ১</option>
                                            <option value="2" {{ old('ward_number', $person_info->ward_number) == 2 ? 'selected' : '' }}>ওয়ার্ড ২</option>
                                            <option value="3" {{ old('ward_number', $person_info->ward_number) == 3 ? 'selected' : '' }}>ওয়ার্ড ৩</option>
                                            <option value="4" {{ old('ward_number', $person_info->ward_number) == 4 ? 'selected' : '' }}>ওয়ার্ড ৪</option>
                                            <option value="5" {{ old('ward_number', $person_info->ward_number) == 5 ? 'selected' : '' }}>ওয়ার্ড ৫</option>
                                            <option value="6" {{ old('ward_number', $person_info->ward_number) == 6 ? 'selected' : '' }}>ওয়ার্ড ৬</option>
                                            <option value="7" {{ old('ward_number', $person_info->ward_number) == 7 ? 'selected' : '' }}>ওয়ার্ড ৭</option>
                                            <option value="8" {{ old('ward_number', $person_info->ward_number) == 8 ? 'selected' : '' }}>ওয়ার্ড ৮</option>
                                        </select>

                                        @error('ward_number')
                                            <li class="text-danger small">{{ $message; }}</li>
                                        @enderror
                                    </div>
                                    <div class="col-lg-2 col-12 col-sm-4">
                                        <label for="holding_number">হোল্ডিং নং:<span class="input_star">*</span></label>
                                        <input type="text" name="holding_number" value="{{ $person_info->holding_number }}" class="  form-control form-control-new rounded" >
                                        @error('holding_number')
                                            <li class="text-danger small">{{ $message; }}</li>
                                        @enderror
                                    </div>
                                    <div class="col-lg-2 col-12 col-sm-4">
                                        <label for="khana_person_name">ব্যক্তির নাম:<span class="input_star">*</span></label>
                                        <input type="text" name="khana_person_name" value="{{ $person_info->khana_person_name }}" class="  form-control form-control-new rounded" >
                                        @error('khana_person_name')
                                            <li class="text-danger small">{{ $message; }}</li>
                                        @enderror
                                    </div>
                                    <div class="col-lg-2 col-12 col-sm-4">
                                        <label for="khana_person_type">খানা ব্যক্তির ধরন<span class="input_star">*</span></label>
                                        <select name="khana_person_type" id="khana_person_type" class="  form-control form-control-new rounded" >
                                            <option value="1" {{ old('khana_person_type', $person_info->khana_person_type) == 1 ? 'selected' : '' }}>পরিবারের সদস্য</option>
                                            <option value="2" {{ old('khana_person_type', $person_info->khana_person_type) == 2 ? 'selected' : '' }}>পরিবার প্রধান</option>
                                            {{-- <option value="">সিলেক্ট করুন</option> --}}
                                            {{-- <option value="1">পরিবারের সদস্য</option>
                                            <option value="2">পরিবার প্রধান</option> --}}
                                        </select>
                                        @error('khana_person_type')
                                            <li class="text-danger small">{{ $message; }}</li>
                                        @enderror
                                    </div>
                                    <div class="col-lg-2 col-12 col-sm-4">
                                        <label for="khana_relation">খানা প্রধানের সাথে সম্পর্ক<span class="input_star">*</span></label>
                                        <select name="khana_relation" id="khana_relation" class="  form-control form-control-new rounded" >
                                            <option value="" {{ old('khana_relation', $person_info->khana_relation) == null ? 'selected' : '' }}>স্বীয় (Self)</option>
                                            <option value="1" {{ old('khana_relation', $person_info->khana_relation) == 1 ? 'selected' : '' }}>স্বামী</option>
                                            <option value="2" {{ old('khana_relation', $person_info->khana_relation) == 2 ? 'selected' : '' }}>স্ত্রী</option>
                                            <option value="3" {{ old('khana_relation', $person_info->khana_relation) == 3 ? 'selected' : '' }}>ছেলে</option>
                                            <option value="4" {{ old('khana_relation', $person_info->khana_relation) == 4 ? 'selected' : '' }}>মেয়ে</option>
                                            <option value="5" {{ old('khana_relation', $person_info->khana_relation) == 5 ? 'selected' : '' }}>ভাই</option>
                                            <option value="6" {{ old('khana_relation', $person_info->khana_relation) == 6 ? 'selected' : '' }}>বোন</option>
                                            <option value="7" {{ old('khana_relation', $person_info->khana_relation) == 7 ? 'selected' : '' }}>বাবা</option>
                                            <option value="8" {{ old('khana_relation', $person_info->khana_relation) == 8 ? 'selected' : '' }}>মা</option>
                                            <option value="9" {{ old('khana_relation', $person_info->khana_relation) == 9 ? 'selected' : '' }}>চাচা</option>
                                            <option value="10" {{ old('khana_relation', $person_info->khana_relation) == 10 ? 'selected' : '' }}>চাচি</option>
                                            <option value="11" {{ old('khana_relation', $person_info->khana_relation) == 11 ? 'selected' : '' }}>খালা</option>
                                            <option value="12" {{ old('khana_relation', $person_info->khana_relation) == 12 ? 'selected' : '' }}>খালু</option>
                                            <option value="13" {{ old('khana_relation', $person_info->khana_relation) == 13 ? 'selected' : '' }}>ফুফা</option>
                                            <option value="14" {{ old('khana_relation', $person_info->khana_relation) == 14 ? 'selected' : '' }}>ফুফু</option>
                                            <option value="15" {{ old('khana_relation', $person_info->khana_relation) == 15 ? 'selected' : '' }}>পোতা</option>
                                            <option value="16" {{ old('khana_relation', $person_info->khana_relation) == 16 ? 'selected' : '' }}>পুত্নি</option>
                                            <option value="17" {{ old('khana_relation', $person_info->khana_relation) == 17 ? 'selected' : '' }}>নাতি</option>
                                            <option value="18" {{ old('khana_relation', $person_info->khana_relation) == 18 ? 'selected' : '' }}>নাতনি</option>


                                        </select>
                                        @error('khana_relation')
                                            <li class="text-danger small">{{ $message; }}</li>
                                        @enderror
                                    </div>
                                    {{-- <div class="col-lg-2 col-12 col-sm-4">
                                        <label for="khana_relation">খানার সাথে সম্পর্ক<span class="input_star">*</span></label>
                                        <input type="text" name="khana_relation" value="" class="  form-control form-control-new rounded" >
                                        @error('khana_relation')
                                            <li class="text-danger small">{{ $message; }}</li>
                                        @enderror
                                    </div> --}}
                                    <div class="col-lg-2 col-12 col-sm-4">
                                        <label for="father_name">পিতার নাম:<span class="input_star">*</span></label>
                                        <input type="text" name="father_name" value="{{ $person_info->father_name }}" class="  form-control form-control-new rounded" >
                                        @error('father_name')
                                            <li class="text-danger small">{{ $message; }}</li>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-lg-2 col-12 col-sm-4">
                                        <label for="mother_name">মাতার নাম:</label>
                                        <input type="text" name="mother_name" value="{{ $person_info->mother_name }}" class="  form-control form-control-new rounded">
                                    </div>
                                    <div class="col-lg-2 col-12 col-sm-4">
                                        <label for="husb_wife_name">স্বামী/স্ত্রীর নাম:</label>
                                        <input type="text" name="husb_wife_name"  value="{{ $person_info->husb_wife_name }}" class="  form-control form-control-new rounded" >
                                    </div>
                                    {{-- <div class="col-lg-2 col-12 col-sm-4">
                                        <label for="khana_person_img">ব্যক্তির ছবি<span class="input_star">*</span></label>
                                        <input type="file" name="khana_person_img" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" value="{{ $person_info->husb_wife_name }}" value="{{ $person_info->khana_person_img }}" class="  form-control form-control-new rounded p-1" >
                                        @error('khana_person_img')
                                            <li class="text-danger small">{{ $message; }}</li>
                                        @enderror
                                    </div> --}}
                                    <div class="col-lg-2 col-12 col-sm-4">
                                        <label for="khana_person_img">ব্যক্তির ছবি<span class="input_star">*</span></label>
                                        <input type="file" name="khana_person_img" value="{{ $person_info->khana_person_img }}" class="  form-control form-control-new rounded p-1" >
                                        @error('khana_person_img')
                                            <li class="text-danger small">{{ $message; }}</li>
                                        @enderror
                                    </div>
                                    {{-- <div class="col-lg-2 col-12 col-sm-4">
                                        <label for="khana_person_img">ব্যক্তির ছবি<span class="input_star">*</span></label>
                                        @if($person_info->khana_person_img)
                                            <img src="{{ asset('uploads/khana/persons/' . $person_info->khana_person_img) }}" alt="Person Image" class="img-fluid">
                                        @endif
                                        <input type="file" name="khana_person_img" class="form-control form-control-new rounded p-1">
                                        @error('khana_person_img')
                                            <li class="text-danger small">{{ $message }}</li>
                                        @enderror
                                    </div> --}}



                                    <div class="col-lg-2 col-12 col-sm-4">
                                        <label for="khana_house_img">বাড়ির ছবি<span class="input_star">*</span></label>
                                        <input type="file" name="khana_house_img" value="{{ $person_info->khana_house_img }}" onchange="document.getElementById('blah1').src = window.URL.createObjectURL(this.files[0])" value="{{ $person_info->khana_house_img }}" class="  form-control form-control-new rounded p-1" >
                                        @error('khana_house_img')
                                            <li class="text-danger small">{{ $message; }}</li>
                                        @enderror
                                    </div>
                                    <div class="col-lg-4 col-sm-8">
                                        <label for="pres_address">বতর্মান ঠিকানা <span class="input_star">*</span></label>
                                        <input type="text" name="pres_address" value="{{ $person_info->pres_address }}" class="  form-control form-control-new rounded" >
                                        @error('pres_address')
                                            <li class="text-danger small">{{ $message; }}</li>
                                        @enderror
                                    </div>

                                </div>


                                <div class="row mb-3">
                                    <div class="col-12 col-sm-4 col-lg-2">
                                        <label for="nid_number">এন.আই.ডি নং:</label>
                                        <input type="number" name="nid_number" value="{{ $person_info->nid_number }}" class="  form-control form-control-new rounded">
                                    </div>
                                    <div class="col-12 col-sm-4 col-lg-2">
                                        <label for="birth_number">জন্ম নিবন্ধন:</label>
                                        <input type="number" name="birth_number" value="{{ $person_info->birth_number }}" class="  form-control form-control-new rounded">
                                        @error('birth_number')
                                            <li class="text-danger small">{{ $message; }}</li>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-sm-4 col-lg-2">
                                        <label for="phone">মোবাইল নং:<span class="input_star">*</span></label>
                                        <input type="number" name="phone" value="{{ $person_info->phone }}" class="  form-control form-control-new rounded" >
                                        @error('phone')
                                            <li class="text-danger small">{{ $message; }}</li>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-sm-4 col-lg-2">
                                        <label for="dob">জন্ম তারিখ:<span class="input_star">*</span></label>
                                        <input type="date" name="dob" value="{{ $person_info->dob }}" class="  form-control form-control-new rounded" >
                                        @error('dob')
                                            <li class="text-danger small">{{ $message; }}</li>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-sm-4 col-lg-2">
                                        <label for="gender" >লিঙ্গ:<span class="input_star">*</span></label>
                                        <select name="gender" id="" class="  form-control form-control-new rounded" >
                                            <option value="1" {{ old('gender', $person_info->gender) == 1 ? 'selected' : '' }}>পুরুষ</option>
                                            <option value="2" {{ old('gender', $person_info->gender) == 2 ? 'selected' : '' }}>নারী</option>
                                            <option value="3" {{ old('gender', $person_info->gender) == 3 ? 'selected' : '' }}>শিশু</option>
                                            <option value="0" {{ old('gender', $person_info->gender) == 0 ? 'selected' : '' }}>অন্যান্য</option>
                                        </select>
                                        @error('gender')
                                            <li class="text-danger small">{{ $message; }}</li>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-sm-4 col-lg-2">
                                        <label for="education">শিক্ষাগত যোগ্যতা:<span class="input_star">*</span></label>
                                        <select name="education"  class="  form-control form-control-new rounded" >
                                            {{-- <option value="">সিলেক্ট করুন</option> --}}
                                            <option value="1" {{ old('education', $person_info->education) == 1 ? 'selected' : '' }}>জে এস সি</option>
                                            <option value="2" {{ old('education', $person_info->education) == 2 ? 'selected' : '' }}>এস এস সি</option>
                                            <option value="3" {{ old('education', $person_info->education) == 3 ? 'selected' : '' }}>এইচ এস সি</option>
                                            <option value="4" {{ old('education', $person_info->education) == 4 ? 'selected' : '' }}>ডিপ্লোমা</option>
                                            <option value="5" {{ old('education', $person_info->education) == 5 ? 'selected' : '' }}>ডিগ্রী</option>
                                            <option value="6" {{ old('education', $person_info->education) == 6 ? 'selected' : '' }}>অর্নাস</option>
                                            <option value="7" {{ old('education', $person_info->education) == 7 ? 'selected' : '' }}>মাস্টার্স</option>
                                            <option value="8" {{ old('education', $person_info->education) == 8 ? 'selected' : '' }}>ইন্জিনিয়ারিং</option>
                                            <option value="9" {{ old('education', $person_info->education) == 9 ? 'selected' : '' }}>ডাক্তার</option>
                                            <option value="0" {{ old('education', $person_info->education) == 0 ? 'selected' : '' }}>নিরক্ষর</option>
                                        </select>
                                        @error('education')
                                            <li class="text-danger small">{{ $message; }}</li>
                                        @enderror
                                    </div>

                                </div>
                                <div class="row mb-3">
                                    <div class="col-12 col-sm-4 col-lg-2">
                                        <label for="occupation">পেশা:<span class="input_star">*</span></label>
                                        <select name="occupation" class="  form-control form-control-new rounded" >
                                            <option value="1" {{ old('occupation', $person_info->occupation) == 1 ? 'selected' : '' }}>ক্ষুদ্র ব্যবসায়ী</option>
                                            <option value="2" {{ old('occupation', $person_info->occupation) == 2 ? 'selected' : '' }}>ব্যবসায়ী</option>
                                            <option value="3" {{ old('occupation', $person_info->occupation) == 3 ? 'selected' : '' }}>কৃষক</option>
                                            <option value="4" {{ old('occupation', $person_info->occupation) == 4 ? 'selected' : '' }}>বেসরকারি চাকুরী</option>
                                            <option value="5" {{ old('occupation', $person_info->occupation) == 5 ? 'selected' : '' }}>সরকারি চাকুরী</option>
                                            <option value="6" {{ old('occupation', $person_info->occupation) == 6 ? 'selected' : '' }}>ব্যাংক চাকুরী</option>
                                            <option value="7" {{ old('occupation', $person_info->occupation) == 7 ? 'selected' : '' }}>শিক্ষক</option>
                                            <option value="8" {{ old('occupation', $person_info->occupation) == 8 ? 'selected' : '' }}>ডাক্তার</option>
                                            <option value="9" {{ old('occupation', $person_info->occupation) == 9 ? 'selected' : '' }}>ইজ্ঞিনিয়ার</option>
                                            <option value="10" {{ old('occupation', $person_info->occupation) == 10 ? 'selected' : '' }}>শ্রমিক</option>
                                            <option value="11" {{ old('occupation', $person_info->occupation) == 11 ? 'selected' : '' }}>গৃহিণী</option>
                                            <option value="12" {{ old('occupation', $person_info->occupation) == 12 ? 'selected' : '' }}>শিক্ষার্থী</option>
                                            <option value="0" {{ old('occupation', $person_info->occupation) == 0 ? 'selected' : '' }}>বেকার</option>

                                        </select>
                                        @error('occupation')
                                            <li class="text-danger small">{{ $message; }}</li>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-sm-4 col-lg-2">
                                        <label for="passport">পাসপোট:</label>
                                        <input type="text" name="passport" value="{{ $person_info->passport }}" class="  form-control form-control-new rounded">
                                    </div>
                                    <div class="col-12 col-sm-4 col-lg-2">
                                        <label for="driving_lice">ড্রাইভিং লাইসেন্স:</label>
                                        <input type="text" name="driving_lice" value="{{ $person_info->driving_lice }}" class="  form-control form-control-new rounded">
                                    </div>
                                    <div class="col-12 col-sm-4 col-lg-2">
                                        <label for="freedom_fighter">মুক্তি যোদ্ধা কি /না ?</label>
                                        <select class="  form-control form-control-new rounded" name="freedom_fighter">
                                            <option value="0" {{ old('freedom_fighter', $person_info->freedom_fighter) == 0 ? 'selected' : '' }}>না</option>
                                            <option value="1" {{ old('freedom_fighter', $person_info->freedom_fighter) == 1 ? 'selected' : '' }}>হ্যাঁ</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-sm-4 col-lg-2">
                                        <label for="ff_number">এফ.এফ.নং:</label>
                                        <input type="text" name="ff_number" value="{{ $person_info->ff_number }}" class="  form-control form-control-new rounded">
                                    </div>
                                    <div class="col-12 col-sm-4 col-lg-2">
                                        <label for="quater_house">নিবাস পেয়েছেন কি / না ?</label>
                                        <select class="  form-control form-control-new rounded" name="quater_house">
                                            <option value="0" {{ old('quater_house', $person_info->quater_house) == 0 ? 'selected' : '' }}>না</option>
                                            <option value="1" {{ old('quater_house', $person_info->quater_house) == 1 ? 'selected' : '' }}>হ্যাঁ</option>
                                        </select>
                                    </div>

                                    {{-- @error('category_name')
                                        <li class="text-danger">{{ $message; }}</li>
                                    @enderror --}}
                                </div>
                                <div class="row mb-3">
                                    <div class="col-12 col-sm-6 col-lg-3">
                                        <label for="child_education">স্কুলপড়ুয়া শিশু আছে কি/না?:</label>
                                        <select name="child_education"  class="  form-control form-control-new rounded">
                                            <option value="0" {{ old('child_education', $person_info->child_education) == 0 ? 'selected' : '' }}>না</option>
                                            <option value="1" {{ old('child_education', $person_info->child_education) == 1 ? 'selected' : '' }}>হ্যাঁ</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-sm-6 col-lg-3">
                                        <label for="primary_stipend">প্রাথমিক উপবৃ্ত্তি পাই কি/না?</label>
                                        <select name="primary_stipend" class="  form-control form-control-new rounded">
                                            <option value="0" {{ old('primary_stipend', $person_info->primary_stipend) == 0 ? 'selected' : '' }}>না</option>
                                            <option value="1" {{ old('primary_stipend', $person_info->primary_stipend) == 1 ? 'selected' : '' }}>হ্যাঁ</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-sm-6 col-lg-3">
                                        <label for="mid_stipend">মাধ্যমিক উপবৃ্ত্তি পাই কি/না?</label>
                                        <select name="mid_stipend"  class="  form-control form-control-new rounded">
                                            <option value="0" {{ old('mid_stipend', $person_info->mid_stipend) == 0 ? 'selected' : '' }}>না</option>
                                            <option value="1" {{ old('mid_stipend', $person_info->mid_stipend) == 1 ? 'selected' : '' }}>হ্যাঁ</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-sm-6 col-lg-3">
                                        <label for="high_stipend">উচ্চমাধ্যমিক উপবৃ্ত্তি পাই কি/না?</label>
                                        <select name="high_stipend"value="{{ $person_info->ff_number }}" class="  form-control form-control-new rounded">
                                            <option value="0" {{ old('high_stipend', $person_info->high_stipend) == 0 ? 'selected' : '' }}>না</option>
                                            <option value="1" {{ old('high_stipend', $person_info->high_stipend) == 1 ? 'selected' : '' }}>হ্যাঁ</option>
                                        </select>
                                    </div>
                                    {{-- @error('category_name')
                                        <li class="text-danger">{{ $message; }}</li>
                                    @enderror --}}
                                </div>


                                <div class="row mb-6 ">
                                    <div class="col-12 col-sm-4 col-lg-3">
                                        <label for="stipend_amount">উপবৃ্ত্তির পরিমান:</label>
                                        <input type="number" name="stipend_amount" value="{{ $person_info->stipend_amount }}" class="  form-control form-control-new rounded">
                                    </div>
                                    <div class="col-12 col-sm-4 col-lg-3">
                                        <label for="dropped_child">বিদ্যালয় হতে ঝরে পড়া শিশু কি/না?</label>
                                        <select name="dropped_child" class="  form-control form-control-new rounded">
                                            <option value="0" {{ old('dropped_child', $person_info->dropped_child) == 0 ? 'selected' : '' }}>না</option>
                                            <option value="1" {{ old('dropped_child', $person_info->dropped_child) == 1 ? 'selected' : '' }}>হ্যাঁ</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-sm-4 col-lg-3">
                                        <label for="child_marriage">বাল্য বিবাহের ঝুকি সম্পন্ন শিশু কি/না?</label>
                                        <select name="child_marriage" class="  form-control form-control-new rounded">
                                            <option value="0" {{ old('child_marriage', $person_info->child_marriage) == 0 ? 'selected' : '' }}>না</option>
                                            <option value="1" {{ old('child_marriage', $person_info->child_marriage) == 1 ? 'selected' : '' }}>হ্যাঁ</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-sm-4 col-lg-3">
                                        <label for="drag_affect">মাদকাসক্ত কি/না?</label>
                                        <select name="drag_affect" class="  form-control form-control-new rounded">
                                            <option value="0" {{ old('drag_affect', $person_info->drag_affect) == 0 ? 'selected' : '' }}>না</option>
                                            <option value="1" {{ old('drag_affect', $person_info->drag_affect) == 1 ? 'selected' : '' }}>হ্যাঁ</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-sm-4 col-lg-3">
                                        <label for="active_worker">কর্মক্ষম কি/না?</label>
                                        <select name="active_worker" class="  form-control form-control-new rounded">
                                            <option value="0" {{ old('active_worker', $person_info->active_worker) == 0 ? 'selected' : '' }}>না</option>
                                            <option value="1" {{ old('active_worker', $person_info->active_worker) == 1 ? 'selected' : '' }}>হ্যাঁ</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-sm-6 col-lg-3">
                                        <label for="phy_disabled">শারিরীক ভাবে অক্ষম কি/না?</label>
                                        <select name="phy_disabled" class="  form-control form-control-new rounded">
                                            <option value="0" {{ old('phy_disabled', $person_info->phy_disabled) == 0 ? 'selected' : '' }}>না</option>
                                            <option value="1" {{ old('phy_disabled', $person_info->phy_disabled) == 1 ? 'selected' : '' }}>হ্যাঁ</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-sm-6 col-lg-3">
                                        <label for="unemployed">বেকার কি/না?</label>
                                        <select name="unemployed" class="  form-control form-control-new rounded">
                                            <option value="0" {{ old('unemployed', $person_info->unemployed) == 0 ? 'selected' : '' }}>না</option>
                                            <option value="1" {{ old('unemployed', $person_info->unemployed) == 1 ? 'selected' : '' }}>হ্যাঁ</option>
                                        </select>
                                    </div>
                                    <div class="col-6 col-sm-3 col-lg-3 d-flex justify-content-between">
                                        {{-- @if ($person_info->khana_person_img)
                                            <img width="80" src="{{ asset('uploads/khana/persons') }}/{{ $person_info->khana_person_img  }}" width="100">
                                        @endif
                                            <img width="100" src="" id="blah" alt=""> --}}
                                            <img id="blah" width="60" src="{{ asset('uploads/khana/persons') }}/{{ $person_info->khana_person_img  }}" width="100">
                                            <span>&#8594;</span>
                                            <img id="blah1" width="60" src="{{ asset('uploads/khana/houses') }}/{{ $person_info->khana_house_img  }}" width="100">
                                    </div>
                                    <div class="my-3 w-100 col-lg-12 col-sm-6 col-12 text-center">
                                        <button type="submit"  class="btn btn-secondary w-60">হালনাগাদ করুন (ব্যক্তিগত ও সামাজিক তথ্য)</button>
                                    </div>

                                    {{-- @error('category_name')
                                        <li class="text-danger">{{ $message; }}</li>
                                    @enderror --}}
                                </div>

                            </div>
                        </div>
                    </div>
                        {{-- end of   (১)ব্যক্তিগত ও সামাজিক তথ্য --}}
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h5 class="mb-0">
                              <a class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                (২)ভাতা ও খাদ্যবান্ধব কর্মসূচী
                              </a>
                            </h5><span class="input_star">*</span>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                            <div class="card-body">
                                <h4 class="card-title" style="text-align: center">ভাতার তথ্য</h4>
                                <div class="row mb-3">
                                    <div class="col-12 col-sm-6 col-lg-3">
                                        <label for="benefit_type">ভাতার ধরণ:</label>
                                        <select name="benefit_type" class=" form-control form-control-new rounded">
                                            <option value="1" {{ old('benefit_type', $benefit_info->benefit_type) == 1 ? 'selected' : '' }}>মুক্তিযোদ্ধা</option>
                                            <option value="2" {{ old('benefit_type', $benefit_info->benefit_type) == 2 ? 'selected' : '' }}>প্রতিবন্ধী</option>
                                            <option value="3" {{ old('benefit_type', $benefit_info->benefit_type) == 3 ? 'selected' : '' }}>বিধবা</option>
                                            <option value="4" {{ old('benefit_type', $benefit_info->benefit_type) == 4 ? 'selected' : '' }}>বয়স্ক</option>
                                            <option value="5" {{ old('benefit_type', $benefit_info->benefit_type) == 5 ? 'selected' : '' }}>ভি ডব্লিউ ডি</option>
                                            <option value="6" {{ old('benefit_type', $benefit_info->benefit_type) == 6 ? 'selected' : '' }}>মাতৃত্বকালীন</option>
                                            <option value="7" {{ old('benefit_type', $benefit_info->benefit_type) == 7 ? 'selected' : '' }}>ভিক্ষুখ</option>
                                            <option value="0" {{ old('benefit_type', $benefit_info->benefit_type) == 0 ? 'selected' : '' }}>অন্যান্য</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-sm-6 col-lg-3">
                                        <label for="benefit_confirm">ভাতা পেয়েছেন কি না?:</label>
                                        <select name="benefit_confirm" class=" form-control form-control-new rounded">
                                            <option value="0" {{ old('benefit_confirm', $benefit_info->benefit_confirm) == 0 ? 'selected' : '' }}>না</option>
                                            <option value="1" {{ old('benefit_confirm', $benefit_info->benefit_confirm) == 1 ? 'selected' : '' }}>হ্যাঁ</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-sm-6 col-lg-3">
                                        <label for="benefit_dept">দপ্তরের নাম:</label>
                                        <select name="benefit_dept" class=" form-control form-control-new rounded">
                                            <option value="1" {{ old('benefit_dept', $benefit_info->benefit_dept) == 1 ? 'selected' : '' }}>উপজেলা আনসার ও ভিডিপি</option>
                                            <option value="2" {{ old('benefit_dept', $benefit_info->benefit_dept) == 2 ? 'selected' : '' }}>উপজেলা ফায়ার সার্ভিস ও সিভিল ডিফেন্স</option>
                                            <option value="3" {{ old('benefit_dept', $benefit_info->benefit_dept) == 3 ? 'selected' : '' }}>উপজেলা স্বাস্থ্য কমপ্লেক্স</option>
                                            <option value="4" {{ old('benefit_dept', $benefit_info->benefit_dept) == 4 ? 'selected' : '' }}>উপজেলা পরিবার পরিকল্পনা অফিস</option>
                                            <option value="5" {{ old('benefit_dept', $benefit_info->benefit_dept) == 5 ? 'selected' : '' }}>উপজেলা হাসপাতাল স্বাস্থ্য কেন্দ্র</option>
                                            <option value="6" {{ old('benefit_dept', $benefit_info->benefit_dept) == 6 ? 'selected' : '' }}>উপজেলা কৃষি দপ্তর</option>
                                            <option value="7" {{ old('benefit_dept', $benefit_info->benefit_dept) == 7 ? 'selected' : '' }}>উপজেলা মৎস দপ্তর</option>
                                            <option value="8" {{ old('benefit_dept', $benefit_info->benefit_dept) == 8 ? 'selected' : '' }}>উপজেলা খাদ্য নিয়ন্ত্রকের কার্যালয়</option>
                                            <option value="9" {{ old('benefit_dept', $benefit_info->benefit_dept) == 9 ? 'selected' : '' }}>উপজেলা প্রাণী সম্পদ অফিস</option>
                                            <option value="10" {{ old('benefit_dept', $benefit_info->benefit_dept) == 10 ? 'selected' : '' }}>উপজেলা সার পরিবেশকের কার্যালয়</option>
                                            <option value="11" {{ old('benefit_dept', $benefit_info->benefit_dept) == 11 ? 'selected' : '' }}>উপজেলা ভূমি অফিস</option>
                                            <option value="12" {{ old('benefit_dept', $benefit_info->benefit_dept) == 12 ? 'selected' : '' }}>উপজেলা সাব রেজিস্ট্রার অফিস</option>
                                            <option value="13" {{ old('benefit_dept', $benefit_info->benefit_dept) == 13 ? 'selected' : '' }}>উপজেলা সেটেলমেন্ট অফিস</option>
                                            <option value="14" {{ old('benefit_dept', $benefit_info->benefit_dept) == 14 ? 'selected' : '' }}>তথ্য ও যোগাযোগ প্রযুক্তি অধিদপ্তর</option>
                                            <option value="15" {{ old('benefit_dept', $benefit_info->benefit_dept) == 15 ? 'selected' : '' }}>উপজেলা জনস্বাস্থ্য প্রকৌশল</option>
                                            <option value="16" {{ old('benefit_dept', $benefit_info->benefit_dept) == 16 ? 'selected' : '' }}>উপজেলা সমাজসেবা কার্যালয়</option>
                                            <option value="17" {{ old('benefit_dept', $benefit_info->benefit_dept) == 17 ? 'selected' : '' }}>উপজেলা মহিলা বিষয়ক অধিদপ্তর</option>
                                            <option value="18" {{ old('benefit_dept', $benefit_info->benefit_dept) == 18 ? 'selected' : '' }}>উপজেলা যুব উন্নয়ন অধিদপ্তর</option>
                                            <option value="19" {{ old('benefit_dept', $benefit_info->benefit_dept) == 19 ? 'selected' : '' }}>উপজেলা সমবায় অফিস</option>
                                            <option value="20" {{ old('benefit_dept', $benefit_info->benefit_dept) == 20 ? 'selected' : '' }}>উপজেলা বিআরডিবি অফিস </option>
                                            <option value="21" {{ old('benefit_dept', $benefit_info->benefit_dept) == 21 ? 'selected' : '' }}>একটি বাড়ি একটি খামার ও পল্লী সঞ্চয় ব্যাংক</option>
                                            <option value="22" {{ old('benefit_dept', $benefit_info->benefit_dept) == 22 ? 'selected' : '' }}>উপজেলা এসএফডিএফ কার্যালয়</option>
                                            <option value="23" {{ old('benefit_dept', $benefit_info->benefit_dept) == 23 ? 'selected' : '' }}>উপজেলা মাধ্যমিক শিক্ষা অফিস</option>
                                            <option value="24" {{ old('benefit_dept', $benefit_info->benefit_dept) == 24 ? 'selected' : '' }}>উপজেলা নির্বাহী অফিসারের কার্যালয়</option>
                                            <option value="25" {{ old('benefit_dept', $benefit_info->benefit_dept) == 25 ? 'selected' : '' }}>উপজেলা প্রকৌশলীর কার্যালয়</option>
                                            <option value="26" {{ old('benefit_dept', $benefit_info->benefit_dept) == 26 ? 'selected' : '' }}>উপজেলা নির্বাচন অফিস</option>
                                            <option value="27" {{ old('benefit_dept', $benefit_info->benefit_dept) == 27 ? 'selected' : '' }}>উপজেলা পল্লী সঞ্চয় ব্যাংক </option>
                                            <option value="28" {{ old('benefit_dept', $benefit_info->benefit_dept) == 28 ? 'selected' : '' }}>উপজেলা হিসাব রক্ষণ অফিস</option>
                                            <option value="29" {{ old('benefit_dept', $benefit_info->benefit_dept) == 29 ? 'selected' : '' }}>উপজেলা তথ্য কেন্দ্</option>
                                            <option value="30" {{ old('benefit_dept', $benefit_info->benefit_dept) == 30 ? 'selected' : '' }}>উপজেলা রিসোর্স সেন্টার</option>
                                            <option value="31" {{ old('benefit_dept', $benefit_info->benefit_dept) == 31 ? 'selected' : '' }}>উপজেলা প্রকল্প বাস্তবায়ন কর্মকর্তার অফিস </option>
                                            <option value="32" {{ old('benefit_dept', $benefit_info->benefit_dept) == 32 ? 'selected' : '' }}>উপজেলা ডাকঘর</option>
                                            <option value="0" {{ old('benefit_dept', $benefit_info->benefit_dept) == 0 ? 'selected' : '' }}>অন্যান্য</option>
                                            </select>
                                    </div>
                                    <div class="col-12 col-sm-6 col-lg-3">
                                        <label for="benefit_amount">ভাতার পরিমাণ:</label>
                                        <input type="number" name="benefit_amount" value="{{ $benefit_info->benefit_amount }}" class=" form-control form-control-new rounded">
                                    </div>
                                    {{-- @error('category_name')
                                        <li class="text-danger">{{ $message; }}</li>
                                    @enderror --}}
                                </div>

                                <h4 class="card-title mt-3" style="text-align: center">অন্যান্য সুবিধার তথ্য</h4>
                                <div class="row mb-3 ">
                                    <div class="col-12 col-sm-6 col-lg-3">
                                        <label for="oth_benefit_conf">অন্যান্য সুবিধা পেয়েছেন কি না?</label>
                                        <select name="oth_benefit_conf" class=" form-control form-control-new rounded">
                                            <option value="0" {{ old('oth_benefit_conf',$oth_benefit_info->oth_benefit_conf) == 0 ? 'selected' : '' }}>না</option>
                                            <option value="1" {{ old('oth_benefit_conf', $oth_benefit_info->oth_benefit_conf) == 1 ? 'selected' : '' }}>হ্যাঁ</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-sm-6 col-lg-3">
                                        <label for="housing" >আশ্রয়ণ প্রকল্পের ঘর পেয়েছেন কি না?</label>
                                        <select  name="housing" class=" form-control form-control-new rounded">
                                            <option value="0" {{ old('housing', $oth_benefit_info->housing) == 0 ? 'selected' : '' }}>না</option>
                                            <option value="1" {{ old('housing', $oth_benefit_info->housing) == 1 ? 'selected' : '' }}>হ্যাঁ</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-sm-6 col-lg-3">
                                    <label for="grbenefit" >জিআর পেয়েছেন কি না?</label>
                                        <select  name="gr_benefit" class=" form-control form-control-new rounded">
                                            <option value="0" {{ old('grbenefit', $oth_benefit_info->grbenefit) == 0 ? 'selected' : '' }}>না</option>
                                            <option value="1" {{ old('grbenefit', $oth_benefit_info->grbenefit) == 1 ? 'selected' : '' }}>হ্যাঁ</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-sm-6 col-lg-3">
                                        <label for="tinbenefit" >ঢেউটিন পেয়েছেন কি না?</label>
                                        <select  name="tin_benefit" class=" form-control form-control-new rounded">
                                            <option value="0" {{ old('tinbenefit', $oth_benefit_info->tinbenefit) == 0 ? 'selected' : '' }}>না</option>
                                            <option value="1" {{ old('tinbenefit', $oth_benefit_info->tinbenefit) == 1 ? 'selected' : '' }}>হ্যাঁ</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-sm-6 col-lg-3 mt-2">
                                         <label for="blanket_benefit" >কম্বোল পেয়েছেন কি না?</label>
                                        <select name="blanket_benefit" class=" form-control form-control-new rounded">
                                            <option value="0" {{ old('unemployed', $oth_benefit_info->unemployed) == 0 ? 'selected' : '' }}>না</option>
                                            <option value="1" {{ old('unemployed', $oth_benefit_info->unemployed) == 1 ? 'selected' : '' }}>হ্যাঁ</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-sm-6 col-lg-3 mt-2">
                                        <label for="tcb_benefit" >টিসিবি পেয়েছেন কি না?</label>
                                       <select name="tcb_benefit" class=" form-control form-control-new rounded">
                                        <option value="0" {{ old('tcb_benefit', $oth_benefit_info->tcb_benefit) == 0 ? 'selected' : '' }}>না</option>
                                        <option value="1" {{ old('tcb_benefit', $oth_benefit_info->tcb_benefit) == 1 ? 'selected' : '' }}>হ্যাঁ</option>
                                       </select>
                                   </div>
                                   <div class="col-12 col-sm-6 col-lg-3 mt-2">
                                        <label for="fifteentaka_benefit" >১৫টাকার চাউল পেয়েছেন কি না?</label>
                                        <select name="fifteentaka_benefit" class=" form-control form-control-new rounded">
                                            <option value="0" {{ old('fifteentaka_benefit', $oth_benefit_info->fifteentaka_benefit) == 0 ? 'selected' : '' }}>না</option>
                                            <option value="1" {{ old('fifteentaka_benefit', $oth_benefit_info->fifteentaka_benefit) == 1 ? 'selected' : '' }}>হ্যাঁ</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-sm-6 col-lg-3 mt-2">
                                        <label for="thirtytaka_benefit" >৩০টাকার চাউল পেয়েছেন কি না?</label>
                                        <select name="thirtytaka_benefit" class=" form-control form-control-new rounded">
                                            <option value="0" {{ old('thirtytaka_benefit', $oth_benefit_info->thirtytaka_benefit) == 0 ? 'selected' : '' }}>না</option>
                                            <option value="1" {{ old('thirtytaka_benefit', $oth_benefit_info->thirtytaka_benefit) == 1 ? 'selected' : '' }}>হ্যাঁ</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-sm-6 col-lg-3 mt-2">
                                        <label for="benefit_deserve" >ভাতা পাওয়ার যোগ্য কি না?</label>
                                        <select name="benefit_deserve" class=" form-control form-control-new rounded">
                                            <option value="0" {{ old('benefit_deserve', $oth_benefit_info->benefit_deserve) == 0 ? 'selected' : '' }}>না</option>
                                            <option value="1" {{ old('benefit_deserve', $oth_benefit_info->benefit_deserve) == 1 ? 'selected' : '' }}>হ্যাঁ</option>
                                        </select>
                                    </div>

                                </div>
                                {{-- প্রশিক্ষনের তথ্য end--}}
                                <h4 class="card-title" style="text-align: center">ঋণের তথ্য</h4>
                                <div class="row mb-3">
                                    <div class="col-12 col-sm-6 col-lg-3">
                                        <label for="loan_conf">ঋণ গ্রহন করেছেন কি না?:</label>
                                        <select name="loan_conf" class=" form-control form-control-new rounded">
                                            <option value="0" {{ old('loan_conf', $loan_info->loan_conf) == 0 ? 'selected' : '' }}>না</option>
                                            <option value="1" {{ old('loan_conf', $loan_info->loan_conf) == 1 ? 'selected' : '' }}>হ্যাঁ</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-sm-6 col-lg-3">
                                        <label for="loan_type" >ঋণের ধরণ:</label>
                                        <select  name="loan_type" class=" form-control form-control-new rounded">
                                            <option value="1" {{ old('loan_type', $loan_info->loan_type) == 1 ? 'selected' : '' }}>ব্যবসা</option>
                                            <option value="2" {{ old('loan_type', $loan_info->loan_type) == 2 ? 'selected' : '' }}>কৃষি</option>
                                            <option value="3" {{ old('loan_type', $loan_info->loan_type) == 3 ? 'selected' : '' }}>শিক্ষা</option>
                                            <option value="4" {{ old('loan_type', $loan_info->loan_type) == 4 ? 'selected' : '' }}>গবাদীপশুপালন</option>
                                            <option value="5" {{ old('loan_type', $loan_info->loan_type) == 5 ? 'selected' : '' }}>কম্পিউটার প্রশিক্ষন</option>
                                            <option value="6" {{ old('loan_type', $loan_info->loan_type) == 6 ? 'selected' : '' }}>ফ্রীল্যাসিং প্রশিক্ষন</option>
                                            <option value="7" {{ old('loan_type', $loan_info->loan_type) == 7 ? 'selected' : '' }}>বিদেশ গমন</option>
                                            <option value="0" {{ old('loan_type', $loan_info->loan_type) == 0 ? 'selected' : '' }}>অন্যান্য</option>

                                            </select>
                                    </div>
                                    <div class="col-12 col-sm-6 col-lg-3">
                                        <label for="loan_dept">দপ্তরের নাম:</label>
                                        <select name="loan_dept" class=" form-control form-control-new rounded">
                                            <option value="1" {{ old('loan_dept', $loan_info->loan_dept) == 1 ? 'selected' : '' }}>উপজেলা আনসার ও ভিডিপি</option>
                                            <option value="2" {{ old('loan_dept', $loan_info->loan_dept) == 2 ? 'selected' : '' }}>উপজেলা ফায়ার সার্ভিস ও সিভিল ডিফেন্স</option>
                                            <option value="3" {{ old('loan_dept', $loan_info->loan_dept) == 3 ? 'selected' : '' }}>উপজেলা স্বাস্থ্য কমপ্লেক্স</option>
                                            <option value="4" {{ old('loan_dept', $loan_info->loan_dept) == 4 ? 'selected' : '' }}>উপজেলা পরিবার পরিকল্পনা অফিস</option>
                                            <option value="5" {{ old('loan_dept', $loan_info->loan_dept) == 5 ? 'selected' : '' }}>উপজেলা হাসপাতাল স্বাস্থ্য কেন্দ্র</option>
                                            <option value="6" {{ old('loan_dept', $loan_info->loan_dept) == 6 ? 'selected' : '' }}>উপজেলা কৃষি দপ্তর</option>
                                            <option value="7" {{ old('loan_dept', $loan_info->loan_dept) == 7 ? 'selected' : '' }}>উপজেলা মৎস দপ্তর</option>
                                            <option value="8" {{ old('loan_dept', $loan_info->loan_dept) == 8 ? 'selected' : '' }}>উপজেলা খাদ্য নিয়ন্ত্রকের কার্যালয়</option>
                                            <option value="9" {{ old('loan_dept', $loan_info->loan_dept) == 9 ? 'selected' : '' }}>উপজেলা প্রাণী সম্পদ অফিস</option>
                                            <option value="10" {{ old('loan_dept', $loan_info->loan_dept) == 10 ? 'selected' : '' }}>উপজেলা সার পরিবেশকের কার্যালয়</option>
                                            <option value="11" {{ old('loan_dept', $loan_info->loan_dept) == 11 ? 'selected' : '' }}>উপজেলা ভূমি অফিস</option>
                                            <option value="12" {{ old('loan_dept', $loan_info->loan_dept) == 12 ? 'selected' : '' }}>উপজেলা সাব রেজিস্ট্রার অফিস</option>
                                            <option value="13" {{ old('loan_dept', $loan_info->loan_dept) == 13 ? 'selected' : '' }}>উপজেলা সেটেলমেন্ট অফিস</option>
                                            <option value="14" {{ old('loan_dept', $loan_info->loan_dept) == 14 ? 'selected' : '' }}>তথ্য ও যোগাযোগ প্রযুক্তি অধিদপ্তর</option>
                                            <option value="15" {{ old('loan_dept', $loan_info->loan_dept) == 15 ? 'selected' : '' }}>উপজেলা জনস্বাস্থ্য প্রকৌশল</option>
                                            <option value="16" {{ old('loan_dept', $loan_info->loan_dept) == 16 ? 'selected' : '' }}>উপজেলা সমাজসেবা কার্যালয়</option>
                                            <option value="17" {{ old('loan_dept', $loan_info->loan_dept) == 17 ? 'selected' : '' }}>উপজেলা মহিলা বিষয়ক অধিদপ্তর</option>
                                            <option value="18" {{ old('loan_dept', $loan_info->loan_dept) == 18 ? 'selected' : '' }}>উপজেলা যুব উন্নয়ন অধিদপ্তর</option>
                                            <option value="19" {{ old('loan_dept', $loan_info->loan_dept) == 19 ? 'selected' : '' }}>উপজেলা সমবায় অফিস</option>
                                            <option value="20" {{ old('loan_dept', $loan_info->loan_dept) == 20 ? 'selected' : '' }}>উপজেলা বিআরডিবি অফিস </option>
                                            <option value="21" {{ old('loan_dept', $loan_info->loan_dept) == 21 ? 'selected' : '' }}>একটি বাড়ি একটি খামার ও পল্লী সঞ্চয় ব্যাংক</option>
                                            <option value="22" {{ old('loan_dept', $loan_info->loan_dept) == 22 ? 'selected' : '' }}>উপজেলা এসএফডিএফ কার্যালয়</option>
                                            <option value="23" {{ old('loan_dept', $loan_info->loan_dept) == 23 ? 'selected' : '' }}>উপজেলা মাধ্যমিক শিক্ষা অফিস</option>
                                            <option value="24" {{ old('loan_dept', $loan_info->loan_dept) == 24 ? 'selected' : '' }}>উপজেলা নির্বাহী অফিসারের কার্যালয়</option>
                                            <option value="25" {{ old('loan_dept', $loan_info->loan_dept) == 25 ? 'selected' : '' }}>উপজেলা প্রকৌশলীর কার্যালয়</option>
                                            <option value="26" {{ old('loan_dept', $loan_info->loan_dept) == 26 ? 'selected' : '' }}>উপজেলা নির্বাচন অফিস</option>
                                            <option value="27" {{ old('loan_dept', $loan_info->loan_dept) == 27 ? 'selected' : '' }}>উপজেলা পল্লী সঞ্চয় ব্যাংক </option>
                                            <option value="28" {{ old('loan_dept', $loan_info->loan_dept) == 28 ? 'selected' : '' }}>উপজেলা হিসাব রক্ষণ অফিস</option>
                                            <option value="29" {{ old('loan_dept', $loan_info->loan_dept) == 29 ? 'selected' : '' }}>উপজেলা তথ্য কেন্দ্</option>
                                            <option value="30" {{ old('loan_dept', $loan_info->loan_dept) == 30 ? 'selected' : '' }}>উপজেলা রিসোর্স সেন্টার</option>
                                            <option value="31" {{ old('loan_dept', $loan_info->loan_dept) == 31 ? 'selected' : '' }}>উপজেলা প্রকল্প বাস্তবায়ন কর্মকর্তার অফিস </option>
                                            <option value="32" {{ old('loan_dept', $loan_info->loan_dept) == 32 ? 'selected' : '' }}>উপজেলা ডাকঘর</option>
                                            <option value="0" {{ old('loan_dept', $loan_info->loan_dept) == 0 ? 'selected' : '' }}>অন্যান্য</option>
                                            </select>
                                    </div>
                                    <div class="col-12 col-sm-6 col-lg-3">
                                        <label for="loan_amount" >
                                            টাকার পরিমাণ::</label>
                                       <input type="text" name="loan_amount"  value="{{ $loan_info->loan_amount }}" class=" form-control form-control-new rounded">
                                   </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-12 col-sm-6 col-lg-3">
                                        <label for="loan_duration" >সময়কাল(মাস):</label>
                                       <input type="text" name="loan_duration" placeholder="১ মাস-৬মাস/বছর" value="{{ $loan_info->loan_duration }}" class=" form-control form-control-new rounded">
                                   </div>
                                   <div class="col-12 col-sm-3">
                                        <label for="loan_present_cond" >ঋণের বতর্মান অবস্থা:</label>
                                        <select  name="loan_present_cond" class=" form-control form-control-new rounded">
                                            <option value="0" {{ old('loan_present_cond', $loan_info->loan_present_cond) == 0 ? 'selected' : '' }}>স্থগিত</option>
                                            <option value="1" {{ old('loan_present_cond', $loan_info->loan_present_cond) == 1 ? 'selected' : '' }}>স্থগিত</option>
                                            <option value="2" {{ old('loan_present_cond', $loan_info->loan_present_cond) == 2 ? 'selected' : '' }}>স্থগিত</option>
                                            <option value="3" {{ old('loan_present_cond', $loan_info->loan_present_cond) == 3 ? 'selected' : '' }}>স্থগিত</option>
                                        </select>
                                    </div>
                                </div>
                                {{-- কৃষকের তথ্য --}}
                                <h4 class="card-title" style="text-align: center">কৃষি তথ্য</h4>
                                <div class="row mb-3">
                                    <div class="col-12 col-sm-6 col-lg-3">
                                        <label for="farmer_conf">কৃষক কি না?:</label>
                                        <select name="farmer_conf" class=" form-control form-control-new rounded">
                                            <option value="0" {{ old('unemployed', $person_info->unemployed) == 0 ? 'selected' : '' }}>না</option>
                                            <option value="1" {{ old('unemployed', $person_info->unemployed) == 1 ? 'selected' : '' }}>হ্যাঁ</option>
                                            <option value="0">না</option>
                                            <option value="1">হ্যাঁ</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-sm-6 col-lg-3">
                                        <label for="farmer_type" >কৃষকের ধরণ:</label>
                                        <select  name="farmer_type" class=" form-control form-control-new rounded">
                                            <option value="0" {{ old('unemployed', $person_info->unemployed) == 0 ? 'selected' : '' }}>না</option>
                                            <option value="1" {{ old('unemployed', $person_info->unemployed) == 1 ? 'selected' : '' }}>হ্যাঁ</option>
                                            <option value="1">প্রান্তিক</option>
                                            <option value="2">খুদ্র</option>
                                            <option value="3">ভূমিহীন</option>
                                            </select>
                                    </div>
                                    <div class="col-12 col-sm-6 col-lg-3">
                                        <label for="agro_land">
                                            কৃষি জমির পরিমাণ (শতক):</label>
                                        <input type="number" name="agro_land" placeholder="২ শতাংশ"  class=" form-control form-control-new rounded">
                                    </div>
                                    <div class="col-12 col-sm-6 col-lg-3">
                                        <label for="non_agro_land" >
                                            অকৃষি জমির পরিমাণ (শতক):</label>
                                        <input type="number" name="non_agro_land"  placeholder="২ শতাংশ" class=" form-control form-control-new rounded">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-12 col-sm-6 col-lg-3">
                                        <label for="main_crop" >প্রধান ফসলের নাম:</label>
                                        <input type="text" name="main_crop" placeholder="ধান/গম ইত্যাদি" class=" form-control form-control-new rounded">
                                    </div>

                                    <div class="col-12 col-sm-6 col-lg-3">
                                        <label for="farmer_status">কৃষকের অবস্থা:</label>
                                        <select name="farmer_status" class=" form-control form-control-new rounded">
                                            <option value="0" {{ old('unemployed', $person_info->unemployed) == 0 ? 'selected' : '' }}>না</option>
                                            <option value="1" {{ old('unemployed', $person_info->unemployed) == 1 ? 'selected' : '' }}>হ্যাঁ</option>
                                            <option value="0">নিম্ন</option>
                                            <option value="1">উত্তম</option>
                                            <option value="2">মধ্যম</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-sm-6 col-lg-3">
                                        <label for="agro_dept_facility" >কৃষি দপ্তরের প্রাপ্ত সুবিধা:</label>
                                        <input type="number" name="agro_dept_facility" placeholder="যেমন বীজ/সার গ্রহন"  class=" form-control form-control-new rounded">
                                    </div>
                                </div>
                                <div class="my-5 w-100 col-lg-12 col-sm-6 col-12 text-center">
                                    <button type="submit"  class="btn btn-secondary w-60" formaction="{{ route('khana.benefit.info.update', $person_info->khana_person_unique_id) }}">হালনাগাদ করুন (ভাতাসমূহের তথ্য)</button>
                                </div>
                                {{-- কৃষকের তথ্য end--}}

                                {{-- <div class="row mb-3">
                                    <div class="col-12 col-sm-6 col-lg-3">
                                        <label for="main_crop" >প্রধান ফসলের নাম:</label>
                                        <input type="text" name="main_crop" placeholder="ধান/গম িইত্যাদি" class=" form-control form-control-new rounded">
                                    </div>

                                    <div class="col-12 col-sm-6 col-lg-3">
                                        <label for="farmer_status">কৃষকের অবস্থা:</label>
                                        <select name="farmer_status" class=" form-control form-control-new rounded">
                                            <option value="0">নিম্ন</option>
                                            <option value="1">উত্তম</option>
                                            <option value="2">মধ্যম</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-sm-6 col-lg-3">
                                        <label for="agro_dept_facility" >কৃষি দপ্তরের প্রাপ্ত সুবিধা:</label>
                                        <input type="number" name="agro_dept_facility" placeholder="যেমন বীজ/সার গ্রহন"  class=" form-control form-control-new rounded">
                                    </div>
                                </div> --}}
                                {{-- কৃষকের তথ্য end--}}

                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingThree">
                          <h5 class="mb-0">
                            <a class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                              (৩)পারিবারিক তথ্য
                            </a>
                          </h5>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                          <div class="card-body">
                              <h4 class="card-title" style="text-align: center">পারিবারিক সকল তথ্য</h4>
                              <div class="row mb-3">
                                  <div class="col-12 col-sm-8 col-lg-4">
                                      <label for="per_address">স্থায়ী ঠিকানা (পাড়াসহ গ্রাম / মহল্লা):<span class="input_star"><span class="input_star">*</span></label>
                                      <input type="text" name="per_address"   class=" form-control form-control-new rounded" >
                                  </div>
                                  <div class="col-12 col-sm-6 col-lg-3">
                                      <label for="religion" >ধর্ম:<span class="input_star">*</span></label>
                                      <select  name="religion" class=" form-control form-control-new rounded" >
                                          <option value="1">মুসলিম</option>
                                          <option value="2">হিন্দু</option>
                                          <option value="3">খ্রিষ্টান</option>
                                          <option value="4">বৌদ্ধ</option>
                                          <option value="5">অন্যান্য</option>
                                      </select>
                                  </div>
                                  <div class="col-12 col-sm-6 col-lg-3">
                                      <label for="poverty_margin">
                                          আর্থ সামাজিক অবস্থা:<span class="input_star">*</span></label>
                                      <select  name="poverty_margin" class=" form-control form-control-new rounded" >
                                          <option value="1">অতিদরিদ্র</option>
                                          <option value="2">দরিদ্র</option>
                                          <option value="3">নিম্ন মধ্যবিত্ত</option>
                                          <option value="4">মধ্যবিত্ত</option>
                                          <option value="5">উচ্চ বিত্ত</option>
                                      </select>
                                  </div>
                                  <div class="col-12 col-sm-4 col-lg-2">
                                      <label for="yearly_income" >
                                          বার্ষিক আয়(টাকাই):<span class="input_star">*</span></label>
                                      <input type="number" name="yearly_income"  placeholder="২০০০০ টাকা" class=" form-control form-control-new rounded" >
                                  </div>
                              </div>
                              <div class="row mb-3">
                                  <div class="col-12 col-sm-6 col-lg-3">
                                      <label for="sanitation" >ল্যাট্রিন ব্যবস্থা:<span class="input_star">*</span></label>
                                      <select name="sanitation" class=" form-control form-control-new rounded" >
                                          <option value="0">ল্যাট্রিন নাই</option>
                                          <option value="1">পাকা ল্যাট্রিন</option>
                                          <option value="2">রিং স্লাভ</option>
                                          <option value="3">কাঁচা ল্যাট্রিন</option>
                                          </select>
                                  </div>
                                  <div class="col-12 col-sm-6 col-lg-3">
                                      <label for="drinking_water">সুপেয় পানির ব্যবস্থা:</label>
                                      <select  name="drinking_water" class=" form-control form-control-new rounded">
                                          <option value="1">নলকূপ সরকারী</option>
                                          <option value="2">সুপেয় পানির ট্যাংক</option>
                                          <option value="3">নলকূপ ব্যক্তিগত</option>
                                          <option value="4">পানির ব্যবস্থা নাই</option>
                                      </select>
                                  </div>
                                  <div class="col-12 col-sm-6 col-lg-3">
                                      <label for="fish_pond" >মৎস ঘেরের সংখ্যা:</label>
                                      <input type="number" name="fish_pond" placeholder="0"   class=" form-control form-control-new rounded">
                                  </div>
                                  <div class="col-12 col-sm-6 col-lg-3">
                                      <label for="fish_pond_area">মৎস ঘেরের আয়তন (শতাংশ):</label>
                                      <input type="number" name="fish_pond_area" placeholder="১৬ শতাংশ"  class=" form-control form-control-new rounded">
                                  </div>
                              </div>
                              <div class="row mb-3">
                                  <div class="col-12 col-sm-6 col-lg-3">
                                      <label for="domestic_animal" >গৃহ পালিত পশুর সংখ্যা:</label>
                                      <input type="number" name="domestic_animal"   placeholder="0" class=" form-control form-control-new rounded">
                                  </div>
                                  <div class="col-12 col-sm-6 col-lg-3">
                                      <label for="electricity">বিদ্যুৎ ব্যবস্থা আছে কি/না?</label>
                                      <select  name="electricity" class=" form-control form-control-new rounded">
                                          <option value="0">না</option>
                                          <option value="1">হ্যাঁ</option>
                                      </select>
                                  </div>
                                  <div class="col-12 col-sm-6 col-lg-3">
                                      <label for="race" >ক্ষুদ্র নৃ-গোষ্ঠী কি/না?</label>
                                      <select  name="race" class=" form-control form-control-new rounded">
                                          <option value="0">না</option>
                                          <option value="1">হ্যাঁ</option>
                                      </select>
                                  </div>
                                  <div class="col-12 col-sm-6 col-lg-3">
                                      <label for="immigrant">প্রবাসীর সংখ্যা:</label>
                                      <input type="number" name="immigrant"  placeholder="0"  class=" form-control form-control-new rounded">
                                  </div>
                              </div>

                              <div class="row mb-3">
                                  <div class="col-12 col-sm-6 col-lg-3">
                                      <label for="total_tenant" >ভাড়াটিয়ার সংখ্যা:</label>
                                      <input type="number" name="total_tenant"   placeholder="0" class=" form-control form-control-new rounded">
                                  </div>
                                  <div class="col-12 col-sm-6 col-lg-3">
                                      <label for="motor_cycle">মটর বাইকের সংখ্যা:</label>
                                      <input type="number" name="motor_cycle"   placeholder="0" class=" form-control form-control-new rounded">
                                  </div>
                                  <div class="col-12 col-sm-6 col-lg-3">
                                      <label for="rickshaw_van" >ভ্যান / রিক্সার সংখ্যা:</label>
                                      <input type="number" name="rickshaw_van"   placeholder="0" class=" form-control form-control-new rounded">
                                  </div>
                                  <div class="col-12 col-sm-6 col-lg-3">
                                      <label for="auto_van">অটো ভ্যান / রিক্সার সংখ্যা:</label>
                                      <input type="number" name="auto_van"   placeholder="0" class=" form-control form-control-new rounded">
                                  </div>
                              </div>

                              <div class="row mb-3">
                                  <div class="col-12 col-sm-6 col-lg-3">
                                      <label for="cng_mahindra" >সিএনজি / মাহেন্দ্রের সংখ্যা:</label>
                                      <input type="number" name="cng_mahindra"   placeholder="0" class=" form-control form-control-new rounded">
                                  </div>
                                  <div class="col-12 col-sm-6 col-lg-3">
                                      <label for="easy_bike">ইজিবাইকের সংখ্যা:</label>
                                      <input type="number" name="easy_bike"   placeholder="0" class=" form-control form-control-new rounded">
                                  </div>
                                  <div class="col-12 col-sm-6 col-lg-3">
                                      <label for="boat" >ট্রলারের সংখ্যা:</label>
                                      <input type="number" name="boat"   placeholder="0" class=" form-control form-control-new rounded">
                                  </div>
                                  <div class="col-12 col-sm-6 col-lg-3">
                                      <label for="bus_three_wheeler">বাস/মিনিবাস/ট্রাক/থ্রি হুইলার</label>
                                      <input type="number" name="bus_three_wheeler"   placeholder="0" class=" form-control form-control-new rounded">
                                  </div>
                              </div>
                          </div>
                        </div>
                      </div>
                       {{-- end of   (৩)পারিবারিক তথ্য --}}
                       <div class="card">
                        <div class="card-header" id="headingThree">
                          <h5 class="mb-0">
                            <a class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapsefour" aria-expanded="false" aria-controls="collapseThree">
                                (৪)করসংক্রান্ত তথ্য
                            </a>
                          </h5>
                        </div>
                        <div id="collapsefour" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                            <div class="card-body">
                                <h4 class="card-title" style="text-align: center">করসংক্রান্ত তথ্য</h4>
                                <div class="row mb-3">
                                    <div class="col-12 col-sm-6 col-lg-3">
                                        <label for="house_category" >বাড়ির ধরন:<span class="input_star">*</span></label>
                                        <select class=" form-control form-control-new rounded" name="house_category">
                                            <option value="1">পাকা ১তলা</option>
                                            <option value="2">পাকা ২তলা</option>
                                            <option value="3">পাকা ৩তলা</option>
                                            <option value="4">পাকা ৪তলা</option>
                                            <option value="5">পাকা ৫তলা</option>
                                            <option value="6">আধা পাকা- রুম ১টি</option>
                                            <option value="7">আধা পাকা- রুম ২টি</option>
                                            <option value="8">আধা পাকা- রুম ৩টি</option>
                                            <option value="9">কাচা- ঘর ১টি</option>
                                            <option value="10">কাচা- ঘর ২টি</option>
                                            <option value="11">কাচা- ঘর ৩টি</option>
                                            <option value="12">চৌচালা/কাঠের</option>
                                            <option value="13">অন্যান্য</option>
                                            </select>
                                    </div>
                                    <div class="col-12 col-sm-6 col-lg-3">
                                        <label for="number_of_rooms">মোট কক্ষের সংখ্যা</label>
                                        <input type="number" name="number_of_rooms"   placeholder="0" class=" form-control form-control-new rounded">
                                    </div>
                                    <div class="col-12 col-sm-6 col-lg-3">
                                        <label for="house_use_type" >বাড়ীর ব্যবহারের ধরন:</label>
                                        <select class=" form-control form-control-new rounded" name="house_use_type">
                                            <option value="1">মালিক নিজে থাকেন</option>
                                            <option value="2">ভাড়া দেওয়া</option>
                                            <option value="3">উভয়</option>
                                            </select>
                                    </div>
                                    <div class="col-12 col-sm-6 col-lg-3">
                                        <label for="house_yearly_value">গৃহের বার্ষিক মূল্য:<span class="input_star">*</span></label>
                                        <input type="number" name="house_yearly_value"   placeholder="0" class=" form-control form-control-new rounded">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-12 col-12 col-sm-6 col-lg-3">
                                        <label for="land_yearly_value">ভুমির বার্ষিক ভাড়া মূল্য:<span class="land_yearly_rent"><span class="input_star">*</span></span></label>
                                        <input type="number" name="land_yearly_value"   placeholder="0" class=" form-control form-control-new rounded">
                                    </div>
                                    <div class="col-12 col-12 col-sm-6 col-lg-3">
                                        <label for="yearly_tax">বার্ষিক কর (টাকা):<span class="land_yearly_rent"><span class="input_star">*</span></span></label>
                                        <input type="number" name="yearly_tax"   placeholder="0" class=" form-control form-control-new rounded">
                                    </div>
                                    <div class="col-12 col-12 col-sm-6 col-lg-3">
                                        <label for="final_tax">ফাইনাল ট্যাক্স:<span class="land_yearly_rent"><span class="input_star">*</span></span></label>
                                        <input type="number" name="final_tax"   placeholder="0" class=" form-control form-control-new rounded">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- end of   (৪)করসংক্রান্ত তথ্য -- holding --}}



                </div>









                <div class="mb-3">
                    <button type="submit"  class="btn btn-primary">Save Information</button>
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

