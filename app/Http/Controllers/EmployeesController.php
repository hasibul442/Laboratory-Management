<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;
use App\Models\Employees;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employees::all();
        return view('Employees.employee', compact('employees'));
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
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->user_type = $request->user_type;
        $user->status = 'Pending';
        if($request->hasFile('image')){
            $image = $request->file('image');
            $image_name = rand(0,100).'_'.$image->getClientOriginalName();
            $image->move(public_path().'/assets/HMS/employees/',$image_name);
            $user->profile_photo_path = $image_name;
        }
        $user->save();
        $employecount = Employees::get()->count();
        $employee = new Employees;
        $employee->user_id = $user->id;
        // if(Employees::get()->count() == 0){
            // $employee_id = Employees::max('employee_id') + 1;
            $employee->employee_id = date('Ym').'0'.$employecount + $user->id;
        // }else{
        //     $employee_id = Employees::max('employee_id') + 1;
        //     $employee->employee_id = $employee_id;
        // }
        $employee->phone = $request->phone;
        $employee->address = $request->address;
        $employee->gender = $request->gender;
        $employee->dob = $request->dob;
        $employee->join_of_date = $request->join_of_date;
        $employee->position = $request->position;
        $employee->salary = $request->salary;
        $employee->save();
        return response()->json($employee);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employees::find($id);
        return view('Employees.profile', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employees::find($id);
        return view('Employees.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $employee = Employees::find($id);

        $user = User::find($employee->user_id);
        $user->name = $request->name;
        $user->email = $request->email;
        if($request->hasFile('image')){
            $destination = public_path().'/assets/HMS/employees/'.$user->profile_photo_path;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $image = $request->file('image');
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path().'/assets/HMS/employees/',$image_name);
            $user->profile_photo_path = $image_name;
        }
        $employee->phone = $request->phone;
        $employee->address = $request->address;
        $employee->dob = $request->dob;
        $employee->join_of_date = $request->join_of_date;
        $employee->position = $request->position;
        $employee->salary = $request->salary;
        $user->update();
        $employee->update();
        return redirect()->route('employees');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employees = Employees::find($id);
        $user = User::find($employees->user_id);
        if (!is_null($user)) {
            if(!is_null($user->profile_photo_path)){
                $image_path = public_path().'/assets/HMS/employees/'.$user->profile_photo_path;
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
