<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AjaxController extends Controller
{
    public function getInfrastructures(Request $request){
        $infrastructures = DB::table('infrastructures')
            ->where('type',$request->type)
            ->pluck('name','id');
        return response()->json($infrastructures);
    }
}
