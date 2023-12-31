<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Division;
use App\Models\Union;
use App\Models\Upazila;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Validation\Rules\Password;
use Intervention\Image\Facades\Image;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Exists;
use PHPUnit\Framework\Constraint\FileExists;

class UserController extends Controller
{
    function user_list(){
        // $users = User::all();
        $divisions = Division::all();
        $districts = District::all();
        $upazilas = Upazila::all();
        $unions = Union::all();
        $users = User::where('id', '!=', Auth::id())->get();
        return view('admin.user.user_list',[
            'users' => $users,
            'divisions' => $divisions,
            'districts' => $districts,
            'upazilas' => $upazilas,
            'unions' => $unions,
        ]);
    }

    function custom_register(Request $request){
        $user_id = Carbon::now()->format('dmy-his')."-".random_int(1000, 9000);
        // $user_id = $request->division.$request->district.$request->upazila.$request->union.Carbon::now()->format('d-m-y')."-".random_int(1000, 9000);
        // echo $user_id;
        // die();
        $request->validate([
            'name'=>'required',
            'department'=>'required',
            'password'=>'required',
            // 'division'=>'required',
            // 'district'=>'required',
        ]);


        User::insert([
            'user_id'=> $user_id,
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> bcrypt($request->password),
            'department'=> $request->department,
            'division_id'=> $request->division,
            'district_id'=> $request->district,
            'upazila_id'=> $request->upazila,
            'union_id'=> $request->union,
            'created_at'=> Carbon::now(),
        ]);
        // echo "Data Inserted Successfully";
        return back()->with('success','New User Added');
    }

    function user_remove($user_id){
        User::find($user_id)->delete();
        return back()->with('delete', 'User Deleted Successfully!');
    }


    //profile
    function user_profile(){
        // $users = User::all();
        $users = User::where('id', '!=', Auth::id())->get();
        return view('admin.user.user_profile',[
            'users' => $users,
        ]);
    }
    function user_profile_update(Request $request){

        // echo "hi";

        $request->validate([
            'name' => 'required',
            // 'email' => 'email:rfc,dns | required',
        ]);

        User::find(Auth::id())->update([
            'name'=> $request->name,
            'email'=> $request->email
        ]);

        return back()->with('success', 'Name or Email Updated Successfully!2');
    }



    function password_update(Request $request){

        // echo "hi";

        // die();

        $request->validate([
            'old_password' => 'required',
            // 'password' => ['required', 'confirmed', 'min:8', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]+$/'],
            'password' => ['required', 'confirmed', Password::defaults()
            ->letters()
            ->numbers()
            ->mixedCase()
            ->numbers()
            ->symbols()
        ],

            'password_confirmation' => 'required',
        ]);

        $user = User::find(Auth::id());
        if(password_verify($request->old_password, $user->password)){
            User::find(Auth::id())->update([
                'password'=>bcrypt($request->password)
            ]);
            return back()->with('pass-update', 'Password Updated!');
        }
        else{
            return back()->with('current-pass', 'Wrong Old Password');
        }

        // return back();
    }//end method


    //PHOTO UPDATE
    function user_photo_update(Request $request){

        $request->validate([
            'logo'=>'required',
        ]);

        // Validator::validate($request->all(), [
        //     'logo' => [
        //         'required',
        //         File::image()
        //             ->types(['png', 'jpg', 'jpeg'])
        //             ->min(2)
        //             ->max(500)
        //             ->dimensions(
        //                 Rule::dimensions()
        //                     ->maxWidth(1000)
        //                     ->maxHeight(1000)
        //             )
        //     ]
        // ]);

        // $request->validate([
        //     'photo'=>'required | mimes:png,jpg ',

        // ]);


        if(Auth::user()->logo == null){
            $logo = $request->logo;
            $extension = $logo->extension();
            $filename = Auth::id().".".$extension;
            $image = Image::make($logo)->resize(300, 200)->save(public_path('uploads/user/'.$filename));

            User::find(Auth::id())->update([
                'logo'=> $filename,
            ]);
            return back()->with('photo-update', 'Photo Updated Successfully!');
        }
        else{


            $present_logo = public_path(('uploads/user/').Auth::user()->logo);
            if(file_exists('$present_logo')){

                unlink($present_logo);
            }

            $logo = $request->logo;
            $extension = $logo->extension();
            $filename = Auth::id().".".$extension;

            $image = Image::make($logo)->resize(300, 200)->save(public_path('uploads/user/'.$filename));

            // echo $filename;
            // die();
            User::where('id',Auth::id())->update([
                'logo'=>$filename,
            ]);

            return back()->with('photo-update', 'Photo Updated Successfully!2');
        }

   }


   function getDistrict(Request $request){
        // echo "hi";
        $str = '<option value="">Select District</option>';
        $str = '<option value="">All District</option>';
        $districts = District::where('division_id', $request->division_id)->get();
        foreach($districts as $district){
            // $str = '<option value="'.$district->id.'">Select District</option>';
            $str .= '<option value="'.$district->id.'">'.$district->bn_name.'</option>';
        }
        echo $str;
    }
   function getUpazila(Request $request){
        $str = '<option value="">Select Upazila</option>';
        $str = '<option value="">All Upazila</option>';
        $upazilas = Upazila::where('district_id', $request->district_id)->get();
        foreach($upazilas as $upazila){
            $str .= '<option value="'.$upazila->id.'">'.$upazila->bn_name.'</option>';
        }
        echo $str;
    }
   function getUnion(Request $request){
        $str = '<option value="">Select Union</option>';
        $str = '<option value="">All Union</option>';
        $unions = Union::where('upazilla_id', $request->upazila_id)->get();
        foreach($unions as $union){
            $str .= '<option value="'.$union->id.'">'.$union->bn_name.'</option>';
        }
        echo $str;

    }

}
