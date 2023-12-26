<?php

namespace App\Http\Controllers;

use App\Models\Benefit_info;
use App\Models\Khana_personal_info;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;


class KhanaStoreController extends Controller
{
    function khana(){
        return view('admin.khana.khana');
    }

    function khana_store(Request $request){
        $division_id = Auth::user()->division_id;
        $district_id = Auth::user()->district_id;
        $upazila_id = Auth::user()->upazila_id;
        $union_id = Auth::user()->union_id;
        $khana_id = $division_id.$district_id.$upazila_id.$union_id.$request->ward_number.$request->holding_number;
        $khana_person_unique_id = $request->khana_person_type.$request->ward_number.$request->holding_number."-".random_int(1000, 9000);

        $benefit_info_unique_id = $request->khana_person_type.$request->ward_number.$request->holding_number."-".random_int(1000, 9000)."-".$request->benefit_type;

        $request->validate([
            'ward_number'=>'required',
            'holding_number'=>'required',
            'khana_person_name'=>'required',
            'khana_person_type'=>'required',
            'khana_relation'=>'required',
            'father_name'=>'required',
            'mother_name'=>'required',
            'husb_wife_name'=>'required',
            'pres_address'=>'required',
            'dob'=>'required',
            'phone'=>'required',
            'gender'=>'required',
            'education'=>'required',
            'occupation'=>'required',

        ],
        [
            // 'holding_number.required' => 'হোল্ডিং নাম্বার লিখুন',
            // 'holding_number.required' => 'হোল্ডিং নাম্বার লিখুন'
            'ward_number.required' => 'ওয়ার্ড নাম্বার',
            'holding_number.required' => 'হোল্ডিং নাম্বার',
            'khana_person_name.required' => 'খানা ব্যক্তির (সদস্যের) নাম',
            'khana_person_type.required' => 'খানা ব্যক্তির ধরন',
            'khana_relation.required' => 'খানা প্রধানের সাথে সম্পর্ক',
            'father_name.required' => 'পিতার নাম',
            'mother_name.required' => 'মাতার নাম',
            'husb_wife_name.required' => 'স্বামী/স্ত্রীর নাম',
            'pres_address.required' => 'বতর্মান ঠিকানা',
            'dob.required' => 'জন্ম তারিখ',
            'phone.required' => 'মোবাইল নাম্বার',
            'gender.required' => 'জেন্ডার',
            'education.required' => 'শিক্ষাগত যোগ্যতা',
            'occupation.required' => 'পেশা',
        ],
        );

        Khana_personal_info::insert([
            'division_id'=>$division_id,
            'district_id'=>$district_id,
            'upazila_id'=>$upazila_id,
            'union_id'=>$union_id,
            'ward_number'=>$request->ward_number,
            'khana_id'=>$khana_id,
            'holding_number'=>$request->holding_number,
            'khana_person_name'=>$request->khana_person_name,
            'khana_person_type'=>$request->khana_person_type,
            'khana_person_unique_id'=>$khana_person_unique_id,
            'khana_relation'=>$request->khana_relation,
            'father_name'=>$request->father_name,
            'mother_name'=>$request->mother_name,
            'husb_wife_name'=>$request->husb_wife_name,
            // 'khana_person_img'=>$khana_person_file_name,
            // 'khana_house_img'=>$khana_house_file_name,
            'pres_address'=>$request->pres_address,
            'nid_number'=>$request->nid_number,
            'birth_number'=>$request->birth_number,
            'phone'=>$request->phone,
            'dob'=>$request->dob,
            'gender'=>$request->gender,
            'education'=>$request->education,
            'occupation'=>$request->occupation,
            'passport'=>$request->passport,
            'driving_lice'=>$request->driving_lice,
            'freedom_fighter'=>$request->freedom_fighter,
            'ff_number'=>$request->ff_number,
            'quater_house'=>$request->quater_house,
            'child_education'=>$request->child_education,
            'primary_stipend'=>$request->primary_stipend,
            'mid_stipend'=>$request->mid_stipend,
            'high_stipend'=>$request->high_stipend,
            'stipend_amount'=>$request->stipend_amount,
            'dropped_child'=>$request->dropped_child,
            'child_marriage'=>$request->child_marriage,
            'drag_affect'=>$request->drag_affect,
            'active_worker'=>$request->active_worker,
            'phy_disabled'=>$request->phy_disabled,
            'unemployed'=>$request->unemployed,
            'created_at'=>Carbon::Now(),
          ]);
        Benefit_info::insert([

            'benefit_info_unique_id'=>$benefit_info_unique_id,
            'khana_id'=>$khana_id,
            'union_id'=>$union_id,
            'ward_number'=>$request->ward_number,
            'holding_number'=>$request->holding_number,
            'khana_person_name'=>$request->khana_person_name,
            'khana_person_unique_id'=>$khana_person_unique_id,
            'khana_person_type'=>$request->khana_person_type,
            'khana_relation'=>$request->khana_relation,
            'nid_number'=>$request->nid_number,
            'benefit_type'=>$request->benefit_type,
            'benefit_confirm'=>$request->benefit_confirm,
            'benefit_dept'=>$request->benefit_dept,
            'benefit_amount'=>$request->benefit_amount,
            'created_at'=>Carbon::Now(),
          ]);
        return "Inserted Successfully";
        // echo "hi";
    }

    // function khana_store(Request $request){

    //     $division_id = Auth::user()->division_id;
    //     $district_id = Auth::user()->district_id;
    //     $upazila_id = Auth::user()->upazila_id;
    //     $union_id = Auth::user()->union_id;
    //     $khana_id = $division_id.$district_id.$upazila_id.$union_id.$request->ward_number.$request->holding_number;
    //     $khana_person_id = $division_id.$district_id.$upazila_id.$union_id.$request->ward_number.$request->holding_number."-".random_int(1000, 9000);

    //     $request->validate([
    //         'division_id'=>'required',
    //         'district_id'=>'required',
    //         'upazila_id'=>'required',
    //         'ward_number'=>'required',
    //         'holding_number'=>'required',
    //         'khana_person_name' =>'required',
    //         'khana_member_name' =>'required',
    //         'khana_relation' =>'required',
    //         'father_name' =>'required',
    //         // 'khana_person_img' =>'required|file|max:300|mimes:jpg,bmp,png',
    //         // 'khana_house_img' =>'required|file|max:300|mimes:jpg,bmp,png',
    //         'pres_address'=>'required',
    //         'phone'=>'required',
    //         'dob'=>'required',
    //         'gender'=>'required',
    //         'education'=>'required',
    //         'occupation'=>'required'
    //       ],
    //       [
    //         'ward_number.required' => 'ওয়ার্ড নাম্বার লিখুন',
    //         'holding_number.required' => 'হোল্ডিং নাম্বার লিখুন',
    //         'khana_person_name.required' => 'খানা প্রধানের নাম',
    //         'khana_member_name.required' => 'খানার সদস্য নাম',
    //         'khana_relation.required' => 'খানা প্রধানের সাথে সম্পর্ক',
    //         'father_name.required' => 'পিতার নাম লিখুন',
    //         // 'khana_person_img.required' => 'খানা ব্যক্তির ছবি',
    //         // 'khana_house_img.required' => 'খানা বাড়ির ছবি',
    //         'pres_address.required' => 'বর্তমান ঠিকানা লিখুন',
    //         'phone.required' => 'মোবাইল নাম্বার লিখুন',
    //         'dob.required' => 'জন্ম তারিখ লিখুন',
    //         'gender.required' => 'পুরুষ/মহিলা সিলেক্ট করুন',
    //         'education.required' => 'শিক্ষকতা যোগ্যতা লিখুন',
    //         'occupation.required' => 'পেশা সিলেক্ট করুন',
    //       ]
    //     );

    //     // return $request->all();
    //     // die();

    //     // $user_id = $request->division.$request->district.$request->upazila.$request->union.Carbon::now()->format('d-m-y')."-".random_int(1000, 9000);
    //     // echo $user_id;
    //     // echo $division_id."<br>";
    //     // echo $district_id."<br>";
    //     // echo $upazila_id."<br>";
    //     // echo $union_id."<br>";
    //     // echo $request->ward_number."<br>";
    //     // echo $request->holding_number."<br>-";
    //     // echo random_int(1000, 9000);
    //     // echo $khana_id ."<br>";
    //     // echo $khana_person_id ."<br>";
    //     return $request->khana_relation;
    // }



    function getPersonid(){
        // echo "hi";
        $str = '<option value="0">স্বীয়(self)</option>';
        // $str = '<option value="">All District</option>';
        // $districts = District::where('division_id', $request->division_id)->get();
        // foreach($districts as $district){
        //     $str .= '<option value="'.$district->id.'">'.$district->bn_name.'</option>';
        // }
        echo $str;
    }
    function getPersonid1(){
        // echo "hi";
        echo  '<option value="">সিলেক্ট করুন</option>';
        // echo  '<option value="0"> </option>';
        echo  '<option value="1">স্বামী</option>';
        echo  '<option value="2">স্ত্রী</option>';
        echo  '<option value="3">ছেলে</option>';
        echo  '<option value="4">মেয়ে</option>';
        echo  '<option value="5">ভাই</option>';
        echo  '<option value="6">বোন</option>';
        echo  '<option value="7">বাবা</option>';
        echo  '<option value="8">মা</option>';
        echo  '<option value="9">চাচা</option>';
        echo  '<option value="10">চাচি</option>';
        echo  '<option value="11">খালা</option>';
        echo  '<option value="12">খালু</option>';
        echo  '<option value="13">ফুফা</option>';
        echo  '<option value="14">ফুফু</option>';
        echo  '<option value="15">পোতা</option>';
        echo  '<option value="16">পুত্নি</option>';
        echo  '<option value="17">নাতি</option>';
        echo  '<option value="18">নাতনি</option>' ;

        // echo  '<option value="19">অন্যান্য</option>' ;
        // $str2 = '<option value="">Select Please</option>';
        // $str = '<option value="">All District</option>';
        // $districts = District::where('division_id', $request->division_id)->get();
        // foreach($districts as $district){
        //     $str .= '<option value="'.$district->id.'">'.$district->bn_name.'</option>';
        // }
        // echo $str."<br>";
        // echo $str2."<br>";
    }
}
