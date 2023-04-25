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
            $data = User::whereIn('user_type', ['Admin', 'Employees', 'Super Admin', 'Accountant', 'Receptionist', 'Lab Scientist', 'Radiographer', 'Sonographer'])->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('status', function ($item) {
                    $togolebutton = '<input ' . ($item->status == "Active" ? "checked" : "") . ' type="checkbox" class="status" id="status" data-id="' . $item->id . '" />';
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
                ->addColumn('permission', function ($item) {
                    if ($item->user_type == 'Admin' || $item->user_type == 'Super Admin') {
                        $permission = '<p>Can Access Every Here</p>';
                        return $permission;
                    } else {
                        $togolebutton = '<span class="h5">Employees : </span><input ' . ($item->employees == "1" ? "checked" : "") . ' type="checkbox" class="employees toggolebtn" id="employees" data-id="' . $item->id . '" /><br/><br/>';
                        $togolebutton .= '<span class="h5">Patients : </span><input ' . ($item->patitents == "1" ? "checked" : "") . ' type="checkbox" class="patitents toggolebtn" id="patitents" data-id="' . $item->id . '" /><br/><br/>';
                        $togolebutton .= '<span class="h5">Test Category : </span><input ' . ($item->testcategory == "1" ? "checked" : "") . ' type="checkbox" class="testcategory toggolebtn" id="testcategory" data-id="' . $item->id . '" /><br/><br/>';
                        $togolebutton .= '<span class="h5">Referral : </span><input ' . ($item->referral == "1" ? "checked" : "") . ' type="checkbox" class="referral toggolebtn" id="referral" data-id="' . $item->id . '" /><br/><br/>';
                        $togolebutton .= '<span class="h5">Billing : </span><input ' . ($item->billing == "1" ? "checked" : "") . ' type="checkbox" class="billing toggolebtn" id="billing" data-id="' . $item->id . '" /><br/><br/>';
                        $togolebutton .= '<span class="h5">Laboratory : </span><input ' . ($item->pathology == "1" ? "checked" : "") . ' type="checkbox" class="pathology toggolebtn" id="pathology" data-id="' . $item->id . '" /><br/><br/>';
                        $togolebutton .= '<span class="h5">Radiology : </span><input ' . ($item->radiology == "1" ? "checked" : "") . ' type="checkbox" class="radiology toggolebtn" id="radiology" data-id="' . $item->id . '" /><br/><br/>';
                        $togolebutton .= '<span class="h5">Ultrasonography : </span><input ' . ($item->ultrasonography == "1" ? "checked" : "") . ' type="checkbox" class="ultrasonography toggolebtn" id="ultrasonography" data-id="' . $item->id . '" /><br/><br/>';
                        $togolebutton .= '<span class="h5">Electrocardiography : </span><input ' . ($item->electrocardiography == "1" ? "checked" : "") . ' type="checkbox" class="electrocardiography toggolebtn" id="electrocardiography" data-id="' . $item->id . '" /><br/><br/>';
                        $togolebutton .= '<span class="h5">Report Booth : </span><input ' . ($item->reportbooth == "1" ? "checked" : "") . ' type="checkbox" class="reportbooth toggolebtn" id="reportbooth" data-id="' . $item->id . '" /><br/><br/>';
                        $togolebutton .= '<span class="h5">Financial <br/> Management : </span><input ' . ($item->financial == "1" ? "checked" : "") . ' type="checkbox" class="financial toggolebtn" id="financial" data-id="' . $item->id . '" /><br/><br/>';
                        $togolebutton .= '<span class="h5">Report <br/> Genaration : </span><input ' . ($item->report_g == "1" ? "checked" : "") . ' type="checkbox" class="report_g toggolebtn" id="report_g" data-id="' . $item->id . '" /><br/><br/>';
                        $togolebutton .= '<span class="h5">Inventory <br/> Genaration : </span><input ' . ($item->inventory == "1" ? "checked" : "") . ' type="checkbox" class="inventory toggolebtn" id="inventory" data-id="' . $item->id . '" /><br/><br/>';
                        // $togolebutton .= '<script>
                        //                     $(".toggolebtn").bootstrapToggle({
                        //                         on: "Active",
                        //                         off: "Pending",
                        //                         onstyle: "success",
                        //                         offstyle: "danger",
                        //                         size: "small"
                        //                     });
                        //                 </script>';
                        return $togolebutton;
                    }
                })
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0);" class="btn btn-warning btn-sm editbtn" data-id="' . $row->id . '"><i class="fas fa-edit"></i></a>';
                    $btn .= '&nbsp&nbsp<a href="javascript:void(0);" class="btn btn-info btn-sm passchange" data-id="' . $row->id . '"><i class="fas fa-lock"></i></a>';

                    if (Auth::user()->user_type == $row->user_type && Auth::user()->email == $row->email) {
                        $btn = $btn . '&nbsp&nbsp<a href="javascript:void(0);" data-id="' . $row->id . '" class="btn btn-danger btn-sm deletebtn disabled"> <i class="fas fa-trash"></i> </a>';
                    } else {
                        $btn = $btn . '&nbsp&nbsp<a href="javascript:void(0);" data-id="' . $row->id . '" class="btn btn-danger btn-sm deletebtn"> <i class="fas fa-trash"></i> </a>';
                    }

                    return $btn;
                })
                ->rawColumns(['action', 'status', 'permission'])
                ->make(true);
        }
        return view('user.user');
    }

    public function statuschange($id, Request $requst)
    {
       try{
        $user = User::find($id);
        $user->status = $requst->status;
        $user->update();
        return response()->json(['success' => 'Status changed successfully.']);
       } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()]);
       }
    }

    public function employeeschange($id, Request $request)
    {
        $user = User::find($id);
        $user->employees = $request->catstatus;
        $user->update();
        return response()->json(['success' => 'Status changed successfully.']);
    }
    public function patitentschange($id, Request $request)
    {
        $user = User::find($id);
        $user->patitents = $request->catstatus;
        $user->update();
        return response()->json(['success' => 'Status changed successfully.']);
    }
    public function testcategory($id, Request $request)
    {
        $user = User::find($id);
        $user->testcategory = $request->catstatus;
        $user->update();
        return response()->json(['success' => 'Status changed successfully.']);
    }
    public function referral($id, Request $request)
    {
        $user = User::find($id);
        $user->referral = $request->catstatus;
        $user->update();
        return response()->json(['success' => 'Status changed successfully.']);
    }
    public function billing($id, Request $request)
    {
        $user = User::find($id);
        $user->billing = $request->catstatus;
        $user->update();
        return response()->json(['success' => 'Status changed successfully.']);
    }
    public function pathology($id, Request $request)
    {
        $user = User::find($id);
        $user->pathology = $request->catstatus;
        $user->update();
        return response()->json(['success' => 'Status changed successfully.']);
    }
    public function radiology($id, Request $request)
    {
        $user = User::find($id);
        $user->radiology = $request->catstatus;
        $user->update();
        return response()->json(['success' => 'Status changed successfully.']);
    }
    public function electrocardiography($id, Request $request)
    {
        $user = User::find($id);
        $user->electrocardiography = $request->catstatus;
        $user->update();
        return response()->json(['success' => 'Status changed successfully.']);
    }
    public function ultrasonography($id, Request $request)
    {
        $user = User::find($id);
        $user->ultrasonography = $request->catstatus;
        $user->update();
        return response()->json(['success' => 'Status changed successfully.']);
    }
    public function reportbooth($id, Request $request)
    {
        $user = User::find($id);
        $user->reportbooth = $request->catstatus;
        $user->update();
        return response()->json(['success' => 'Status changed successfully.']);
    }
    public function financial($id, Request $request)
    {
        $user = User::find($id);
        $user->financial = $request->catstatus;
        $user->update();
        return response()->json(['success' => 'Status changed successfully.']);
    }
    public function report_g($id, Request $request)
    {
        $user = User::find($id);
        $user->report_g = $request->catstatus;
        $user->update();
        return response()->json(['success' => 'Status changed successfully.']);
    }
    public function inventory($id, Request $request)
    {
        $user = User::find($id);
        $user->inventory = $request->catstatus;
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
            if (!is_null($user->profile_photo_path)) {
                $image_path = public_path() . '/assets/HMS/employees/' . $user->profile_photo_path;
                unlink($image_path);;
                $user->delete();
                return response()->json(['success' => 'Data Delete successfully.']);
            } else {
                $user->delete();
                return response()->json(['success' => 'Data Delete successfully.']);
            }
        }
    }
}
