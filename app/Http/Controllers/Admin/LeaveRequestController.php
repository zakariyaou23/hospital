<?php

namespace App\Http\Controllers\Admin;

use App\Models\LeaveRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class LeaveRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leave_requests = collect([]);

        return 'ok';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.leave_requests.create');
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
            'user'  => 'required|exists:users,id',
            'leave_type' => 'required|exists:leave_types,id',
            'from' => 'required|date',
            'to' => 'required|date',
            'reason' => 'required',
        ]);

        LeaveRequest::create([
            'user_id' => $request->get('user'),
            'leave_type_id' => $request->get('leave_type'),
            'from' => $request->get('from'),
            'to' => $request->get('to'),
            'reason' => $request->get('reason'),
        ]);

        return redirect()->route('admin.leave_request.index')->with('success','Leave request added successfully');
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
        $leave_request = LeaveRequest::findOrFail($id);

        return view('admin.leave_requests.edit',compact('leave_request'));
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
            'user'  => 'required|exists:users,id',
            'leave_type' => 'required|exists:leave_types,id',
            'from' => 'required|date',
            'to' => 'required|date',
            'reason' => 'required',
            'status' => ['required',Rule::in(['pending','approved','rejected'])],
        ]);

        LeaveRequest::where('id',$id)->update([
            'user_id' => $request->get('user'),
            'leave_type_id' => $request->get('leave_type'),
            'from' => $request->get('from'),
            'status' => $request->get('status'),
            'to' => $request->get('to'),
            'reason' => $request->get('reason'),
        ]);

        return redirect()->route('admin.leave_request.index')->with('success','Leave request updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        LeaveRequest::where('id',$id)->delete();

        return redirect()->route('admin.leave_request.index')->with('success','Leave request deleted successfully');
    }
}
