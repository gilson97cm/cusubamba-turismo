<?php

namespace App\Http\Controllers\Address;

use App\Address\Canton;
use App\Address\Parish;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProvinceController extends Controller
{
    public function  getCanton(Request $request, $name){

      //  dd($name);
        if($request->ajax()){
            $cantons = Canton::cantons($name);
            return response()->json($cantons);
        }else{
            $cantons = Canton::cantons($name);
            //dd($cantons);
            return $cantons;
        }
    }
    public function  getParish(Request $request, $name){
        if($request->ajax()){
            $parishes = Parish::parishes($name);
            return response()->json($parishes);
        }
    }
}
