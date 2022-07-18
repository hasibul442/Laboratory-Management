<?php

namespace App\Http\Controllers;

use App\Models\Bills;
use App\Models\LabTestCat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BillsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tests = LabTestCat::all();
        $bills = Bills::all();
        return view('Bill.bills', compact('bills','tests'));
    }

    public function allbills(){
        $bills = Bills::all();
        // dd($bills->toArray());
        return view('Bill.allbills', compact('bills'));
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
        $billcount = Bills::get()->count();
        $bills = new Bills;
        $bills->bill_no = "#".'00000'.$billcount+rand(0,10);
        $bills->patient_id = $request->patient_id;
        $all_test = [];
        for ($i=0; $i < count($request->id); $i++) {
            $all_test[] = [
                'id' => $request->id[$i],
                'test_name' => $request->cat_name[$i],
                'test_price' => $request->price[$i],
            ];
        }
        $bills->all_test = $all_test;
        $bills->net_price = $request->gtotal;
        $bills->discount = $request->discount;
        $bills->total_price = $request->total_;
        $bills->payment_type = $request->paidby;
        $bills->paid_amount = $request->pay;
        $bills->due_amount = $request->return;
        $bills->approved_code = $request->abbroval_code;
        $bills->employee_name = Auth::user()->name;
        $bills->save();
        return response()->json($bills);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bills  $bills
     * @return \Illuminate\Http\Response
     */
    public function show(Bills $bills)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bills  $bills
     * @return \Illuminate\Http\Response
     */
    public function edit(Bills $bills)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bills  $bills
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bills $bills)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bills  $bills
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bills $bills)
    {
        //
    }
}
