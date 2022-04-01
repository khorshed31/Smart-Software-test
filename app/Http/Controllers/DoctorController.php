<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    private $doctor;
    private $doctors;
    private $departments;
    public function index(){

        $this->departments = Department::all();
        return view('doctor.add', ['departments' => $this->departments]);
    }
    public function create(Request $request){

        Doctor::newDoctor($request);
        return redirect()->back()->with('message','Doctor Add Successfully');
    }
    public function manage(){

        $this->doctors = Doctor::orderBy('id','desc')->get();
        return view('doctor.manage', ['doctors' => $this->doctors]);
    }
    public function edit($id){

        $this->doctor = Doctor::find($id);
        $this->departments = Department::all();
        return view('doctor.edit', ['doctor' => $this->doctor, 'departments' => $this->departments]);
    }
    public function update(Request $request, $id){

        Doctor::updateDoctor($request, $id);
        return redirect('/manage-doctor')->with('message','Doctor Update Successfully');
    }
    public function delete($id){

        $this->doctor = Doctor::find($id);

        $this->doctor->delete();
        return redirect('/manage-doctor')->with('message','Doctor Delete Successfully');
    }
}
