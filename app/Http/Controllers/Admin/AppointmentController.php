<?php

namespace App\Http\Controllers\Admin;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $appoinments = collect([]);

        if($request->has('infrastructure')){
            $appoinments = Appointment::where('infrastructure_id',$request->infrastructure)->get();
        }

        return view('admin.appointments.index', compact('appoinments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.appointments.create');
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
        return redirect()->route('admin.appointment.index')->with('success','Appointment added successfully');
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
        return view('admin.appointments.edit',compact('appointment'));
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
        return redirect()->route('admin.appointment.index')->with('success','Appointment updated successfully');
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
