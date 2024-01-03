<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Khana_personal_info;

class TaxController extends Controller
{
    function holding_tax(){

        return view('admin.taxs.holding_tax');
    }

    function search_khana(Request $request){
        $request->validate([
            'ward_id'=>'required',
            'khana_id'=>'required',
        ],
        [
            'ward_id.required'=>'আপনার ওয়ার্ড নাম্বার লিখুন',
            'khana_id.required'=>'আপনার খানা / পরিবারে আইডি লিখুন', 
        ]);
        if(Khana_personal_info::where('ward_number',$request->ward_id)->where('khana_id',$request->khana_id)->exists()){
            $khana_info = Khana_personal_info::where('ward_number',$request->ward_id)->where('khana_id',$request->khana_id)->first();
            return view('admin.taxs.holding_tax_list',[
                'khana_info'=>$khana_info,
            ]);
        }else{
           return back()->with('not_exists','আপনার ওয়ার্ড এবং খানা আইডি ডাটাবেজের সাথে মিলতেছে না');
        }
        
    }
}
