<?php

namespace App\Http\Controllers;

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
        $employee_id = Employees::max('employee_id') + 1;

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->user_type = $request->user_type;
        $user->status = 'Active';
        $user->save();

        $employee = new Employees;
        $employee->user_id = $user->id;
        $employee->employee_id = date('Ym').'0'.$employee_id;
        $employee->phone = $request->phone;
        $employee->address = $request->address;
        $employee->gender = $request->gender;
        $employee->dob = $request->dob;
        $employee->join_of_date = $request->join_of_date;
        $employee->position = $request->position;
        $employee->salary = $request->salary;
        if($request->hasFile('image')){
            $image = $request->file('image');
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path().'/assets/HMS/employees/',$image_name);
            $employee->image = $image_name;
        }
        $employee->save();
        return response()->json($employee);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function show(Employees $employees)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function edit(Employees $employees)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employees $employees)
    {
        //
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
        if (!is_null($employees)) {
            if(!is_null($employees->image)){
                $image_path = public_path().'/assets/HMS/employees/'.$employees->image;
                unlink($image_path);
                $user = User::find($employees->user_id);
                $employees->delete();
                $user->delete();
                return response()->json(['success'=>'Data Delete successfully.']);
            }
            else{
                $user = User::find($employees->user_id);
                $employees->delete();
                $user->delete();
                return response()->json(['success'=>'Data Delete successfully.']);
            }
        }
    }
}
