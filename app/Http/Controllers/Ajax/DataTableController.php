<?php

namespace App\Http\Controllers\Ajax;

use DataTables;
use App\Models\User;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DataTableController extends Controller
{
    public function getInfrastructurePatients(){
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
        ->where('infrastructure_id',auth()->user()->infrastructure_id);
        return DataTables::of($patients)
                    ->addColumn('action', function($data){
                        return '
                        <div class="dropdown dropdown-action">
                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="/infrastructure/patient/'.$data->patient_id.'/edit"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                <a class="dropdown-item" href="#" onclick="event.preventDefault(); deletePatient('.$data->id.');"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                            </div>
                        </div>';
                    })
                    ->rawColumns(['action'])
                    ->make(true);
    }

    public function getInfrastructureStaffs(Request $request){
        $infrastructure = $request->get('infrastructure');
        $staffs = Staff::select([
            'staffs.id as staff_id',
            DB::raw('IF(users.last_name IS NOT NULL, CONCAT(users.first_name, " ", users.last_name), users.first_name) AS name'),
            'users.address',
            'users.telephone',
            'users.id',
            'users.email',
            'users.infrastructure_id',
            'departments.name as department_name',
            'infrastructures.name as infrastructure_name',
            'roles.name as role_name'
            ])
            ->leftJoin('departments','staffs.department_id','=','departments.id')
            ->join('users','staffs.user_id','=','users.id')
            ->join('roles','users.role_id','=','roles.id')
            ->join('infrastructures','users.infrastructure_id','=','infrastructures.id')
            ->when($infrastructure, function($query,$infrastructure){
                return $query->where('users.infrastructure_id',$infrastructure);
            });
        return DataTables::of($staffs)
            ->addColumn('action', function($data){
                return '
                <div class="btn-group">
                    <a href="/infrastructure/staff/'.$data->staff_id.'/edit"
                        class="text-primary w-50 mr-2"><i class="fas fa-edit"></i></a>
                    <a href="" onclick="event.preventDefault(); deleteStaff('.$data->id.');" class="text-danger w-50"><i
                            class="fas fa-trash"></i></a>
                </div>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function getAdminStaffs(Request $request){
        $infrastructure = $request->get('infrastructure');
        $staffs = Staff::select([
            'staffs.id as staff_id',
            DB::raw('IF(users.last_name IS NOT NULL, CONCAT(users.first_name, " ", users.last_name), users.first_name) AS name'),
            'users.address',
            'users.telephone',
            'users.id',
            'users.email',
            'users.infrastructure_id',
            'departments.name as department_name',
            'infrastructures.name as infrastructure_name',
            'roles.name as role_name'
            ])
            ->leftJoin('departments','staffs.department_id','=','departments.id')
            ->join('users','staffs.user_id','=','users.id')
            ->join('roles','users.role_id','=','roles.id')
            ->join('infrastructures','users.infrastructure_id','=','infrastructures.id')
            ->when($infrastructure, function($query,$infrastructure){
                return $query->where('users.infrastructure_id',$infrastructure);
            });
        return DataTables::of($staffs)
            ->addColumn('action', function($data){
                return '
                <div class="btn-group">
                    <a href="/admin/staff/'.$data->staff_id.'/edit"
                        class="text-primary w-50 mr-2"><i class="fas fa-edit"></i></a>
                    <a href="" onclick="event.preventDefault(); deleteStaff('.$data->id.');" class="text-danger w-50"><i
                            class="fas fa-trash"></i></a>
                </div>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
