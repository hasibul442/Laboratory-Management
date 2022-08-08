<?php

namespace App\Http\Controllers;

use App\Models\Inventories;
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
    }

    public function pathology(){
        return view('pathology.pathology');
    }
    public function pathologyedit($id){
        $pathologytest = TestReport::find($id);
        return view('pathology.pathologyreport',compact('pathologytest'));
    }
    public function pathologyinstrument($id){
        $pathologytest = Inventories::find($id);
        return response()->json($pathologytest);
    }
    public function pathologyinstrumentupdate(Request $request){
        $pathologytest = TestReport::find($request->testreport_id);
        $used_instrument = [];
        for ($i=0; $i < count($request->id_); $i++) {
            $stock = Inventories::find($request->id_[$i]);
            $stock->stock -= $request->stock[$i];

            $used_instrument[] = [
                'id' => $request->id_[$i],
                'instrument_name' => $request->instrument_name[$i],
                'quantity_used' => $request->stock[$i],
            ];
            $stock->update();
        }
        $pathologytest->elementuse = json_encode($used_instrument);
        $pathologytest->update();
        return redirect()->back();
    }
    public function pathologyreport(Request $request){
        $pathologytest = TestReport::find($request->id);
        $pathologytest->testresult = $request->testresult;
        $pathologytest->status = $request->status;
        if($request->hasFile('image')){
            $file = $request->file('image');
            $file_name = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/assets/HMS/report/',$file_name);
            $pathologytest->image = $file_name;
        }
        if($request->hasFile('signeture')){
            $file = $request->file('signeture');
            $file_name = $file->getClientOriginalName();
            $file->move(public_path().'/assets/HMS/signature/',$file_name);
            $pathologytest->signeture = $file_name;
        }
        $pathologytest->update();
        return redirect()->route('pathology');
    }


    public function radiology(){
        return view('Radiology.radiology');
    }
    public function radiologyedit($id){
        $radiology = TestReport::find($id);
        return view('Radiology.update',compact('radiology'));
    }
    public function radiologyreport(Request $request){
        $radiologytest = TestReport::find($request->id);
        $radiologytest->testresult = $request->testresult;
        $radiologytest->status = $request->status;
        if($request->hasFile('image')){
            $file = $request->file('image');
            $file_name = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/assets/HMS/report/',$file_name);
            $radiologytest->image = $file_name;
        }
        if($request->hasFile('signeture')){
            $file = $request->file('signeture');
            $file_name = $file->getClientOriginalName();
            $file->move(public_path().'/assets/HMS/signature/',$file_name);
            $radiologytest->signeture = $file_name;
        }
        $radiologytest->update();
        return redirect()->route('radiology');
    }

    public function ultrasonography(){
        return view('Ultrasonography.ultrasonography');
    }
    public function ultrasonographyedit($id){
        $ultrasonography = TestReport::find($id);
        return view('Ultrasonography.update',compact('ultrasonography'));
    }
    public function ultrasonographyreport(Request $request){
        $ultrasonographytest = TestReport::find($request->id);
        $ultrasonographytest->testresult = $request->testresult;
        $ultrasonographytest->status = $request->status;
        if($request->hasFile('image')){
            $file = $request->file('image');
            $file_name = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/assets/HMS/report/',$file_name);
            $ultrasonographytest->image = $file_name;
        }
        if($request->hasFile('signeture')){
            $file = $request->file('signeture');
            $file_name = $file->getClientOriginalName();
            $file->move(public_path().'/assets/HMS/signature/',$file_name);
            $ultrasonographytest->signeture = $file_name;
        }
        $ultrasonographytest->update();
        return redirect()->route('ultrasonography');
    }

    public function Electrocardiography(){
        return view('Electrocardiography.Electrocardiography');
    }

    public function Electrocardiographyedit($id){
        $Electrocardiography = TestReport::find($id);
        return view('Electrocardiography.edit',compact('Electrocardiography'));
    }
    public function Electrocardiographyreport(Request $request){
        $Electrocardiography = TestReport::find($request->id);
        $Electrocardiography->testresult = $request->testresult;
        $Electrocardiography->status = $request->status;
        if($request->hasFile('image')){
            $file = $request->file('image');
            $file_name = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/assets/HMS/report/',$file_name);
            $Electrocardiography->image = $file_name;
        }
        if($request->hasFile('signeture')){
            $file = $request->file('signeture');
            $file_name = $file->getClientOriginalName();
            $file->move(public_path().'/assets/HMS/signature/',$file_name);
            $Electrocardiography->signeture = $file_name;
        }
        $Electrocardiography->update();
        return redirect()->route('Electrocardiography');
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TestReport  $xrayReport
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
