<?php

namespace App\Http\Controllers;

use App\Models\Bills;
use App\Models\LabTestCat;
use App\Models\MainCompanys;
use App\Models\Payments;
use App\Models\TestReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

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
        return view('Bill.bills', compact('tests'));
    }

    public function allbills(Request $request){

        // dd($request);
        if($request->ajax()){
            $data = Bills::orderBy('id', 'DESC')->get();
            return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('patient_id', function ($item) {
                $patient_id = $item->patients->patient_id;
                return $patient_id;
            })
            ->addColumn('patient_name', function ($item) {
                $patient_name = $item->patients->name;
                return $patient_name;
            })
            ->addColumn('billing_date', function ($item) {
                $billing_date = $item->created_at->format('d-m-Y');
                return $billing_date;
            })
            ->addColumn('all_test', function ($item) {
                $all_test = json_decode($item->all_test);
                foreach($all_test as $test)
                    {
                        $all_test_name[] = $test->test_name;
                    }
                return $all_test_name;
            })
            ->addColumn('action', function ($row) {
                $btn = '&nbsp&nbsp<a href='.(route("billing.details", $row->id)).' class="btn btn-info btn-sm detailsview" data-id="' . $row->id . '"><i class="fas fa-eye"></i></a>';
                return $btn;
            })
            ->rawColumns(['patient_id','patient_name','all_test','action','billing_date',])
            ->make(true);
        }


        return view('Bill.allbills');
    }
    public function allbills1(Request $request){

        if($request->ajax()){
            $data = Bills::orderBy('id', 'DESC')->get();
            return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('patient_id', function ($item) {
                $patient_id = $item->patients->patient_id;
                return $patient_id;
            })
            ->addColumn('patient_name', function ($item) {
                $patient_name = $item->patients->name;
                return $patient_name;
            })
            ->addColumn('billing_date', function ($item) {
                $billing_date = $item->created_at->format('d-m-Y');
                return $billing_date;
            })
            ->addColumn('all_test', function ($item) {
                $all_test = json_decode($item->all_test);
                foreach($all_test as $test)
                    {
                        $all_test_name[] = $test->test_name;
                    }
                return $all_test_name;
            })
            ->addColumn('action', function ($row) {
                $btn = '&nbsp&nbsp<a href='.(route("billing.details", $row->id)).' class="btn btn-info btn-sm detailsview" data-id="' . $row->id . '"><i class="fas fa-eye"></i></a>';
                return $btn;
            })
            ->rawColumns(['patient_id','patient_name','all_test','action','billing_date',])
            ->make(true);
        }


        return view('Bill.allbills');
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
        $bills = new Bills;
        $bills->bill_no = $request->bill_no;
        $bills->patient_id = $request->patient_id;
        $all_test = [];
        for ($i=0; $i < count($request->id); $i++) {
            $all_test[] = [
                'id' => $request->id[$i],
                'test_name' => $request->cat_name[$i],
                'department' => $request->department[$i],
                'test_price' => $request->price[$i],
            ];
        }
        $bills->all_test = json_encode($all_test);
        $bills->net_price = $request->gtotal;
        $bills->discount = $request->discount;
        $bills->total_price = $request->total_;
        $bills->payment_type = $request->paidby;
        $bills->paid_amount = $request->pay;
        $bills->due_amount = $request->return;
        $bills->approved_code = $request->abbroval_code;
        $bills->employee_name = Auth::user()->name;
        $bills->save();

        for($j=0; $j < count($request->id); $j++){
            $testreport = new TestReport;
            $testreport->patient_id = $bills->patient_id;
            $testreport->invoice_id = $bills->id;
            $testreport->test_id = $request->id[$j];
            $testreport->status = 'Pending';
            $testreport->save();
        }

        $payments = new Payments;
        $payments->type = 'Income';
        $payments->account_head = $bills->bill_no.'/'. optional($bills->users)->name;
        $payments->amount = $request->pay;
        $payments->date = date('y-m-d');
        $payments->employee_name = Auth::user()->name;
        $payments->save();

        $maincompany = MainCompanys::where('id', 1)->first();
        $maincompany->balance = $maincompany->balance + $request->pay;
        $maincompany->update();

        return response()->json($bills);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bills  $bills
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bills = Bills::find($id);
        return view('Bill.billdetails', compact('bills'));
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
