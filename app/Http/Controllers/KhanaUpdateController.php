<?php

namespace App\Http\Controllers;

use App\Models\Khana_personal_info;
use Carbon\Carbon;
use Illuminate\Http\Request;

class KhanaUpdateController extends Controller
{
    function khana_personal_info_update(Request $request, $unique_id){
        Khana_personal_info::where('khana_person_unique_id', $unique_id)->first()->update([
            'khana_person_name' => $request->khana_person_name,
            'updated_at' => Carbon::now(),
        ]);
        return back();
        // return $unique_id;
    }
}
