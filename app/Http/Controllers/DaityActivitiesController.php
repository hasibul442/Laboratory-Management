<?php

namespace App\Http\Controllers;

use App\Models\DailyActivities;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DaityActivitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $data = DailyActivities::orderBy('id', 'DESC')->get();
            return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('user_name', function ($item) {
                $user_name = $item->users->name;
                return $user_name;
            })
            ->addColumn('activity', function ($item) {
                $activity = $item->activity;
                return $activity;
            })
            ->rawColumns(['user_name','activity'])
            ->make(true);
        }

        return view('Activities.activities');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dailyactivities = new DailyActivities;
        $dailyactivities->user_id = $request->user_id;
        $dailyactivities->date = $request->date;
        $dailyactivities->activity = $request->activity;
        $dailyactivities->save();
        return response()->json($dailyactivities);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DailyActivities  $dailyActivities
     * @return \Illuminate\Http\Response
     */
    public function show(DailyActivities $dailyActivities)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DailyActivities  $dailyActivities
     * @return \Illuminate\Http\Response
     */
    public function edit(DailyActivities $dailyActivities)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DailyActivities  $dailyActivities
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $dailyactivities = DailyActivities::find($request->ac_id);
        $dailyactivities->activity = $request->activity_;
        $dailyactivities->update();
        return response()->json($dailyactivities);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DailyActivities  $dailyActivities
     * @return \Illuminate\Http\Response
     */
    public function destroy(DailyActivities $dailyActivities)
    {
        //
    }
}
