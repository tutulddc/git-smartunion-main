<?php

namespace App\Http\Controllers;

use App\Models\Benefit_info;
use App\Models\Khana_personal_info;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class KhanaUpdateController extends Controller
{
    function khana_personal_info_update(Request $request, $unique_id){
        $personal_infos = Khana_personal_info::where('khana_person_unique_id', $unique_id)->first();

        if($request->khana_person_img == '' && $request->khana_house_img == ''){
            Khana_personal_info::where('khana_person_unique_id', $unique_id)->first()->update([
                'khana_person_name' => $request->khana_person_name,
                'khana_person_type'=>$request->khana_person_type,
                // 'khana_person_unique_id'=>$khana_person_unique_id,
                'khana_relation'=>$request->khana_relation,
                'father_name'=>$request->father_name,
                'mother_name'=>$request->mother_name,
                'husb_wife_name'=>$request->husb_wife_name,
                // 'khana_person_img'=>$person_img_file_name,
                // 'khana_house_img'=>$khana_house_img_file_name,
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
                'updated_at'=>Carbon::now(),

            ]);

            // return redirect()->route('category.edit')->with('update-success','Category Updated Successfully!');
            return back()->with('khanaSuccess','Data Updated Successfully');
        }
        else{



        $current_person_img = public_path('uploads/khana/persons/'.$personal_infos->khana_person_img);

        if ($personal_infos->khana_person_img && is_file($current_person_img)) {
            unlink($current_person_img);
        }

        $khana_person_img = $request->khana_person_img;

        // Make sure the file is present in the request before attempting to process it
        if ($khana_person_img) {
            $person_original_img = $khana_person_img->getClientOriginalName();
            $person_extension = pathinfo($person_original_img, PATHINFO_EXTENSION);
            $person_file_name = $unique_id . '.' . $person_extension;

            Image::make($khana_person_img)->save(public_path('uploads/khana/persons/'.$person_file_name));
        }



        $current_house_img = public_path('uploads/khana/houses/'.$personal_infos->khana_house_img);

        if ($personal_infos->khana_house_img && is_file($current_house_img)) {
            unlink($current_house_img);
        }

        $khana_house_img = $request->khana_house_img;

        // Make sure the file is present in the request before attempting to process it
        if ($khana_house_img) {
            $house_original_img = $khana_house_img->getClientOriginalName();
            $house_extension = pathinfo($house_original_img, PATHINFO_EXTENSION);
            $house_file_name = $unique_id . '.' . $house_extension;

            Image::make($khana_house_img)->save(public_path('uploads/khana/houses/'.$house_file_name));

        }

            Khana_personal_info::where('khana_person_unique_id', $unique_id)->first()->update([
                'khana_person_name' => $request->khana_person_name,
                'khana_person_type'=>$request->khana_person_type,
                // 'khana_person_unique_id'=>$khana_person_unique_id,
                'khana_relation'=>$request->khana_relation,
                'father_name'=>$request->father_name,
                'mother_name'=>$request->mother_name,
                'husb_wife_name'=>$request->husb_wife_name,
                'khana_person_img'=>$person_file_name,
                'khana_house_img'=>$house_file_name,
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
                'updated_at'=>Carbon::now(),

            ]);
            // return redirect()->route('category.edit')->with('success','Category Updated Successfully!');
            return back()->with('khanaSuccess','Data Updated Successfully');

        }
    }

    function khana_benefit_info_update(Request $request, $unique_id){
        Benefit_info::where('khana_person_unique_id', $unique_id)->first()->update([
            // 'benefit_info_unique_id'=>$benefit_info_unique_id,
            // 'khana_id'=>$khana_id,
            // 'union_id'=>$union_id,
            // 'ward_number'=>$request->ward_number,
            // 'holding_number'=>$request->holding_number,
            'khana_person_name'=>$request->khana_person_name,
            // 'khana_person_unique_id'=>$khana_person_unique_id,
            // 'khana_person_type'=>$request->khana_person_type,
            // 'khana_relation'=>$request->khana_relation,
            // 'nid_number'=>$request->nid_number,
            'benefit_type'=>$request->benefit_type,
            'benefit_confirm'=>$request->benefit_confirm,
            'benefit_dept'=>$request->benefit_dept,
            'benefit_amount'=>$request->benefit_amount,
            'updated_at'=>Carbon::Now(),
          ]);
          return back()->with('khanaSuccess','Data Updated Successfully');
    }
}
