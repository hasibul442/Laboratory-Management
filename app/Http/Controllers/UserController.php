<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::whereIn('user_type',['super_admin' , 'admin', 'employees'])->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('user_type', function ($item) {
                    if ($item->user_type == 'super_admin')
                        return 'Super Admin';
                    elseif ($item->user_type == 'admin')
                        return 'Admin';
                    elseif ($item->user_type == 'Employee')
                        return 'Employee';
                    elseif ($item->user_type == 'patient')
                        return 'Patient';
                })
                ->addColumn('status', function ($item) {
                    // if($item->status == 'Active'){
                    //     $togolebutton = '<input type="checkbox" name="status" id="status" data-id="' . $item->id . '" data-status="' . $item->status . '" class="toggle-class status" checked>';
                    // }
                    // else{
                    //     $togolebutton = '<input type="checkbox" name="status" id="status" data-id="' . $item->id . '" data-status="' . $item->status . '" class="toggle-class status" >';
                    // }
                    $togolebutton = '<input ' . ($item->status == "Active" ? "checked" : "") .' type="checkbox" class="status" id="status" data-id="'.$item->id.'" />';
                    $togolebutton .= '<script>
                                        $(".status").bootstrapToggle({
                                            on: "Active",
                                            off: "Pending",
                                            onstyle: "success",
                                            offstyle: "danger",
                                            size: "small"
                                        });
                                    </script>';
                    return $togolebutton;
                })
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0);" class="btn btn-warning btn-sm editbtn" data-id="' . $row->id . '"><i class="fas fa-edit"></i></a>';
                    $btn .= '&nbsp&nbsp<a href="javascript:void(0);" class="btn btn-info btn-sm passchange" data-id="' . $row->id . '"><i class="fas fa-lock"></i></a>';

                    if (Auth::user()->user_type == $row->user_type && Auth::user()->email == $row->email){
                        $btn = $btn . '&nbsp&nbsp<a href="javascript:void(0);" data-id="' . $row->id .'" class="btn btn-danger btn-sm deletebtn disabled"> <i class="fas fa-trash"></i> </a>';
                    }
                    else{
                        $btn = $btn . '&nbsp&nbsp<a href="javascript:void(0);" data-id="' . $row->id .'" class="btn btn-danger btn-sm deletebtn"> <i class="fas fa-trash"></i> </a>';
                    }

                    return $btn;
                })
                ->rawColumns(['action','status','user_type'])
                ->make(true);
        }
        return view('user.user');
    }

    public function statuschange($id, $status)
    {
        $user = User::find($id);
        $user->status = $status;
        $user->update();
        return response()->json(['success' => 'Status changed successfully.']);
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
        $users = User::find($id);
        return response()->json($users);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = User::find($request->id);
        $user->name = $request->name1;
        $user->email = $request->email1;
        $user->user_type = $request->user_type1;
        $user->update();
        return response()->json(['success' => 'User updated successfully.']);
    }
    public function updatepass(Request $request)
    {
        $user = User::find($request->id);
        $user->password = Hash::make($request->password);
        $user->update();
        return response()->json(['success' => 'User updated successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if (!is_null($user)) {
            if(!is_null($user->profile_photo_path)){
                $image_path = public_path().'/assets/HMS/employees/'.$user->profile_photo_path;
                unlink($image_path);;
                $user->delete();
                return response()->json(['success'=>'Data Delete successfully.']);
            }
            else{
                $user->delete();
                return response()->json(['success'=>'Data Delete successfully.']);
            }
        }
    }
}
