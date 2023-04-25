<?php

namespace App\Http\Controllers;

use App\Models\Patients;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class PatientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Patients::orderBy('id', 'DESC')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('user_name', function ($item) {
                    $user_name = $item->users->name;
                    return $user_name;
                })
                ->addColumn('email', function ($item) {
                    $email = $item->users->email;
                    return $email;
                })
                ->addColumn('home_phone', function ($item) {
                    $home_phone = '<h5>Home Phone</h5>'.$item->home_phone;
                    $home_phone .= '<br><h5>Mobile Phone</h5>'. $item->mobile_phone;
                    return $home_phone;
                })
                ->addColumn('status', function ($item) {
                    $togolebutton = '<input ' . ($item->users->status == "Active" ? "checked" : "") .' type="checkbox" class="status" id="status" data-id="'.$item->user_id.'" />';
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
                    $btn .= '&nbsp&nbsp<a href='.(route("patients.profile", $row->id)).' class="btn btn-info btn-sm detailsview" data-id="' . $row->id . '"><i class="fas fa-eye"></i></a>';
                    $btn = $btn . '&nbsp&nbsp<a href="javascript:void(0);" data-id="' . $row->id .'" class="btn btn-danger btn-sm deletebtn"> <i class="fas fa-trash"></i> </a>';
                    return $btn;
                })
                ->rawColumns(['action','status','user_name','email','home_phone'])
                ->make(true);
        }
        return view('Patient.patient_list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Patient.patient_reg');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->user_type = 'patient';
        $user->status = 'Pending';
        if($request->hasFile('image')){
            $image = $request->file('image');
            $image_name = rand(0,100).'_'.$image->getClientOriginalName();
            $image->move(public_path().'/assets/HMS/patient/',$image_name);
            $user->profile_photo_path = $image_name;
        }
        $user->save();
        $patientcount = Patients::get()->count();
        $patient = new Patients;
        $patient->user_id = $user->id;
        $patient->patient_id = date('Ym').'0'.$patientcount + $user->id;
        $patient->home_phone = $request->home_phone;
        $patient->mobile_phone = $request->mobile_phone;
        $patient->address = $request->address;
        $patient->gender = $request->gender;
        $patient->lmp = $request->lmp;
        $patient->age = $request->age;
        $patient->blood_group = $request->blood_group;
        $patient->note = $request->note;
        $patient->bp = $request->bp;
        $patient->height = $request->height;
        $patient->weight = $request->weight;
        $patient->referred_by = $request->referred_by;
        $patient->registerd_by = Auth::user()->name;
        $patient->save();
        return redirect()->route('patients.list');

    }

    public function statuschange($id, Request $request)
    {
        $user = User::find($id);
        $user->status = $request->status;
        $user->update();
        return response()->json(['success' => 'Status changed successfully.']);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Patients  $patients
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $patient = Patients::find($id);
        return view('Patient.patient_details',compact('patient'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Patients  $patients
     * @return \Illuminate\Http\Response
     */
    public function edit(Patients $patients)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Patients  $patients
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patients $patients)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Patients  $patients
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employees = Patients::find($id);
        $user = User::find($employees->user_id);
        if (!is_null($user)) {
            if(!is_null($user->profile_photo_path)){
                $image_path = public_path().'/assets/HMS/patient/'.$user->profile_photo_path;
                unlink($image_path);
                // $user = User::find($employees->user_id);
                $employees->delete();
                $user->delete();
                return response()->json(['success'=>'Data Delete successfully.']);
            }
            else{
                // $user = User::find($employees->user_id);
                $employees->delete();
                $user->delete();
                return response()->json(['success'=>'Data Delete successfully.']);
            }
        }
    }
}
