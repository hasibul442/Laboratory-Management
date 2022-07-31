<?php

namespace App\Http\Controllers;

use App\Models\LabTestCat;
use App\Models\TestReport;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\Facades\DataTables;

class XrayReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $xrayreport =TestReport::all();
        return view('XrayReport.xrayreport', compact('xrayreport'));
    }

    public function pathology(){
        return view('Pathology.pathology');
    }
    public function pathologyedit($id){
        $pathologytest = TestReport::find($id);
        return view('Pathology.pathologyreport',compact('pathologytest'));
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
        $xrayreport = new TestReport;
        $xrayreport->patient_id =$request->patient_id;
        $xrayreport->order_id =$request->invoice_number;
        $xrayreport->test_id =$request->test_type;
        $xrayreport->upload_by = Auth::user()->name;
        $xrayreport->status = "Ready For Collection";
        if($request->hasFile('image')){
            $file = $request->file('image');
            $file_name = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/assets/HMS/xrayreport/',$file_name);
            $xrayreport->image = $file_name;
        }
        $xrayreport->save();
        return response()->json($xrayreport);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TestReport  $xrayReport
     * @return \Illuminate\Http\Response
     */
    public function show(TestReport $xrayReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TestReport  $xrayReport
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $xrayreport = TestReport::find($id);
        return view('xrayreport.edit', compact('xrayreport'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TestReport  $xrayReport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $xrayreport = TestReport::find($request->id);
        $xrayreport->patient_id = $request->patient_id;
        $xrayreport->test_type = $request->test_type;
        if($request->hasFile('image')){
            $destination = public_path().'/assets/HMS/xrayreport/'.$xrayreport->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $image = $request->file('image');
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path().'/assets/HMS/xrayreport/',$image_name);
            $xrayreport->image = $image_name;
        }
        $xrayreport->update();
        return redirect()->route('xrayreport');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TestReport  $xrayReport
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $xrayreport = TestReport::find($id);
         $xrayreport->delete();
         return response()->json(['success'=>'Data Delete successfully.']);
    }
}
