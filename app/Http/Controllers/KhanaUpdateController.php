<?php

namespace App\Http\Controllers;

use App\Models\Benefit_info;
use App\Models\Family_info;
use App\Models\Farmer_info;
use App\Models\Khana_personal_info;
use App\Models\Loan_info;
use App\Models\Other_benefit;
use App\Models\Tax_holding;
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
            'khana_person_name'=>$request->khana_person_name,
            'benefit_type'=>$request->benefit_type,
            'benefit_confirm'=>$request->benefit_confirm,
            'benefit_dept'=>$request->benefit_dept,
            'benefit_amount'=>$request->benefit_amount,
            'updated_at'=>Carbon::Now(),
          ]);
        Other_benefit::where('khana_person_unique_id', $unique_id)->first()->update([
            'oth_benefit_conf'=>$request->oth_benefit_conf,
            'housing'=>$request->housing,
            'gr_benefit'=>$request->gr_benefit,
            'tin_benefit'=>$request->tin_benefit,
            'blanket_benefit'=>$request->blanket_benefit,
            'tcb_benefit'=>$request->tcb_benefit,
            'fifteentaka_benefit'=>$request->fifteentaka_benefit,
            'thirtytaka_benefit'=>$request->thirtytaka_benefit,
            'benefit_deserve'=>$request->benefit_deserve,
            'updated_at'=>Carbon::Now(),
          ]);
        Loan_info::where('khana_person_unique_id', $unique_id)->first()->update([
            'loan_conf'=>$request->loan_conf,
            'khana_person_name'=>$request->khana_person_name,
            'loan_type'=>$request->loan_type,
            'loan_dept'=>$request->loan_dept,
            'loan_amount'=>$request->loan_amount,
            'loan_duration'=>$request->loan_duration,
            'loan_present_cond'=>$request->loan_present_cond,
            'updated_at'=>Carbon::Now(),
          ]);
        Farmer_info::where('khana_person_unique_id', $unique_id)->first()->update([
            'farmer_conf'=>$request->farmer_conf,
            'khana_person_name'=>$request->khana_person_name,
            'farmer_type'=>$request->farmer_type,
            'agro_land'=>$request->agro_land,
            'non_agro_land'=>$request->non_agro_land,
            'main_crop'=>$request->main_crop,
            'farmer_status'=>$request->farmer_status,
            'agro_dept_facility'=>$request->agro_dept_facility,
            'updated_at'=>Carbon::Now(),
          ]);
          return back()->with('khanaSuccess','Data Updated Successfully');

    }

    function khana_family_info_update(Request $request, $khana_id){

        Family_info::where('khana_id', $khana_id)->first()->update([
            'per_address'=>$request->per_address,
            'religion'=>$request->religion,
            'poverty_margin'=>$request->poverty_margin,
            'yearly_income'=>$request->yearly_income,
            'sanitation'=>$request->sanitation,
            'drinking_water'=>$request->drinking_water,
            'fish_pond'=>$request->fish_pond,
            'fish_pond_area'=>$request->fish_pond_area,
            'domestic_animal'=>$request->domestic_animal,
            'electricity'=>$request->electricity,
            'race'=>$request->race,
            'total_tenant'=>$request->total_tenant,
            'immigrant'=>$request->immigrant,
            'motor_cycle'=>$request->motor_cycle,
            'rickshaw_van'=>$request->rickshaw_van,
            'auto_van'=>$request->auto_van,
            'cng_mahindra'=>$request->cng_mahindra,
            'easy_bike'=>$request->easy_bike,
            'boat'=>$request->boat,
            'bus_three_wheeler'=>$request->bus_three_wheeler,
            'updated_at'=>Carbon::Now(),
            ]);
            return back()->with('khanaSuccess','Data Updated Successfully');
    }

    function khana_tax_info_update(Request $request, $khana_id){
        Tax_holding::where('khana_id', $khana_id)->first()->update([
            'house_category'=>$request->house_category,
            'number_of_rooms'=>$request->number_of_rooms,
            'house_use_type'=>$request->house_use_type,
            'house_yearly_value'=>$request->house_yearly_value,
            'land_yearly_value'=>$request->land_yearly_value,
            'yearly_tax'=>$request->yearly_tax,
            'final_tax'=>$request->final_tax,
            'updated_at'=>Carbon::Now(),
            ]);
            return back()->with('khanaSuccess','Data Updated Successfully');
    }
}
