<?php

namespace App\Http\Controllers;

use App\Models\Inventories;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class InventoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Inventories::orderBy('id', 'DESC')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('amount', function ($row) {
                    return number_format($row->amount, 2);
                })
                ->addColumn('document', function ($row) {
                    if ($row->document == null) {
                        $document = '<p>No Document</p>';
                        return $document;
                    }
                    else{
                        // $document = '<img src="'.(asset("/assets/HMS/inventory/".$row->document)).'"/>';
                        $document = '<a href="'.(asset("/assets/HMS/inventory/".$row->document)).'" target="_blank">'.$row->document.'</a>';
                        return $document;
                    }
                })
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0);" class="btn btn-warning btn-sm editbtn" data-id="' . $row->id . '"><i class="fas fa-edit"></i></a>';
                    $btn = $btn . '&nbsp&nbsp<a href="javascript:void(0);" data-id="' . $row->id . '" class="btn btn-danger btn-sm deletebtn"> <i class="fas fa-trash"></i> </a>';
                    return $btn;
                })
                ->rawColumns(['action', 'amount','document'])
                ->make(true);
        }
        return view('Inventories.inventories');
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
        $inventories = new Inventories;
        $inventories->name = $request->name;
        $inventories->brandname = $request->brandname;
        $inventories->shopname = $request->shopname;
        $inventories->quentity = $request->quentity;
        $inventories->amount = $request->amount;
        if ($request->hasFile('document')) {
            $image = $request->file('document');
            $image_name = rand(0, 100) . '_' . $image->getClientOriginalName();
            $image->move(public_path() . '/assets/HMS/inventory/', $image_name);
            $inventories->document = $image_name;
        }
        $inventories->save();
        return response()->json(['success' => 'Data Add successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inventories  $inventories
     * @return \Illuminate\Http\Response
     */
    public function show(Inventories $inventories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inventories  $inventories
     * @return \Illuminate\Http\Response
     */
    public function edit(Inventories $inventories)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inventories  $inventories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inventories $inventories)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inventories  $inventories
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $inventories = Inventories::find($id);
        if (!is_null($inventories)) {
            if(!is_null($inventories->document)){
                $image_path = public_path().'/assets/HMS/inventory/'.$inventories->document;
                unlink($image_path);
                $inventories->delete();
                return response()->json(['success'=>'Data Delete successfully.']);
            }
            else{
                $inventories->delete();
                return response()->json(['success'=>'Data Delete successfully.']);
            }
        }
    }
}
