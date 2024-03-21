<?php

namespace App\Http\Controllers\Ajax;

use DataTables;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DataTableController extends Controller
{
    public function getPatients(){
        $patients = User::select([
            DB::raw('IF(last_name IS NOT NULL, CONCAT(first_name, " ", last_name), first_name) AS name'),
            'date_of_birth',
            'telephone',
            'email',
            'address',
            'patients.id as patient_id'
        ])
        ->join('patients','users.id','=','patients.user_id')
        ->where('role_id',3)
        ->where('infrastructure_id',auth()->user()->infrastructure_id)
        ->get();
        return DataTables::of($patients)
                    ->addColumn('action', function($data){
                        return '
                        <div class="dropdown dropdown-action">
                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="/infrastructure/patient/'.$data->patient_id.'/edit"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                <a class="dropdown-item deletePatient" href="#" data-toggle="modal" id="'.$data->id.'" data-id="'.$data->id.'" data-target="#delete_patient"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                            </div>
                        </div>';
                    })
                    ->rawColumns(['action'])
                    ->make(true);
    }
}
