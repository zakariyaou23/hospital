<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){

        // for admin
        if(auth()->user()->role_id == 1){
            $infrastructures = DB::table('infrastructures')->select(['type'])->get();
            $data = [];
            $data['hospitals'] = $infrastructures->where('type','hospital')->count();
            $data['clinics'] = $infrastructures->where('type','clinic')->count();
            $data['pharmacies'] = $infrastructures->where('type','pharmacy')->count();
            $data['laboratories'] = $infrastructures->where('type','laboratoty')->count();
            return view('admin.dashboard', compact('data'));
        }else{
            return view('infrastructure.dashboard');
        }
    }
}
