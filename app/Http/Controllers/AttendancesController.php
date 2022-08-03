<?php

namespace App\Http\Controllers;

use App\Models\Attendances;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Yajra\DataTables\Facades\DataTables;

class AttendancesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $data = Attendances::orderBy('id', 'DESC')->get();
            return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('enters_time', function ($item) {
                $enter_time = $item->enter_date.'<br/>'.$item->enter_time;
                return $enter_time;
            })
            ->addColumn('exits_time', function ($item) {
                if($item->exit_date == null){
                    $exits_time = '<span class="text-danger">Not Enter</span>';
                    return $exits_time;
                }else{
                    $exits_time = $item->exit_date.'<br/>'.$item->exit_time;
                return $exits_time;}
            })
            // ->addColumn('employeesid', function ($item) {
            //     $employeesid = $item->employees->id;
            //     return $employeesid;
            // })
            ->addColumn('user_name', function ($item) {
                $user_name = $item->users->name;
                return $user_name;
            })
            // ->addColumn('activity', function ($item) {
            //     $activity = $item->activity;
            //     return $activity;
            // })
            ->rawColumns(['user_name','enters_time','exits_time'])
            ->make(true);
        }

        return view('Attendance.attendance');
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

        $attendances = new Attendances;
        $attendances->user_id = $request->user_id;
        $attendances->enter_date = $request->entry_date;
        $attendances->enter_time = $request->entry_time;
        $attendances->save();
        return response()->json($attendances);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attendances  $attendances
     * @return \Illuminate\Http\Response
     */
    public function show(Attendances $attendances)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attendances  $attendances
     * @return \Illuminate\Http\Response
     */
    public function edit(Attendances $attendances)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Attendances  $attendances
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $attendances = Attendances::find($request->id);
        $attendances->exit_date = $request->exit_date;
        $attendances->exit_time = $request->exit_time;
        $attendances->update();
        return response()->json($attendances);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attendances  $attendances
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attendances $attendances)
    {
        //
    }
}
