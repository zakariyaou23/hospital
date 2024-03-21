<?php

namespace App\Http\Controllers\Infrastructure;

use App\Models\User;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('infrastructure.patients.index');
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
        return view('infrastructure.patients.create', compact('subdivisions'));
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
            'gender' => ['required',Rule::in(['Male','Female'])],
            'national_identity_card' => 'nullable|unique:users,national_identity_card',
            'address' => 'required',
            'subdivision' => 'required|exists:subdivisions,id',
            'blood_group' => ['nullable',Rule::in(['A+','B+','O+','AB+','A-','B-','O-','AB-']) ],
            'allergies' => 'required',
            'tension' => 'required',
            'height' => 'required|numeric|gte:0',
            'weight' => 'required|numeric|gte:0',
            'previous_note' => 'nullable'
        ]);

        try{
            DB::transaction(function() use ($request){
                $user = User::create([
                    'role_id' => 3,
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

                Patient::create([
                    'user_id' => $user->id,
                    'blood_group' => $request->get('blood_group'),
                    'allergies' => $request->get('allergies'),
                    'tension' => $request->get('tension'),
                    'height' => $request->get('height'),
                    'weight' => $request->get('weight'),
                    'previous_note' => $request->get('previous_note'),
                ]);
            });
        }catch(\Exception $e){
            return redirect()->back()->with('error', (bool)env('APP_DEBUG', false) ? $e->getMessage() : 'An error occured, try again later' );
        }

        return redirect()->route('infrastructure.patient.index')->with('success','Patient added successfully');
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
        $patient = Patient::findOrFail($id);
        $user = User::find($patient->user_id);
        $subdivisions = DB::table('subdivisions')
            ->select([
                'subdivisions.id',
                DB::raw('CONCAT(subdivisions.name,", ",divisions.name,", ",regions.name) as name')
            ])
            ->join('divisions','subdivisions.division_id','=','divisions.id')
            ->join('regions','divisions.region_id','=','regions.id')
            ->orderBy('name')
            ->pluck('name','id')->toArray();

        return view('infrastructure.patients.edit',compact('user','patient','subdivisions'));
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
            'first_name' => 'required',
            'last_name' => 'nullable|string',
            'patient' => 'required|exists:users,id',
            'email' => 'required|string|email|unique:users,email,'.$request->patient,
            'password' => 'nullable|min:8',
            'telephone' => 'required',
            'date_of_birth' => 'required|date',
            'gender' => ['required',Rule::in(['Male','Female'])],
            'national_identity_card' => 'nullable|unique:users,national_identity_card,'.$request->patient,
            'address' => 'required',
            'subdivision' => 'required|exists:subdivisions,id',
            'blood_group' => ['nullable',Rule::in(['A+','B+','O+','AB+','A-','B-','O-','AB-']) ],
            'allergies' => 'required',
            'tension' => 'required',
            'height' => 'required|numeric|gte:0',
            'weight' => 'required|numeric|gte:0',
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
                User::where('id',$request->patient)->update($update);

                Patient::where('id',$id)->update([
                    'blood_group' => $request->get('blood_group'),
                    'allergies' => $request->get('allergies'),
                    'tension' => $request->get('tension'),
                    'height' => $request->get('height'),
                    'weight' => $request->get('weight'),
                ]);
            });
        }catch(\Exception $e){
            return redirect()->back()->with('error', (bool)env('APP_DEBUG', false) ? $e->getMessage() : 'An error occured, try again later' );
        }
        return redirect()->route('infrastructure.patient.index')->with('success','Patient updated successfully');
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

        return redirect()->back()->with('success','Patient deleted successfully');
    }
}
