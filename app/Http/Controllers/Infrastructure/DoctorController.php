<?php

namespace App\Http\Controllers\Infrastructure;

use App\Models\User;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = User::select([
            DB::raw('IF(last_name IS NOT NULL, CONCAT(first_name, " ", last_name), first_name) AS name'),
            'departments.name as department_name',
            'address',
            'photo',
            'users.id',
            'staffs.id as staff_id'
        ])
        ->join('staffs','users.id','=','staffs.user_id')
        ->join('departments','staffs.department_id','departments.id')
        ->where('users.role_id',4)
        ->get();
        return view('infrastructure.doctors.index',compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subdivisions = DB::table('subdivisions')
            ->select([
                'subdivisions.id',
                DB::raw('CONCAT(subdivisions.name,", ",divisions.name,", ",regions.name) as name')
            ])
            ->join('divisions','subdivisions.division_id','=','divisions.id')
            ->join('regions','divisions.region_id','=','regions.id')
            ->orderBy('name')
            ->pluck('name','id')->toArray();
        $departments = DB::table('departments')
            ->pluck('name','id')->toArray();
        return view('infrastructure.doctors.create',compact('subdivisions','departments'));
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
            'first_name' => 'required|string',
            'last_name' => 'nullable|string',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|min:8',
            'telephone' => 'required',
            'date_of_birth' => 'required|date',
            'gender' => ['required', Rule::in(['Male','Female'])],
            'national_identity_card' => 'nullable|unique:users,national_identity_card',
            'address' => 'required',
            'subdivision' => 'required|exists:subdivisions,id',
            'reference' => 'nullable|unique:staffs,reference_id',
            'department' => 'required|exists:departments,id',
            'marital_status' => 'required',
            'joining_date' => 'required|date',
            'salary' => 'required|numeric|gte:0',
            'contract_type' => 'required',
        ]);

        try{
            DB::transaction(function() use ($request){
                $user = User::create([
                    'role_id' => 4,
                    'first_name' => $request->get('first_name'),
                    'last_name' => $request->get('last_name'),
                    'telephone' => $request->get('telephone'),
                    'email' => $request->get('email'),
                    'date_of_birth' => $request->get('date_of_birth'),
                    'gender' => $request->get('gender'),
                    'password' => Hash::make($request->get('password')),
                    'national_identity_card' => $request->get('national_identity_card'),
                    'address' => $request->get('address'),
                    'subdivision_id' => $request->get('subdivision'),
                    'infrastructure_id' => auth()->user()->infrastructure_id,
                ]);

                Staff::create([
                    'user_id' => $user->id,
                    'reference_id' => $request->get('reference'),
                    'department_id' => $request->get('department'),
                    'joining_date' => $request->get('joining_date'),
                    'marital_status' => $request->get('marital_status'),
                    'salary' => $request->get('salary'),
                    'contract_type' => $request->get('contract_type')
                ]);
            });
        }catch(\Exception $e){
            return redirect()->back()->with('error', (bool)env('APP_DEBUG', false) ? $e->getMessage() : 'An error occured, try again later' );
        }

        return redirect()->route('infrastructure.doctor.index')->with('success','Doctor added successfully');
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
        $staff = Staff::findOrFail($id);
        $user = User::find($staff->user_id);
        if($user->infrastructure_id != auth()->user()->infrastructure_id){
            abort(403);
        }
        $subdivisions = DB::table('subdivisions')
            ->select([
                'subdivisions.id',
                DB::raw('CONCAT(subdivisions.name,", ",divisions.name,", ",regions.name) as name')
            ])
            ->join('divisions','subdivisions.division_id','=','divisions.id')
            ->join('regions','divisions.region_id','=','regions.id')
            ->orderBy('name')
            ->pluck('name','id')->toArray();
        $departments = DB::table('departments')
            ->pluck('name','id')->toArray();
        return view('infrastructure.doctors.edit', compact('user','staff','subdivisions','departments'));
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
            'first_name' => 'required|string',
            'last_name' => 'nullable|string',
            'email' => 'required|string|email|unique:users,email,'.$request->staff,
            'password' => 'nullable|min:8',
            'telephone' => 'required',
            'date_of_birth' => 'required|date',
            'gender' => ['required',Rule::in(['Male','Female'])],
            'national_identity_card' => 'nullable|unique:users,national_identity_card,'.$request->staff,
            'address' => 'required',
            'subdivision' => 'required|exists:subdivisions,id',
            'reference' => 'nullable|unique:staffs,reference_id,'.$id,
            'department' => 'nullable|exists:departments,id',
            'marital_status' => 'required',
            'joining_date' => 'required|date',
            'salary' => 'required|numeric|gte:0',
            'contract_type' => 'required',
        ]);

        try{
            DB::transaction(function() use ($request, $id){
                $update = [];
                $update['first_name'] = $request->get('first_name');
                $update['last_name'] = $request->get('last_name');
                $update['telephone'] = $request->get('telephone');
                $update['email'] = $request->get('email');
                $update['date_of_birth'] = $request->get('date_of_birth');
                $update['gender'] = $request->get('gender');
                if($request->password){
                    $update['password'] = Hash::make($request->get('password'));
                }
                $update['national_identity_card'] = $request->get('national_identity_card');
                $update['address'] = $request->get('address');
                $update['subdivision_id'] = $request->get('subdivision');
                $user = User::where('id',$request->staff)->update($update);

                Staff::where('id',$id)->update([
                    'reference_id' => $request->get('reference'),
                    'department_id' => $request->get('department'),
                    'joining_date' => $request->get('joining_date'),
                    'marital_status' => $request->get('marital_status'),
                    'salary' => $request->get('salary'),
                    'contract_type' => $request->get('contract_type')
                ]);
            });
        }catch(\Exception $e){
            return redirect()->back()->with('error', (bool)env('APP_DEBUG', false) ? $e->getMessage() : 'An error occured, try again later' );
        }
        return redirect()->route('infrastructure.doctor.index')->with('success','Doctor updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id',$id)->delete();
        return redirect()->back()->with('success','Doctor deleted successfully');
    }
}
