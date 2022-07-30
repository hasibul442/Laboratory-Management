<?php

namespace App\Http\Controllers;

use App\Models\MainCompanys;
use App\Models\Payments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       if($request->ajax()){
        $data = Payments::orderBy('id', 'DESC')->get();
        return DataTables::of($data)
        ->addIndexColumn()
        ->addColumn('amount', function ($row) {
            return number_format($row->amount, 2);
        })
        ->addColumn('date', function ($row) {
            $originalDate=$row->date;
            $newDate = date("d/m/Y", strtotime($originalDate));
            return $newDate;
        })
        ->rawColumns(['amount','date'])
        ->make(true);
       }
         return view('payment.allpayment');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('payment.othertransection');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $payments = new Payments;
        $payments->type = $request->type;
        $payments->account_head = $request->account_head;
        $payments->amount = $request->amount;
        $payments->date = date('y-m-d');
        $payments->employee_name = Auth::user()->name;

        $maincompany = MainCompanys::where('id', 1)->first();
        if($request->type == 'Income'){
            $maincompany->balance = $maincompany->balance + $request->amount;
        }
        elseif($request->type == 'Expense'){
            $maincompany->balance = $maincompany->balance - $request->amount;
        }

        $maincompany->update();
        $payments->save();
        return response()->json($payments);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payments  $payments
     * @return \Illuminate\Http\Response
     */
    public function show(Payments $payments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payments  $payments
     * @return \Illuminate\Http\Response
     */
    public function edit(Payments $payments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payments  $payments
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payments $payments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payments  $payments
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payments $payments)
    {
        //
    }
}
