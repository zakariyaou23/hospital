<?php

namespace App\Http\Controllers\Ajax;

use DataTables;
use App\Models\User;
use App\Models\Staff;
use App\Models\Transfer;
use App\Models\Department;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DataTableController extends Controller
{
    public function getInfrastructurePatients(){
        $patients = User::select([
            DB::raw('CASE WHEN last_name IS NOT NULL THEN CONCAT(first_name, \' \', last_name) ELSE first_name END AS name'),
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
                                <a class="dropdown-item" href="/infrastructure/patient/'.$data->patient_id.'"><i class="fa fa-eye m-r-5"></i> View</a>
                                <a class="dropdown-item" href="#" onclick="event.preventDefault(); deletePatient('.$data->id.');"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                            </div>
                        </div>';
                    })
                    ->rawColumns(['action'])
                    ->make(true);
    }

    public function getInfrastructureAppointments(){
        $appointments = Appointment::select([
            DB::raw('CASE WHEN doctors.last_name IS NOT NULL THEN CONCAT(doctors.first_name, \' \', doctors.last_name) ELSE doctors.first_name END AS doctor_name'),
            DB::raw('CASE WHEN patients.last_name IS NOT NULL THEN CONCAT(patients.first_name, \' \', patients.last_name) ELSE patients.first_name END AS patient_name'),
            'appointments.*',
            'departments.name as department_name'
        ])
        ->join('users AS doctors', 'appointments.doctor_id', '=', 'doctors.id')
        ->join('users AS patients', 'appointments.patient_id', '=', 'patients.id')
        ->join('departments', 'appointments.department_id', '=', 'departments.id')
        ->where('doctors.infrastructure_id',auth()->user()->infrastructure_id);
        return DataTables::of($appointments)
                    ->editColumn('status', function($data){
                        return '<span class="text-capitalize custom-badge '.($data->status == 'pending' ? 'status-orange':($data->status == 'approved' ? 'status-green':'status-red')).'">'.$data->status.'</span>';
                    })
                    ->addColumn('action', function($data){
                        return '
                        <div class="dropdown dropdown-action">
                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="/infrastructure/appointment/'.$data->id.'/edit"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                <a class="dropdown-item" href="#" onclick="event.preventDefault(); deleteAppointment('.$data->id.');"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                            </div>
                        </div>';
                    })
                    ->rawColumns(['status','action'])
                    ->make(true);
    }

    public function getInfrastructureTransfers(Request $request){
        $status = $request->get('status');
        $transfers = Transfer::select([
            DB::raw('CASE WHEN initiators.last_name IS NOT NULL THEN CONCAT(initiators.first_name, \' \', initiators.last_name) ELSE initiators.first_name END AS initiator_name'),
            DB::raw('CASE WHEN recipients.last_name IS NOT NULL THEN CONCAT(recipients.first_name, \' \', recipients.last_name) ELSE recipients.first_name END AS recipient_name'),
            DB::raw('CASE WHEN patients.last_name IS NOT NULL THEN CONCAT(patients.first_name, \' \', patients.last_name) ELSE patients.first_name END AS patient_name'),
            'transfers.*',
            'from_instrastructures.name as from_instrastructure',
            'to_instrastructures.name as to_instrastructure',
        ])
        ->leftJoin('users AS recipients', 'transfers.recipient_id', '=', 'recipients.id')
        ->join('users AS initiators', 'transfers.initiator_id', '=', 'initiators.id')
        ->join('users AS patients', 'transfers.patient_id', '=', 'patients.id')
        ->leftJoin('infrastructures AS from_instrastructures', 'transfers.from_infrastructure_id', '=', 'from_instrastructures.id')
        ->join('infrastructures AS to_instrastructures', 'transfers.to_infrastructure_id', '=', 'to_instrastructures.id')
        ->when($status == 'pending', function($query){
            return $query->where('transfers.to_infrastructure_id',auth()->user()->infrastructure_id);
        })
        ->when($status == 'initiated', function($query){
            return $query->where('transfers.from_infrastructure_id',auth()->user()->infrastructure_id);
        })
        ->when($status == 'approved', function($query){
            return $query->where('transfers.status','success')->where(function($q){
                return $q->where('transfers.to_infrastructure_id',auth()->user()->infrastructure_id)
                ->orWhere('transfers.from_infrastructure_id',auth()->user()->infrastructure_id);
            });
        })->when($status == 'refused', function($query){
            return $query->where('transfers.status','failed')->where(function($q){
                return $q->where('transfers.to_infrastructure_id',auth()->user()->infrastructure_id)
                ->orWhere('transfers.from_infrastructure_id',auth()->user()->infrastructure_id);
            });;
        });
        return DataTables::of($transfers)
                    ->editColumn('status', function($data){
                        return '<span class="text-capitalize custom-badge '.($data->status == 'pending' ? 'status-orange':($data->status == 'success' ? 'status-green':'status-red')).'">'.$data->status.'</span>';
                    })
                    ->addColumn('action', function($data){
                        return '
                        <div class="dropdown dropdown-action">
                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="/infrastructure/transfer/'.$data->id.'/edit"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                <a class="dropdown-item" href="#" onclick="event.preventDefault(); deleteTransfer('.$data->id.');"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                            </div>
                        </div>';
                    })
                    ->rawColumns(['status','action'])
                    ->make(true);
    }

    public function getInfrastructureDepartments(){
        $departments = Department::select([
            'id',
            'name',
            'description'
        ]);
        return DataTables::of($departments)
                    ->addColumn('action', function($data){
                        return '
                        <div class="dropdown dropdown-action">
                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="/infrastructure/department/'.$data->id.'/edit"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                <a class="dropdown-item" href="#" onclick="event.preventDefault(); deleteDepartment('.$data->id.');"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                            </div>
                        </div>';
                    })
                    ->rawColumns(['action'])
                    ->make(true);
    }

    public function getInfrastructureStaffs(Request $request){
        $role = $request->get('role');
        $staffs = Staff::select([
            'staffs.id',
            'staffs.user_id',
            'staffs.joining_date',
            DB::raw('CASE WHEN users.last_name IS NOT NULL THEN CONCAT(users.first_name, \' \', users.last_name) ELSE users.first_name END AS name'),
            'users.telephone',
            'users.email',
            'roles.name as role_name'
            ])
            ->join('users','staffs.user_id','=','users.id')
            ->join('roles','users.role_id','=','roles.id')
            ->where('users.infrastructure_id', auth()->user()->infrastructure_id)
            ->when($role, function($query, $role){
                return $query->where('users.role_id',$role);
            });
        return DataTables::of($staffs)
            ->editColumn('role_name', function($data){
                return '<span class="text-capitalize custom-badge '.($data->role_name == 'Nurse' ? 'status-green': ($data->role_name == 'Doctor'? 'status-blue':'status-grey')).'">'.$data->role_name.'</span>';
            })
            ->addColumn('action', function($data){
                return '
                <div class="dropdown dropdown-action">
                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="/infrastructure/'.($data->role_name == 'Doctor'? 'doctor':'staff').'/'.$data->id.'/edit"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                        <a class="dropdown-item" href="/infrastructure/'.($data->role_name == 'Doctor'? 'doctor':'staff').'/'.$data->id.'"><i class="fa fa-eye m-r-5"></i> View</a>
                        <a class="dropdown-item" href="#" onclick="event.preventDefault(); deleteStaff('.$data->user_id.');"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                    </div>
                </div>';
            })
            ->rawColumns(['role_name','action'])
            ->make(true);
    }

    public function getAdminStaffs(Request $request){
        $infrastructure = $request->get('infrastructure');
        $staffs = Staff::select([
            'staffs.id as staff_id',
            DB::raw('CASE WHEN users.last_name IS NOT NULL THEN CONCAT(users.first_name, \' \', users.last_name) ELSE users.first_name END AS name'),
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
