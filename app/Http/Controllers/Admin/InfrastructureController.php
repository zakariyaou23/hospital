<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Infrastructure;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class InfrastructureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $infrastructures = Infrastructure::all();
        return view('admin.infrastructures.index', compact('infrastructures'));
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
        return view('admin.infrastructures.create', compact('subdivisions'));
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
            'name' => 'required',
            'type' => ['required',Rule::in(['hospital','clinic','pharmacy','laboratory'])],
            'emergency_number' => 'nullable',
            'location' => 'required',
            'subdivision' => 'required'
        ]);

        Infrastructure::create([
            'name' => $request->get('name'),
            'type' => $request->get('type'),
            'emergency_number' => $request->get('emergency_number'),
            'location' => $request->get('location'),
            'subdivision_id' => $request->get('subdivision'),
        ]);

        return redirect()->route('admin.infrastructure.index')->with('success','Infrastruture added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $infrastructure = Infrastructure::findOrFail($id);

        return view('admin.infrastructures.view',compact('infrastructure'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $infrastructure = Infrastructure::findOrFail($id);
        $subdivisions = DB::table('subdivisions')
            ->select([
                'subdivisions.id',
                DB::raw('CONCAT(subdivisions.name,", ",divisions.name,", ",regions.name) as name')
            ])
            ->join('divisions','subdivisions.division_id','=','divisions.id')
            ->join('regions','divisions.region_id','=','regions.id')
            ->orderBy('name')
            ->pluck('name','id')
            ->toArray();
        return view('admin.infrastructures.edit', compact('infrastructure','subdivisions'));
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
            'name' => 'required',
            'type' => ['required',Rule::in(['hospital','clinic','pharmacy','laboratory'])],
            'emergency_number' => 'nullable',
            'location' => 'required',
            'subdivision' => 'required'
        ]);

        Infrastructure::where('id', $id)->update([
            'name' => $request->get('name'),
            'type' => $request->get('type'),
            'emergency_number' => $request->get('emergency_number'),
            'location' => $request->get('location'),
            'subdivision_id' => $request->get('subdivision'),
        ]);

        return redirect()->route('admin.infrastructure.index')->with('success','Infrastruture updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Infrastructure::where('id', $id)->delete();

        return redirect()->back()->with('success','Infrastruture deleted successfully');
    }
}
