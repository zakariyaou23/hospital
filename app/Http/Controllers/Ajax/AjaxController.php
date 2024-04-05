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

    public function getDoctorsPerDepartment(Request $request){
        $infrastructure = $request->get('infrastructure');
        $doctors = DB::table('users')
        ->select([
            DB::raw('IF(users.last_name IS NOT NULL, CONCAT(users.first_name, " ", users.last_name), users.first_name) AS name'),
            'users.id as id'
        ])
        ->join('staffs','users.id','=','staffs.user_id')
        ->where('users.role_id', 4)
        ->where('staffs.department_id',$request->get('department'))
        ->when($infrastructure, function ($query, $infrastructure){
            return $query->where('users.infrastructure_id', $infrastructure);
        })
        ->pluck('name','id');
        return response()->json($doctors);
    }
}
