<?php

namespace App\Http\Controllers;

use App\Models\Referrals;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class ReferralController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Referrals::query()->orderBy('id', 'desc');
            return DataTables::of($data)
                ->addIndexColumn()

                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0);" class="btn btn-warning btn-sm editbtn" data-id="' . $row->id . '"><i class="fas fa-edit"></i></a>';
                    $btn = $btn . '&nbsp&nbsp<a href="javascript:void(0);" data-id="' . $row->id . '" class="btn btn-danger btn-sm deletebtn"> <i class="fas fa-trash"></i> </a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                // ->make(true);
                ->toJson();
        }
        return view('referrel.referrel');
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
        $referral = new Referrals;
        $referral->name = $request->name;
        $referral->hospitalname = $request->hospitalname;
        $referral->email = $request->email;
        $referral->phone = $request->phone;
        $referral->address = $request->address;
        $referral->account_number = $request->account_number;
        $referral->bank_name = $request->bank_name;
        $referral->save();
        return response()->json($referral);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Referrals  $referrals
     * @return \Illuminate\Http\Response
     */
    public function show(Referrals $referrals)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Referrals  $referrals
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $referral = Referrals::find($id);
        return response()->json($referral);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Referrals  $referrals
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $referral = Referrals::find($request->id);
        $referral->name = $request->name1;
        $referral->hospitalname = $request->hospitalname1;
        $referral->email = $request->email1;
        $referral->phone = $request->phone1;
        $referral->address = $request->address1;
        $referral->account_number = $request->account_number1;
        $referral->bank_name = $request->bank_name1;
        $referral->update();
        return response()->json($referral);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Referrals  $referrals
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $referral = Referrals::find($id);
        $referral->delete();
        return response()->json(['success' => 'Referral deleted successfully.']);
    }
}
