<?php

namespace App\Http\Controllers;

use App\Models\Inventories;
use App\Models\InventoriesHistory;
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
                    $btn = '<a href="javascript:void(0);" data-id="' . $row->id . '" class="btn btn-danger btn-sm deletebtn"> <i class="fas fa-trash"></i> </a>';
                    // $btn = $btn . '&nbsp&nbsp<a href="javascript:void(0);" data-id="' . $row->id . '" class="btn btn-danger btn-sm deletebtn"> <i class="fas fa-trash"></i> </a>';
                    return $btn;
                })
                ->rawColumns(['action', 'amount','document'])
                ->make(true);
        }
        return view('Inventories.inventories');
    }

    public function getInventories(Request $request)
    {

        if ($request->ajax()) {
            $data = InventoriesHistory::orderBy('id', 'DESC')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('itemname', function ($row) {
                    $item_name =  $row->inventories->name;
                    return $item_name;
                })
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
                    $btn = '<a href="javascript:void(0);" data-id="' . $row->id . '" class="btn btn-danger btn-sm deletebtn"> <i class="fas fa-trash"></i> </a>';
                    // $btn = $btn . '&nbsp&nbsp<a href="javascript:void(0);" data-id="' . $row->id . '" class="btn btn-danger btn-sm deletebtn"> <i class="fas fa-trash"></i> </a>';
                    return $btn;
                })
                ->rawColumns(['action', 'amount','document','itemname'])
                ->make(true);
        }
        return view('Inventories.inventorieshistory');
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
        $inventories->stock = $request->quentity;
        $inventories->save();

        $inventorieshistory = new InventoriesHistory;
        $inventorieshistory->inventories_id = $inventories->id;
        $inventorieshistory->brandname = $request->brandname;
        $inventorieshistory->shopname = $request->shopname;
        $inventorieshistory->quentity = $request->quentity;
        $inventorieshistory->amount = $request->amount;
        $inventorieshistory->dateofpurches = $request->dateofpurches;
        if ($request->hasFile('document')) {
            $image = $request->file('document');
            $image_name = rand(0, 100) . '_' . $image->getClientOriginalName();
            $image->move(public_path() . '/assets/HMS/inventory/', $image_name);
            $inventories->document = $image_name;
        }
        $inventorieshistory->save();
        return response()->json(['success' => 'Data Add successfully.']);
    }

    public function storeinventoryhistory(Request $request)
    {
        $inventories = Inventories::find($request->item_name);
        $inventories->stock += $request->quantity_;
        // dump($inventories->stock);

        $inventorieshistory = new InventoriesHistory;
        $inventorieshistory->inventories_id = $request->item_name;
        $inventorieshistory->brandname = $request->brandname_;
        $inventorieshistory->shopname = $request->shopname_;
        $inventorieshistory->quentity = $request->quantity_;
        $inventorieshistory->amount = $request->amount_;
        $inventorieshistory->dateofpurches = $request->dateofpurches_;
        if ($request->hasFile('document_')) {
            $image = $request->file('document_');
            $image_name = rand(0, 100) . '_' . $image->getClientOriginalName();
            $image->move(public_path() . '/assets/HMS/inventory/', $image_name);
            $inventories->document = $image_name;
        }
        $inventories->save();
        $inventorieshistory->save();
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
        $inventories->delete();
        return response()->json(['success'=>'Data Delete successfully.']);
    }

    public function historydestroy($id)
    {
        $inventories = InventoriesHistory::find($id);
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
