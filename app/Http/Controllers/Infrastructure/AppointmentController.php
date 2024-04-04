<?php

namespace App\Http\Controllers\Infrastructure;

use App\Models\User;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('infrastructure.appointments.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $patients = User::select([
            DB::raw('IF(last_name IS NOT NULL, CONCAT(first_name, " ", last_name), first_name) AS name'),
            'id'
        ])
        ->where('role_id',3)
        ->where('infrastructure_id',auth()->user()->infrastructure_id)
        ->pluck('name','id')
        ->toArray();
        $departments = DB::table('departments')
        ->pluck('name','id')
        ->toArray();
        return view('infrastructure.appointments.create', compact('patients','departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'patient' => 'required|exists:users,id',
            'doctor' => 'required|exists:users,id',
            'department' => 'required|exists:departments,id',
            'date' => 'required|date',
            'time' => 'required',
            'description' => 'nullable',
        ]);

        Appointment::create([
            'patient_id' => $request->get('patient'),
            'doctor_id' => $request->get('doctor'),
            'department_id' => $request->get('department'),
            'date' => $request->get('date'),
            'time' => $request->get('time'),
            'description' => $request->get('description'),
        ]);
        return redirect()->route('infrastructure.appointment.index')->with('success','Appointment added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $appointment = Appointment::findOrFail($id);
        $users =  User::select([
            DB::raw('IF(last_name IS NOT NULL, CONCAT(first_name, " ", last_name), first_name) AS name'),
            'id',
            'role_id'
        ])
        ->whereIn('role_id',[3,4])
        ->where('infrastructure_id',auth()->user()->infrastructure_id)
        ->get();
        $doctors = $users->filter(fn($user) => $user->role_id == 4)
        ->pluck('name','id')
        ->toArray();
        $patients =  $users->filter(fn($user) => $user->role_id == 3)
        ->pluck('name','id')
        ->toArray();
        $departments = DB::table('departments')
        ->pluck('name','id')
        ->toArray();

        return view('infrastructure.appointments.edit',compact('appointment', 'patients','doctors','departments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'patient' => 'required|exists:users,id',
            'doctor' => 'required|exists:users,id',
            'department' => 'required|exists:departments,id',
            'date' => 'required|date',
            'time' => 'required',
            'status' => ['required',Rule::in(['pending','approved','refused'])],
            'description' => 'nullable',
        ]);

        Appointment::where('id',$id)->update([
            'patient_id' => $request->get('patient'),
            'doctor_id' => $request->get('doctor'),
            'department_id' => $request->get('department'),
            'date' => $request->get('date'),
            'status' => $request->get('status'),
            'time' => $request->get('time'),
            'description' => $request->get('description'),
        ]);
        return redirect()->route('infrastructure.appointment.index')->with('success','Appointment updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Appointment::where('id',$id)->delete();
        return redirect()->back()->with('success','Appointment updated successfully');
    }
}
