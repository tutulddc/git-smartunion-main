@extends('layouts.admin')

@section('content')
    <div class="col-lg-12 col-sm-12 m-auto">
        <div class="card-header">
            <h4>খানার তথ্য সংগ্রহ ফরম</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('khana.store') }}" method="POST">
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
                                        <select name="ward_number" class=" form-control rounded" >
                                            <option value="1">ওয়ার্ড ১</option>
                                            <option value="2">ওয়ার্ড ২</option>
                                            <option value="3">ওয়ার্ড ৩</option>
                                            <option value="4">ওয়ার্ড ৪</option>
                                            <option value="5">ওয়ার্ড ৫</option>
                                            <option value="6">ওয়ার্ড ৬</option>
                                            <option value="7">ওয়ার্ড ৭</option>
                                            <option value="8">ওয়ার্ড ৮</option>
                                        </select>
                                        @error('ward_number')
                                            <li class="text-danger small">{{ $message; }}</li>
                                        @enderror
                                    </div>
                                    <div class="col-lg-2 col-12 col-sm-4">
                                        <label for="holding_number">হোল্ডিং নং:<span class="input_star">*</span></label>
                                        <input type="text" name="holding_number" value="" class=" form-control rounded" >
                                        @error('holding_number')
                                            <li class="text-danger small">{{ $message; }}</li>
                                        @enderror
                                    </div>
                                    <div class="col-lg-2 col-12 col-sm-4">
                                        <label for="khana_person_name">ব্যক্তির নাম:<span class="input_star">*</span></label>
                                        <input type="text" name="khana_person_name" value="" class=" form-control rounded" >
                                        @error('khana_person_name')
                                            <li class="text-danger small">{{ $message; }}</li>
                                        @enderror
                                    </div>
                                    <div class="col-lg-2 col-12 col-sm-4">
                                        <label for="khana_person_type">খানা ব্যক্তির ধরন<span class="input_star">*</span></label>
                                        <select name="khana_person_type" id="khana_person_type" class=" form-control rounded" >
                                            <option value="">সিলেক্ট করুন</option>
                                            <option value="1">পরিবারের সদস্য</option>
                                            <option value="2">পরিবার প্রধান</option>
                                        </select>
                                        @error('khana_person_type')
                                            <li class="text-danger small">{{ $message; }}</li>
                                        @enderror
                                    </div>
                                    <div class="col-lg-2 col-12 col-sm-4">
                                        <label for="khana_relation">খানা প্রধানের সাথে সম্পর্ক<span class="input_star">*</span></label>
                                        <select name="khana_relation" id="khana_relation" class=" form-control rounded" >
                                            {{-- <option value="">সিলেক্ট করুন</option> --}}
                                            {{-- <option value="0"> </option>
                                            <option value="1">স্বামী</option>
                                            <option value="2">স্ত্রী</option>
                                            <option value="3">ছেলে</option>
                                            <option value="4">মেয়ে</option>
                                            <option value="5">ভাই</option>
                                            <option value="6">বোন</option>
                                            <option value="7">বাবা</option>
                                            <option value="8">মা</option>
                                            <option value="9">চাচা</option>
                                            <option value="10">চাচি</option>
                                            <option value="11">খালা</option>
                                            <option value="12">খালু</option>
                                            <option value="13">ফুফা</option>
                                            <option value="14">ফুফু</option>
                                            <option value="15">পোতা</option>
                                            <option value="16">পুত্নি</option>
                                            <option value="17">নাতি</option>
                                            <option value="18">নাতনি</option>
                                            <option value="19">অন্যান্য</option> --}}
                                        </select>
                                        @error('khana_relation')
                                            <li class="text-danger small">{{ $message; }}</li>
                                        @enderror
                                    </div>
                                    {{-- <div class="col-lg-2 col-12 col-sm-4">
                                        <label for="khana_relation">খানার সাথে সম্পর্ক<span class="input_star">*</span></label>
                                        <input type="text" name="khana_relation" value="" class=" form-control rounded" >
                                        @error('khana_relation')
                                            <li class="text-danger small">{{ $message; }}</li>
                                        @enderror
                                    </div> --}}
                                    <div class="col-lg-2 col-12 col-sm-4">
                                        <label for="father_name">পিতার নাম:<span class="input_star">*</span></label>
                                        <input type="text" name="father_name" value="" class=" form-control rounded" >
                                        @error('father_name')
                                            <li class="text-danger small">{{ $message; }}</li>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-lg-2 col-12 col-sm-4">
                                        <label for="mother_name">মাতার নাম:</label>
                                        <input type="text" name="mother_name" value="" class=" form-control rounded">
                                    </div>
                                    <div class="col-lg-2 col-12 col-sm-4">
                                        <label for="husb_wife_name">স্বামী/স্ত্রীর নাম:</label>
                                        <input type="text" name="husb_wife_name" value="" class=" form-control rounded" >
                                    </div>
                                    <div class="col-lg-2 col-12 col-sm-4">
                                        <label for="khana_person_img">ব্যক্তির ছবি<span class="input_star">*</span></label>
                                        <input type="file" name="khana_person_img" value="" class=" form-control rounded p-1" >
                                        @error('khana_person_img')
                                            <li class="text-danger small">{{ $message; }}</li>
                                        @enderror
                                    </div>

                                    <div class="col-lg-2 col-12 col-sm-4">
                                        <label for="khana_house_img">বাড়ির ছবি<span class="input_star">*</span></label>
                                        <input type="file" name="khana_house_img" value="" class=" form-control rounded p-1" >
                                        @error('khana_house_img')
                                            <li class="text-danger small">{{ $message; }}</li>
                                        @enderror
                                    </div>
                                    <div class="col-lg-4 col-sm-8">
                                        <label for="pres_address">বতর্মান ঠিকানা <span class="input_star">*</span></label>
                                        <input type="text" name="pres_address" value="" class=" form-control rounded" >
                                        @error('pres_address')
                                            <li class="text-danger small">{{ $message; }}</li>
                                        @enderror
                                    </div>

                                </div>

                                {{-- <div class="row mb-3">
                                    <div class="col-12 col-sm-4 col-lg-2">
                                        <label for="mother_name">মাতার নাম:</label>
                                        <input type="text" name="mother_name" value="" class=" form-control rounded">
                                    </div>
                                    <div class="col-12 col-sm-4 col-lg-2">
                                        <label for="husb_wife_name">স্বামী/স্ত্রীর নাম:</label>
                                        <input type="text" name="husb_wife_name" value="" class=" form-control rounded" >
                                    </div>
                                    <div class="col-12 col-sm-4 col-lg-2">
                                        <label for="khana_person_img">ব্যক্তির ছবি<span class="input_star">*</span></label>
                                        <input type="file" name="khana_person_img" value="" class=" form-control rounded p-1" >
                                        @error('khana_person_img')
                                            <li class="text-danger small">{{ $message; }}</li>
                                        @enderror
                                    </div>

                                    <div class="col-12 col-sm-4 col-lg-2">
                                        <label for="khana_house_img">বাড়ির ছবি<span class="input_star">*</span></label>
                                        <input type="file" name="khana_house_img" value="" class=" form-control rounded p-1" >
                                        @error('khana_house_img')
                                            <li class="text-danger small">{{ $message; }}</li>
                                        @enderror
                                    </div>
                                    <div class="col-sm-8 col-lg-4">
                                        <label for="pres_address">বতর্মান ঠিকানা <span class="input_star">*</span></label>
                                        <input type="text" name="pres_address" value="" class=" form-control rounded" >
                                        @error('pres_address')
                                            <li class="text-danger small">{{ $message; }}</li>
                                        @enderror
                                    </div>

                                </div> --}}
                                <div class="row mb-3">
                                    <div class="col-12 col-sm-4 col-lg-2">
                                        <label for="nid_number">এন.আই.ডি নং:</label>
                                        <input type="number" name="nid_number" value="" class=" form-control rounded">
                                    </div>
                                    <div class="col-12 col-sm-4 col-lg-2">
                                        <label for="birth_number">জন্ম নিবন্ধন:</label>
                                        <input type="number" name="birth_number" value="" class=" form-control rounded">
                                        @error('birth_number')
                                            <li class="text-danger small">{{ $message; }}</li>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-sm-4 col-lg-2">
                                        <label for="phone">মোবাইল নং:<span class="input_star">*</span></label>
                                        <input type="number" name="phone" value="" class=" form-control rounded" >
                                        @error('phone')
                                            <li class="text-danger small">{{ $message; }}</li>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-sm-4 col-lg-2">
                                        <label for="dob">জন্ম তারিখ:<span class="input_star">*</span></label>
                                        <input type="date" name="dob" value="" class=" form-control rounded" >
                                        @error('dob')
                                            <li class="text-danger small">{{ $message; }}</li>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-sm-4 col-lg-2">
                                        <label for="gender" >লিঙ্গ:<span class="input_star">*</span></label>
                                        <select name="gender" id="" class=" form-control rounded" >
                                            <option value="">সিলেক্ট করুন</option>
                                            <option value="1">পুরুষ</option>
                                            <option value="2">নারী</option>
                                            <option value="3">শিশু</option>
                                            <option value="0">অন্যান্য</option>
                                        </select>
                                        @error('gender')
                                            <li class="text-danger small">{{ $message; }}</li>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-sm-4 col-lg-2">
                                        <label for="education">শিক্ষাগত যোগ্যতা:<span class="input_star">*</span></label>
                                        <select name="education"  class=" form-control rounded" >
                                            <option value="">সিলেক্ট করুন</option>
                                            <option value="1">জে এস সি</option>
                                            <option value="2">এস এস সি</option>
                                            <option value="3">এইচ এস সি</option>
                                            <option value="4">ডিপ্লোমা</option>
                                            <option value="5"> ডিগ্রী </option>
                                            <option value="6">অর্নাস</option>
                                            <option value="7">মাস্টার্ </option>
                                            <option value="8">ইন্জিনিয়ারিং </option>
                                            <option value="9"> ডাক্তার </option>
                                            <option value="0"> নিরক্ষর </option>
                                        </select>
                                        @error('education')
                                            <li class="text-danger small">{{ $message; }}</li>
                                        @enderror
                                    </div>

                                </div>
                                <div class="row mb-3">
                                    <div class="col-12 col-sm-4 col-lg-2">
                                        <label for="occupation">পেশা:<span class="input_star">*</span></label>
                                        <select name="occupation" class=" form-control rounded" >
                                            <option value="1">ক্ষুদ্র ব্যবসায়ী</option>
                                            <option value="2">ব্যবসায়ী</option>
                                            <option value="3">কৃষক</option>
                                            <option value="4">বেসরকারি চাকুরী</option>
                                            <option value="5">সরকারি চাকুরী</option>
                                            <option value="6">ব্যাংক চাকুরী</option>
                                            <option value="7">শিক্ষক</option>
                                            <option value="8">ডাক্তার</option>
                                            <option value="9">ইজ্ঞিনিয়ার</option>
                                            <option value="10">শ্রমিক</option>
                                            <option value="11">গৃহিণী</option>
                                            <option value="12">শিক্ষার্থী</option>
                                            <option value="0">বেকার</option>
                                        </select>
                                        @error('occupation')
                                            <li class="text-danger small">{{ $message; }}</li>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-sm-4 col-lg-2">
                                        <label for="passport">পাসপোট:</label>
                                        <input type="text" name="passport" value="" class=" form-control rounded">
                                    </div>
                                    <div class="col-12 col-sm-4 col-lg-2">
                                        <label for="driving_lice">ড্রাইভিং লাইসেন্স:</label>
                                        <input type="text" name="driving_lice" value="" class=" form-control rounded">
                                    </div>
                                    <div class="col-12 col-sm-4 col-lg-2">
                                        <label for="freedom_fighter">মুক্তি যোদ্ধা কি /না ?</label>
                                        <select class=" form-control rounded" name="freedom_fighter">
                                            <option value="0">না</option>
                                            <option value="1">হ্যাঁ</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-sm-4 col-lg-2">
                                        <label for="ff_number">এফ.এফ.নং:</label>
                                        <input type="text" name="ff_number" value="" class=" form-control rounded">
                                    </div>
                                    <div class="col-12 col-sm-4 col-lg-2">
                                        <label for="quater_house">নিবাস পেয়েছেন কি / না ?</label>
                                        <select class=" form-control rounded" name="quater_house">
                                            <option value="0">না</option>
                                            <option value="1">হ্যাঁ</option>
                                        </select>
                                    </div>

                                    {{-- @error('category_name')
                                        <li class="text-danger">{{ $message; }}</li>
                                    @enderror --}}
                                </div>
                                <div class="row mb-3">
                                    <div class="col-12 col-sm-6 col-lg-3">
                                        <label for="child_education">স্কুলপড়ুয়া শিশু আছে কি/না?:</label>
                                        <select name="child_education" class=" form-control rounded">
                                            <option value="0">না</option>
                                            <option value="1">হ্যাঁ</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-sm-6 col-lg-3">
                                        <label for="primary_stipend">প্রাথমিক উপবৃ্ত্তি পাই কি/না?</label>
                                        <select name="primary_stipend" class=" form-control rounded">
                                            <option value="0">না</option>
                                            <option value="1">হ্যাঁ</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-sm-6 col-lg-3">
                                        <label for="mid_stipend">মাধ্যমিক উপবৃ্ত্তি পাই কি/না?</label>
                                        <select name="mid_stipend" class=" form-control rounded">
                                            <option value="0">না</option>
                                            <option value="1">হ্যাঁ</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-sm-6 col-lg-3">
                                        <label for="high_stipend">উচ্চমাধ্যমিক উপবৃ্ত্তি পাই কি/না?</label>
                                        <select name="high_stipend" class=" form-control rounded">
                                            <option value="0">না</option>
                                            <option value="1">হ্যাঁ</option>
                                        </select>
                                    </div>
                                    {{-- @error('category_name')
                                        <li class="text-danger">{{ $message; }}</li>
                                    @enderror --}}
                                </div>


                                <div class="row mb-6 ">
                                    <div class="col-12 col-sm-4 col-lg-3">
                                        <label for="stipend_amount">উপবৃ্ত্তির পরিমান:</label>
                                        <input type="number" name="stipend_amount" value="" class=" form-control rounded">
                                    </div>
                                    <div class="col-12 col-sm-4 col-lg-3">
                                        <label for="dropped_child">বিদ্যালয় হতে ঝরে পড়া শিশু কি/না?</label>
                                        <select name="dropped_child" class=" form-control rounded">
                                            <option value="0">না</option>
                                            <option value="1">হ্যাঁ</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-sm-4 col-lg-3">
                                        <label for="child_marriage">বাল্য বিবাহের ঝুকি সম্পন্ন শিশু কি/না?</label>
                                        <select name="child_marriage" class=" form-control rounded">
                                            <option value="0">না</option>
                                            <option value="1">হ্যাঁ</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-sm-4 col-lg-3">
                                        <label for="drag_affect">মাদকাসক্ত কি/না?</label>
                                        <select name="drag_affect" class=" form-control rounded">
                                            <option value="0">না</option>
                                            <option value="1">হ্যাঁ</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-sm-4 col-lg-3">
                                        <label for="active_worker">কর্মক্ষম কি/না?</label>
                                        <select name="active_worker" class=" form-control rounded">
                                            <option value="0">না</option>
                                            <option value="1">হ্যাঁ</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-sm-6 col-lg-3">
                                        <label for="phy_disabled">শারিরীক ভাবে অক্ষম কি/না?</label>
                                        <select name="phy_disabled" class=" form-control rounded">
                                            <option value="0">না</option>
                                            <option value="1">হ্যাঁ</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-sm-6 col-lg-3">
                                        <label for="unemployed">বেকার কি/না?</label>
                                        <select name="unemployed" class=" form-control rounded">
                                            <option value="0">না</option>
                                            <option value="1">হ্যাঁ</option>
                                        </select>
                                    </div>

                                    {{-- @error('category_name')
                                        <li class="text-danger">{{ $message; }}</li>
                                    @enderror --}}
                                </div>
                                {{-- <div class="row mb-3">
                                    <div class="col-12 col-sm-6 col-lg-3">
                                        <label for="phy_diabled">শরিরীক ভাবে অক্ষম কি/না?</label>
                                        <select name="phy_diabled" class=" form-control rounded">
                                            <option value="0">না</option>
                                            <option value="1">হ্যাঁ</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-sm-6 col-lg-3">
                                        <label for="unemployed">বেকার কি/না?</label>
                                        <select name="unemployed" class=" form-control rounded">
                                            <option value="0">না</option>
                                            <option value="1">হ্যাঁ</option>
                                        </select>
                                    </div>
                                </div> --}}
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
                                        <label for="benifit_type">ভাতার ধরণ:</label>
                                        <select name="benifit_type" class="form-control rounded">
                                            <option value="1">মুক্তিযোদ্ধা</option>
                                            <option value="2">প্রতিবন্ধী</option>
                                            <option value="3">বিধবা</option>
                                            <option value="4">বয়স্ক</option>
                                            <option value="5">ভি ডব্লিউ ডি</option>
                                            <option value="6">মাতৃত্বকালীন</option>
                                            <option value="6">ভিক্ষুখ</option>
                                            <option value="0">অন্যান্য</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-sm-6 col-lg-3">
                                        <label for="holding_number">ভাতা পেয়েছেন কি না?:</label>
                                        <select name="stipen_type" class="form-control rounded">
                                            <option value="0">না</option>
                                            <option value="1">হ্যাঁ</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-sm-6 col-lg-3">
                                        <label for="khana_person_name">দপ্তরের নাম:</label>
                                        <select name="benifit_dept" class="form-control rounded">

                                            <option value="1">উপজেলা আনসার ও ভিডিপি</option>
                                            <option value="2">উপজেলা ফায়ার সার্ভিস ও সিভিল ডিফেন্স</option>
                                            <option value="3">উপজেলা স্বাস্থ্য কমপ্লেক্স </option>
                                            <option value="4">উপজেলা পরিবার পরিকল্পনা অফিস </option>
                                            <option value="5">উপজেলা হাসপাতাল স্বাস্থ্য কেন্দ্ </option>
                                            <option value="6">উপজেলা কৃষি দপ্তর</option>
                                            <option value="7">উপজেলা মৎস দপ্তর </option>
                                            <option value="8">উপজেলা খাদ্য নিয়ন্ত্রকের কার্যালয় </option>
                                            <option value="9">উপজেলা প্রাণী সম্পদ অফিস </option>
                                            <option value="10">উপজেলা সার পরিবেশকের কার্যালয় </option>
                                            <option value="11">উপজেলা ভূমি অফিস </option>
                                            <option value="12">উপজেলা সাব রেজিস্ট্রার অফিস </option>
                                            <option value="13">উপজেলা সেটেলমেন্ট অফিস </option>
                                            <option value="14">তথ্য ও যোগাযোগ প্রযুক্তি অধিদপ্তর </option>
                                            <option value="15">উপজেলা জনস্বাস্থ্য প্রকৌশল </option>
                                            <option value="16">উপজেলা সমাজসেবা কার্যালয় </option>
                                            <option value="17">উপজেলা মহিলা বিষয়ক অধিদপ্তর </option>
                                            <option value="18">উপজেলা যুব উন্নয়ন অধিদপ্তর </option>
                                            <option value="19">উপজেলা সমবায় অফিস </option>
                                            <option value="20">উপজেলা বিআরডিবি অফিস </option>
                                            <option value="21">একটি বাড়ি একটি খামার ও পল্লী সঞ্চয় ব্যাংক </option>
                                            <option value="22">উপজেলা এসএফডিএফ কার্যালয় </option>
                                            <option value="23">উপজেলা মাধ্যমিক শিক্ষা অফিস </option>
                                            <option value="24">উপজেলা নির্বাহী অফিসারের কার্যালয় </option>
                                            <option value="25">উপজেলা প্রকৌশলীর কার্যালয়</option>
                                            <option value="26">উপজেলা নির্বাচন অফিস </option>
                                            <option value="27">উপজেলা পল্লী সঞ্চয় ব্যাংক </option>
                                            <option value="28">উপজেলা হিসাব রক্ষণ অফিস</option>
                                            <option value="29">উপজেলা তথ্য কেন্দ্</option>
                                            <option value="30">উপজেলা রিসোর্স সেন্টার </option>
                                            <option value="31">উপজেলা প্রকল্প বাস্তবায়ন কর্মকর্তার অফিস </option>
                                            <option value="32">উপজেলা ডাকঘর </option>
                                            <option value="0">অন্যান্য</option>
                                            </select>
                                    </div>
                                    <div class="col-12 col-sm-6 col-lg-3">
                                        <label for="benifit_ammount">ভাতার পরিমাণ:</label>
                                        <input type="number" name="benifit_ammount" class="form-control rounded">
                                    </div>
                                    {{-- @error('category_name')
                                        <li class="text-danger">{{ $message; }}</li>
                                    @enderror --}}
                                </div>

                                <h4 class="card-title mt-3" style="text-align: center">অন্যান্য সুবিধার তথ্য</h4>
                                <div class="row mb-3 ">
                                    <div class="col-12 col-sm-6 col-lg-3">
                                        <label for="benifit_others">অন্যান্য সুবিধা পেয়েছেন কি না?</label>
                                        <select name="benifit_others" class="form-control rounded">
                                            <option value="0">না</option>
                                            <option value="1">হ্যাঁ</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-sm-6 col-lg-3">
                                        <label for="housing" >আশ্রয়ণ প্রকল্পের ঘর পেয়েছেন কি না?</label>
                                        <select  name="housing" class="form-control rounded">
                                            <option value="0">না</option>
                                            <option value="1">হ্যাঁ</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-sm-6 col-lg-3">
                                    <label for="grbenefit" >জিআর পেয়েছেন কি না?</label>
                                        <select  name="grbenefit" class="form-control rounded">
                                        <option value="0">না</option>
                                        <option value="1">হ্যাঁ</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-sm-6 col-lg-3">
                                        <label for="sealing_benefit" >ঢেউটিন পেয়েছেন কি না?</label>
                                        <select  name="sealing_benefit" class="form-control rounded">
                                            <option value="0">না</option>
                                            <option value="1">হ্যাঁ</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-sm-6 col-lg-3 mt-2">
                                         <label for="blanket_benefit" >কম্বোল পেয়েছেন কি না?</label>
                                        <select name="blanket_benefit" class="form-control rounded">
                                            <option value="0">না</option>
                                            <option value="1">হ্যাঁ</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-sm-6 col-lg-3 mt-2">
                                        <label for="tcb_benefit" >টিসিবি পেয়েছেন কি না?</label>
                                       <select name="tcb_benefit" class="form-control rounded">
                                           <option value="0">না</option>
                                           <option value="1">হ্যাঁ</option>
                                       </select>
                                   </div>
                                   <div class="col-12 col-sm-6 col-lg-3 mt-2">
                                        <label for="fifteentaka_benefit" >১৫টাকার চাউল পেয়েছেন কি না?</label>
                                        <select name="fifteentaka_benefit" class="form-control rounded">
                                            <option value="0">না</option>
                                            <option value="1">হ্যাঁ</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-sm-6 col-lg-3 mt-2">
                                        <label for="thirtytaka_benefit" >৩০টাকার চাউল পেয়েছেন কি না?</label>
                                        <select name="thirtytaka_benefit" class="form-control rounded">
                                            <option value="0">না</option>
                                            <option value="1">হ্যাঁ</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-sm-6 col-lg-3 mt-2">
                                        <label for="benefit_deserve" >ভাতা পাওয়ার যোগ্য কি না?</label>
                                        <select name="benefit_deserve" class="form-control rounded">
                                            <option value="0">না</option>
                                            <option value="1">হ্যাঁ</option>
                                        </select>
                                    </div>

                                </div>
                                {{-- প্রশিক্ষনের তথ্য end--}}
                                <h4 class="card-title" style="text-align: center">ঋণের তথ্য</h4>
                                <div class="row mb-3">
                                    <div class="col-12 col-sm-6 col-lg-3">
                                        <label for="lonee">ঋণ গ্রহন করেছেন কি না?:</label>
                                        <select name="lonee" class="form-control rounded">
                                            <option value="0">না</option>
                                            <option value="1">হ্যাঁ</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-sm-6 col-lg-3">
                                        <label for="lone_type" >ঋণের ধরণ:</label>
                                        <select  name="lone_type" class="form-control rounded">
                                            <option value="0"></option>
                                            <option value="1">ব্যবসা</option>
                                            <option value="2">কৃষি</option>
                                            <option value="3">শিক্ষা</option>
                                            <option value="4">গবাদীপশুপালন</option>
                                            <option value="5">কম্পিউটার প্রশিক্ষন</option>
                                            <option value="7">ফ্রীল্যাসিং প্রশিক্ষন</option>
                                            <option value="8">বিদেশ গমন</option>
                                            <option value="0">অন্যান্য</option>
                                            </select>
                                    </div>
                                    <div class="col-12 col-sm-6 col-lg-3">
                                        <label for="lone_dept">দপ্তরের নাম:</label>
                                        <select name="lone_dept" class="form-control rounded">

                                            <option value="1">উপজেলা আনসার ও ভিডিপি</option>
                                            <option value="2">উপজেলা ফায়ার সার্ভিস ও সিভিল ডিফেন্স</option>
                                            <option value="3">উপজেলা স্বাস্থ্য কমপ্লেক্স </option>
                                            <option value="4">উপজেলা পরিবার পরিকল্পনা অফিস </option>
                                            <option value="5">উপজেলা হাসপাতাল স্বাস্থ্য কেন্দ্ </option>
                                            <option value="6">উপজেলা কৃষি দপ্তর</option>
                                            <option value="7">উপজেলা মৎস দপ্তর </option>
                                            <option value="8">উপজেলা খাদ্য নিয়ন্ত্রকের কার্যালয় </option>
                                            <option value="9">উপজেলা প্রাণী সম্পদ অফিস </option>
                                            <option value="10">উপজেলা সার পরিবেশকের কার্যালয় </option>
                                            <option value="11">উপজেলা ভূমি অফিস </option>
                                            <option value="12">উপজেলা সাব রেজিস্ট্রার অফিস </option>
                                            <option value="13">উপজেলা সেটেলমেন্ট অফিস </option>
                                            <option value="14">তথ্য ও যোগাযোগ প্রযুক্তি অধিদপ্তর </option>
                                            <option value="15">উপজেলা জনস্বাস্থ্য প্রকৌশল </option>
                                            <option value="16">উপজেলা সমাজসেবা কার্যালয় </option>
                                            <option value="17">উপজেলা মহিলা বিষয়ক অধিদপ্তর </option>
                                            <option value="18">উপজেলা যুব উন্নয়ন অধিদপ্তর </option>
                                            <option value="19">উপজেলা সমবায় অফিস </option>
                                            <option value="20">উপজেলা বিআরডিবি অফিস </option>
                                            <option value="21">একটি বাড়ি একটি খামার ও পল্লী সঞ্চয় ব্যাংক </option>
                                            <option value="22">উপজেলা এসএফডিএফ কার্যালয় </option>
                                            <option value="23">উপজেলা মাধ্যমিক শিক্ষা অফিস </option>
                                            <option value="24">উপজেলা নির্বাহী অফিসারের কার্যালয় </option>
                                            <option value="25">উপজেলা প্রকৌশলীর কার্যালয়</option>
                                            <option value="26">উপজেলা নির্বাচন অফিস </option>
                                            <option value="27">উপজেলা পল্লী সঞ্চয় ব্যাংক </option>
                                            <option value="28">উপজেলা হিসাব রক্ষণ অফিস</option>
                                            <option value="29">উপজেলা তথ্য কেন্দ্</option>
                                            <option value="30">উপজেলা রিসোর্স সেন্টার </option>
                                            <option value="31">উপজেলা প্রকল্প বাস্তবায়ন কর্মকর্তার অফিস </option>
                                            <option value="32">উপজেলা ডাকঘর </option>
                                            <option value="0">অন্যান্য</option>
                                            </select>
                                    </div>
                                    <div class="col-12 col-sm-6 col-lg-3">
                                        <label for="lone_amount" >
                                            টাকার পরিমাণ::</label>
                                       <input type="text" name="lone_amount"  class="form-control rounded">
                                   </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-12 col-sm-6 col-lg-3">
                                        <label for="lone_duration" >সময়কাল(মাস):</label>
                                       <input type="text" name="lone_duration" placeholder="১ মাস-৬মাস/বছর" class="form-control rounded">
                                   </div>
                                   <div class="col-12 col-sm-3">
                                        <label for="lone_present" >ঋণের বতর্মান অবস্থা:</label>
                                        <select  name="lone_present" class="form-control rounded">
                                                <option value="0">স্থগিত</option>
                                                <option value="1">চলমান</option>
                                                <option value="2">পরিশোধিত</option>
                                                <option value="3">অপরিশোধিত</option>
                                        </select>
                                    </div>
                                </div>
                                {{-- কৃষকের তথ্য --}}
                                <h4 class="card-title" style="text-align: center">কৃষি তথ্য</h4>
                                <div class="row mb-3">
                                    <div class="col-12 col-sm-6 col-lg-3">
                                        <label for="farmer">কৃষক কি না?:</label>
                                        <select name="farmer" class="form-control rounded">
                                            <option value="0">না</option>
                                            <option value="1">হ্যাঁ</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-sm-6 col-lg-3">
                                        <label for="farmer_type" >কৃষকের ধরণ:</label>
                                        <select  name="farmer_type" class="form-control rounded">
                                            <option value="1">প্রান্তিক</option>
                                            <option value="2">খুদ্র</option>
                                            <option value="3">ভূমিহীন</option>
                                            </select>
                                    </div>
                                    <div class="col-12 col-sm-6 col-lg-3">
                                        <label for="agro_land">
                                            কৃষি জমির পরিমাণ (শতক):</label>
                                        <input type="number" name="agro_land" placeholder="২ শতাংশ"  class="form-control rounded">
                                    </div>
                                    <div class="col-12 col-sm-6 col-lg-3">
                                        <label for="non_agro_land" >
                                            অকৃষি জমির পরিমাণ (শতক):</label>
                                        <input type="number" name="non_agro_land"  placeholder="২ শতাংশ" class="form-control rounded">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-12 col-sm-6 col-lg-3">
                                        <label for="main_crop" >প্রধান ফসলের নাম:</label>
                                        <input type="text" name="main_crop" placeholder="ধান/গম ইত্যাদি" class="form-control rounded">
                                    </div>

                                    <div class="col-12 col-sm-6 col-lg-3">
                                        <label for="farmer_status">কৃষকের অবস্থা:</label>
                                        <select name="farmer_status" class="form-control rounded">
                                            <option value="0">নিম্ন</option>
                                            <option value="1">উত্তম</option>
                                            <option value="2">মধ্যম</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-sm-6 col-lg-3">
                                        <label for="agro_dept_facility" >কৃষি দপ্তরের প্রাপ্ত সুবিধা:</label>
                                        <input type="number" name="agro_dept_facility" placeholder="যেমন বীজ/সার গ্রহন"  class="form-control rounded">
                                    </div>
                                </div>
                                {{-- কৃষকের তথ্য end--}}

                                {{-- <div class="row mb-3">
                                    <div class="col-12 col-sm-6 col-lg-3">
                                        <label for="main_crop" >প্রধান ফসলের নাম:</label>
                                        <input type="text" name="main_crop" placeholder="ধান/গম িইত্যাদি" class="form-control rounded">
                                    </div>

                                    <div class="col-12 col-sm-6 col-lg-3">
                                        <label for="farmer_status">কৃষকের অবস্থা:</label>
                                        <select name="farmer_status" class="form-control rounded">
                                            <option value="0">নিম্ন</option>
                                            <option value="1">উত্তম</option>
                                            <option value="2">মধ্যম</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-sm-6 col-lg-3">
                                        <label for="agro_dept_facility" >কৃষি দপ্তরের প্রাপ্ত সুবিধা:</label>
                                        <input type="number" name="agro_dept_facility" placeholder="যেমন বীজ/সার গ্রহন"  class="form-control rounded">
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
                                      <label for="parmanent_address">স্থায়ী ঠিকানা (পাড়াসহ গ্রাম / মহল্লা):<span class="input_star"><span class="input_star">*</span></label>
                                      <input type="text" name="parmanent_address"   class="form-control rounded" >
                                  </div>
                                  <div class="col-12 col-sm-6 col-lg-3">
                                      <label for="religion" >ধর্ম:<span class="input_star">*</span></label>
                                      <select  name="religion" class="form-control rounded" >
                                          <option value="1">মুসলিম</option>
                                          <option value="2">হিন্দু</option>
                                          <option value="3">খ্রিষ্টান</option>
                                          <option value="4">বৌদ্ধ</option>
                                          <option value="5">অন্যান্য</option>
                                      </select>
                                  </div>
                                  <div class="col-12 col-sm-6 col-lg-3">
                                      <label for="proverty_margin">
                                          আর্থ সামাজিক অবস্থা:<span class="input_star">*</span></label>
                                      <select  name="proverty_margin" class="form-control rounded" >
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
                                      <input type="number" name="yearly_income"  placeholder="২০০০০ টাকা" class="form-control rounded" >
                                  </div>
                              </div>
                              <div class="row mb-3">
                                  <div class="col-12 col-sm-6 col-lg-3">
                                      <label for="sanitation" >ল্যাট্রিন ব্যবস্থা:<span class="input_star">*</span></label>
                                      <select name="sanitation" class="form-control rounded" >
                                          <option value="0">ল্যাট্রিন নাই</option>
                                          <option value="1">পাকা ল্যাট্রিন</option>
                                          <option value="2">রিং স্লাভ</option>
                                          <option value="3">কাঁচা ল্যাট্রিন</option>
                                          </select>
                                  </div>
                                  <div class="col-12 col-sm-6 col-lg-3">
                                      <label for="drinking_water">সুপেয় পানির ব্যবস্থা:</label>
                                      <select  name="drinking_water" class="form-control rounded">
                                          <option value="1">নলকূপ সরকারী</option>
                                          <option value="2">সুপেয় পানির ট্যাংক</option>
                                          <option value="3">নলকূপ ব্যক্তিগত</option>
                                          <option value="4">পানির ব্যবস্থা নাই</option>
                                      </select>
                                  </div>
                                  <div class="col-12 col-sm-6 col-lg-3">
                                      <label for="fish_pond" >মৎস ঘেরের সংখ্যা:</label>
                                      <input type="number" name="fish_pond" placeholder="0"   class="form-control rounded">
                                  </div>
                                  <div class="col-12 col-sm-6 col-lg-3">
                                      <label for="fish_pond_size">মৎস ঘেরের আয়তন (শতাংশ):</label>
                                      <input type="number" name="fish_pond_size" placeholder="১৬ শতাংশ"  class="form-control rounded">
                                  </div>
                              </div>
                              <div class="row mb-3">
                                  <div class="col-12 col-sm-6 col-lg-3">
                                      <label for="domistic_animal" >গৃহ পালিত পশুর সংখ্যা:</label>
                                      <input type="number" name="domistic_animal"   placeholder="0" class="form-control rounded">
                                  </div>
                                  <div class="col-12 col-sm-6 col-lg-3">
                                      <label for="electricity">বিদ্যুৎ ব্যবস্থা আছে কি/না?</label>
                                      <select  name="electricity" class="form-control rounded">
                                          <option value="0">না</option>
                                          <option value="1">হ্যাঁ</option>
                                      </select>
                                  </div>
                                  <div class="col-12 col-sm-6 col-lg-3">
                                      <label for="race" >ক্ষুদ্র নৃ-গোষ্ঠী কি/না?</label>
                                      <select  name="race" class="form-control rounded">
                                          <option value="0">না</option>
                                          <option value="1">হ্যাঁ</option>
                                      </select>
                                  </div>
                                  <div class="col-12 col-sm-6 col-lg-3">
                                      <label for="immigrant">প্রবাসীর সংখ্যা:</label>
                                      <input type="number" name="immigrant"  placeholder="0"  class="form-control rounded">
                                  </div>
                              </div>

                              <div class="row mb-3">
                                  <div class="col-12 col-sm-6 col-lg-3">
                                      <label for="total_tenant" >ভাড়াটিয়ার সংখ্যা:</label>
                                      <input type="number" name="total_tenant"   placeholder="0" class="form-control rounded">
                                  </div>
                                  <div class="col-12 col-sm-6 col-lg-3">
                                      <label for="motor_cycle">মটর বাইকের সংখ্যা:</label>
                                      <input type="number" name="motor_cycle"   placeholder="0" class="form-control rounded">
                                  </div>
                                  <div class="col-12 col-sm-6 col-lg-3">
                                      <label for="riksha_van" >ভ্যান / রিক্সার সংখ্যা:</label>
                                      <input type="number" name="riksha_van"   placeholder="0" class="form-control rounded">
                                  </div>
                                  <div class="col-12 col-sm-6 col-lg-3">
                                      <label for="auto_riksha_van">অটো ভ্যান / রিক্সার সংখ্যা:</label>
                                      <input type="number" name="auto_riksha_van"   placeholder="0" class="form-control rounded">
                                  </div>
                              </div>

                              <div class="row mb-3">
                                  <div class="col-12 col-sm-6 col-lg-3">
                                      <label for="cng_mahindra" >সিএনজি / মাহেন্দ্রের সংখ্যা:</label>
                                      <input type="number" name="cng_mahindra"   placeholder="0" class="form-control rounded">
                                  </div>
                                  <div class="col-12 col-sm-6 col-lg-3">
                                      <label for="easy_bike">ইজিবাইকের সংখ্যা:</label>
                                      <input type="number" name="easy_bike"   placeholder="0" class="form-control rounded">
                                  </div>
                                  <div class="col-12 col-sm-6 col-lg-3">
                                      <label for="boat" >ট্রলারের সংখ্যা:</label>
                                      <input type="number" name="boat"   placeholder="0" class="form-control rounded">
                                  </div>
                                  <div class="col-12 col-sm-6 col-lg-3">
                                      <label for="three_whiler">বাস/মিনিবাস/ট্রাক/থ্রি হুইলার</label>
                                      <input type="number" name="three_whiler"   placeholder="0" class="form-control rounded">
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
                                        <select class="form-control rounded" name="house_category">
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
                                        <label for="house_room">মোট কক্ষের সংখ্যা</label>
                                        <input type="number" name="house_room"   placeholder="0" class="form-control rounded">
                                    </div>
                                    <div class="col-12 col-sm-6 col-lg-3">
                                        <label for="house_use_type" >বাড়ীর ব্যবহারের ধরন:</label>
                                        <select class="form-control rounded" name="house_use_type">
                                            <option value="1">মালিক নিজে থাকেন</option>
                                            <option value="2">ভাড়া দেওয়া</option>
                                            <option value="3">উভয়</option>
                                            </select>
                                    </div>
                                    <div class="col-12 col-sm-6 col-lg-3">
                                        <label for="house_yearly_value">গৃহের বার্ষিক মূল্য:<span class="input_star">*</span></label>
                                        <input type="number" name="house_yearly_value"   placeholder="0" class="form-control rounded">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-12 col-12 col-sm-6 col-lg-3">
                                        <label for="three_whiler">ভুমির বার্ষিক ভাড়া মূল্য:<span class="land_yearly_rent"><span class="input_star">*</span></span></label>
                                        <input type="number" name="land_yearly_rent"   placeholder="0" class="form-control rounded">
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

    $('#khana_person_id').change(function(){
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
