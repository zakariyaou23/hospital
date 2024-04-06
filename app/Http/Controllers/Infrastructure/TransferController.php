<?php

namespace App\Http\Controllers\Infrastructure;

use App\Models\User;
use App\Models\Transfer;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class TransferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('infrastructure.transfers.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $patients = User::select([
            DB::raw('CASE WHEN last_name IS NOT NULL THEN CONCAT(first_name, \' \', last_name) ELSE first_name END AS name'),
            'id'
        ])
        ->where('role_id',3)
        ->where('infrastructure_id',auth()->user()->infrastructure_id)
        ->pluck('name','id')
        ->toArray();
        $infrastructures = DB::table('infrastructures')
        ->pluck('name','id')
        ->toArray();
        return view('infrastructure.transfers.create', compact('patients','infrastructures'));
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
            'to_infrastructure' => 'required|exists:infrastructures,id',
            'note' => 'required',
        ]);

        Transfer::create([
            'patient_id' => $request->get('patient'),
            'from_infrastructure_id' => auth()->user()->infrastructure_id,
            'initiator_id' => auth()->user()->id,
            'to_infrastructure_id' => $request->get('to_infrastructure'),
            'note' => $request->get('note'),
        ]);
        return redirect()->route('infrastructure.transfer.index')->with('success','Transfer initiated successfully');
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
        $transfer = Transfer::find($id);
        return view('infrastructure.transfers.edit', compact('transfer'));
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
            'status' => ['required',Rule::in(['success','failed'])],
            'reason' => 'required_if:status,failed',
        ]);
        Transfer::where('id',$id)->update([
            'status' => $request->get('status'),
            'reason' => $request->get('reason'),
        ]);
        return redirect()->route('infrastructure.transfer.index')->with('success','Transfer completed successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Transfer::where('id',$id)->delete();

        return redirect()->back()->with('success','Patient deleted successfully');
    }
}
