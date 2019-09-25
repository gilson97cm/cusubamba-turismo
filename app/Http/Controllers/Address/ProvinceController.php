<?php

namespace App\Http\Controllers\Address;

use App\Address\Canton;
use App\Address\Parish;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProvinceController extends Controller
{
    public function  getCanton(Request $request ,$name){
       // $name = $request->get('id'); // el id se envia por parametro ya que el request no envia el id por que la pagina no utiliza el submit
       // dd($name);
        if($request->ajax()){
            $cantons = Canton::name_province($name)->get();
            //dd($cantons);
            return response()->json($cantons);
        }else{
            $cantons = Canton::name_province($name)->get();
            //dd($cantons);
            return $cantons;
        }
    }
    public function  getParish(Request $request, $name){
       // $name = $request->get('id');
        if($request->ajax()){
            $parishes = Parish::name_canton($name)->get();
            return response()->json($parishes);
        }
    }
}
