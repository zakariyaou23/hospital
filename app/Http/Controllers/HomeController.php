<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\ResetMail;
use App\Models\Patient;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Resend\Laravel\Facades\Resend;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function welcome(){
        $departments = DB::table('departments')->pluck('name','id')->toArray();
        return view('welcome', compact('departments'));
    }

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
            $counts = [];
            if(auth()->user()->role_id == 3){
                $counts['doctors'] = DB::table('users')->where('role_id',4)->count();
                $counts['patients'] = DB::table('users')->where('role_id',3)->count();
            }else{
                $counts['doctors'] = DB::table('users')->where('role_id',4)
                    ->where('infrastructure_id',auth()->user()->infrastructure_id)->count();
                $counts['patients'] = DB::table('users')->where('role_id',3)->where('infrastructure_id',auth()->user()->infrastructure_id)->count();
            }
            return view('infrastructure.dashboard', compact('counts'));
        }
    }

    public function takeAppointment(Request $request){
        $validator = Validator::make($request->all(),[
            'first_name' => 'required|string',
            'last_name' => 'nullable|string',
            'email' => 'required|string|email',
            'telephone' => 'required',
            'gender' => ['required',Rule::in(['Male','Female'])],
            'address' => 'required',
            'doctor' => 'required|exists:users,id',
            'department' => 'required|exists:departments,id',
            'date' => 'required|date',
        ]);

        if($validator->fails()){
            $errorBag = [];
            foreach($validator->errors()->getMessages() as $index => $error){
                foreach($error as $err){
                    $errorBag[] = $err;
                }
            }
            return response()->json($errorBag,403);
        }
        $doctor = User::find($request->get('doctor'));
        $user = User::where('email',$request->get('email'))->first();

        if($user){
            if($user->role_id != 3){
                return response()->json(['This mail cannot make an appointment'],403);
            }
        }else{
            $user = User::create([
                'role_id' => 3,
                'first_name' => $request->get('first_name'),
                'last_name' => $request->get('last_name'),
                'telephone' => $request->get('telephone'),
                'email' => $request->get('email'),
                'date_of_birth' => date('Y-m-d'),
                'gender' => $request->get('gender'),
                'password' => Hash::make('password'),
                'address' => $request->get('address'),
                'subdivision_id' => 202,
                'infrastructure_id' => $doctor->infrastructure_id
            ]);
            Patient::create([
                'user_id' => $user->id,
                'allergies' =>"None",
                'tension' => "0/0",
                'height' => 0,
                'weight' => 0,
                'previous_note' => "None",
            ]);
        }

        Appointment::create([
            'patient_id' => $user->id,
            'doctor_id' => $doctor->id,
            'department_id' => $request->get('department'),
            'date' => $request->get('date'),
            'status' => 'pending',
            'time' => date('H:i'),
            'description' => $request->get('description'),
        ]);

        return response()->json(['success']);
    }

    public function testMail(){

        try {
            Resend::emails()->send([
                'from' => 'onboarding@resend.dev',
                'to' => ['ibrahimsherif223@gmail.com'],
                'subject' => 'hello world',
                'html' => (new ResetMail())->render(),
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            dd($th->getMessage());
        }
        dd('ok');
    }
}
