<?php

namespace App\Http\Controllers;

use App\Models\MainCompanys;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('dashboard');
        if (MainCompanys::get()->count() == 0) {
            return view('maincompany.maincompany');
        }
        else{
            return view('dashboard');
        }
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
        $lab = new MainCompanys;
        $lab->id = 1;
        $lab->lab_name = $request->lab_name;
        $lab->lab_address = $request->lab_address;
        $lab->lab_phone = $request->lab_phone;
        $lab->lab_email = $request->lab_email;
        $lab->balance = 0;
        if ($request->hasFile('lab_image')) {
            $file = $request->file('lab_image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/assets/HMS/lablogo/'), $filename);
            $lab->lab_image = $filename;
        }
        $lab->save();
        return response()->json(['success' => 'Data Add successfully.']);
    }

    public function details(){
        return view('maincompany.details');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
