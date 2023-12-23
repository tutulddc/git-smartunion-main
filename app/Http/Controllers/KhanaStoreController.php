<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KhanaStoreController extends Controller
{
    function khana(){
        return view('admin.khana.khana');
    }

    function khana_store(){
        echo "hi";
    }
}
