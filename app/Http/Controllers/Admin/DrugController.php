<?php

namespace App\Http\Controllers\Admin;

use App\Models\Drug;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DrugController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'code' => 'required',
            'form' => 'required',
            'description' => 'required',
            'price' => 'required|numeric|gte:0',
            'infrastructure' => 'required|exists:infrastructures,id'
        ]);

        Drug::create([
            'name' => $request->get('name'),
            'code' => $request->get('code'),
            'form' => $request->get('form'),
            'description' => $request->get('description'),
            'price' => $request->get('price'),
            'infrastructure_id' => $request->get('infrastructure'),
        ]);

        return redirect()->back()->with('success','Drug added successfully');
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
        //
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
            'code' => 'required',
            'form' => 'required',
            'description' => 'required',
            'price' => 'required|numeric|gte:0',
            'infrastructure' => 'required|exists:infrastructures,id'
        ]);

        Drug::where('id',$id)->update([
            'name' => $request->get('name'),
            'code' => $request->get('code'),
            'form' => $request->get('form'),
            'description' => $request->get('description'),
            'price' => $request->get('price'),
            'infrastructure_id' => $request->get('infrastructure'),
        ]);

        return redirect()->back()->with('success','Drug updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Drug::where('id',$id)->delete();

        return redirect()->back()->with('success','Drug deleted successfully');
    }
}
