<?php

namespace App\Http\Controllers;

use App\Models\Patients;
use App\Models\Payments;
use App\Models\Referrals;
use App\Models\TestReport;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportGenarationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function patientindex()
    {
        $patients = Patients::all();
        return view('allreport.patientlist', compact('patients'));
    }
    public function ledger()
    {
        return view('allreport.ledger');
    }
    public function ledgerdetails(Request $request)
    {
        $data1 = $request->input('from');
        $data2 = $request->input('to');

        $data3 = Payments::whereBetween('date', [$data1, $data2])
            ->orderBy('date')->get();

        $data4 = Payments::where('type', 'Income')
            ->whereBetween('date', [$data1, $data2])
            ->orderBy('date')
            ->get()
            ->sum('amount');

        $data5 = Payments::where('type', 'Expense')
            ->whereBetween('date', [$data1, $data2])
            ->orderBy('date')
            ->get()
            ->sum('amount');

        $previousdate = Carbon::createFromDate($request->input('from'))->subDays();
        $data6 = Payments::where('type','Income')
        ->whereBetween('date',['2000-01-01',$previousdate])
        ->get()
        ->sum('amount');

        $data7 = Payments::where('type','Expense')
        ->whereBetween('date',['2000-01-01',$previousdate])
        ->orderBy('date')
        ->get()
        ->sum('amount');

        $data8 = $data6 - $data7;

        return view('allreport.ledgerdetails', compact('data1','data3','data8','data4','data5' ));
    }
    public function referrallist(){
        $referr = Referrals::all();
        return view('allreport.referrallist', compact('referr'));
    }

    public function reportbooth(){
        $testreport =TestReport::where('status','=','Test Complete')->orderBy('updated_at', 'DESC')->get();
        return view('XrayReport.reportbooth', compact('testreport'));
    }
    public function report_statuschange($id, $status)
    {
        $testreport = TestReport::find($id);
        $testreport->status = $status;
        $testreport->update();
        return response()->json(['success' => 'Status changed successfully.']);
    }

    public function report_details($id)
    {
        $testreport = TestReport::find($id);
        return view('XrayReport.report_details', compact('testreport'));
    }
    // public function expanseledger()
    // {
    //     return view('allreport.expense');
    // }

    // public function expanseledgerdetails(Request $request)
    // {
    //     $data1 = $request->input('from');
    //     $data2 = $request->input('to');

    //     $data3 = Payments::whereBetween('date', [$data1, $data2])
    //         ->orderBy('date')->get();

    //     $data4 = Payments::where('type', 'Income')
    //         ->whereBetween('date', [$data1, $data2])
    //         ->orderBy('date')
    //         ->get()
    //         ->sum('amount');

    //     $data5 = Payments::where('type', 'Expense')
    //         ->whereBetween('date', [$data1, $data2])
    //         ->orderBy('date')
    //         ->get()
    //         ->sum('amount');

    //     $previousdate = Carbon::createFromDate($request->input('from'))->subDays();
    //     $data6 = Payments::where('type','Income')
    //     ->whereBetween('date',['2000-01-01',$previousdate])
    //     ->get()
    //     ->sum('amount');

    //     $data7 = Payments::where('type','Expense')
    //     ->whereBetween('date',['2000-01-01',$previousdate])
    //     ->orderBy('date')
    //     ->get()
    //     ->sum('amount');

    //     $data8 = $data6 - $data7;

    //     return view('allreport.expanseled', compact('data1','data3','data8','data4','data5' ));
    // }
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
        //
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
