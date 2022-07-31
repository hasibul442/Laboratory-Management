<?php

namespace App\Http\Controllers;

use App\Models\LabTestCat;
use Illuminate\Http\Request;

class LabTestCatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $labtest = LabTestCat::all();
        return view('LabTest.labtest', compact('labtest'));
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
        $labtest = new LabTestCat;
        $labtest->cat_name =$request->cat_name;
        $labtest->department =$request->department;
        $labtest->price =$request->price;
        $labtest->status = 1;
        $labtest->save();
        return response()->json(['success'=>'Data Add successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LabTestCat  $labTestCat
     * @return \Illuminate\Http\Response
     */
    public function show(LabTestCat $labTestCat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LabTestCat  $labTestCat
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $labtest = LabTestCat::find($id);
        return response()->json($labtest);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LabTestCat  $labTestCat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $labtest = LabTestCat::find($request->id);
        $labtest->cat_name = $request->input('cat_name1');
        $labtest->department = $request->input('department1');
        $labtest->price = $request->input('price1');
        $labtest->update();
        return response()->json($labtest);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LabTestCat  $labTestCat
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $labtest = LabTestCat::find($id);
         $labtest->delete();
         return response()->json(['success'=>'Data Delete successfully.']);

    }
}
