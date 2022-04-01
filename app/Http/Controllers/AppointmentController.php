<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Department;
use App\Models\Doctor;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    private $departments;
    private $appointments;
    private $doctors;
    private $fee;
    private $doctor;

    public function index(){

        $this->departments = Department::all();
        $this->doctors = Doctor::all();
        $this->appointments = Appointment::orderBy('id','desc')->get();
        return view('appointment.add',['departments' => $this->departments, 'doctors' => $this->doctors, 'appointments' => $this->appointments]);
    }
    public function getDoctor(Request $request){

        $this->doctors = Doctor::select('name','id')->where('department_id', $request->id)->get();
        return response()->json($this->doctors);
    }
    public function fee(Request $request){

        $this->fee=Doctor::select('fee')->where('id',$request->id)->first();

        return response()->json($this->fee);

    }

    public function create(Request $request){

        Appointment::newAppointment($request);
        return redirect()->back()->with('message','Appointment Add Successfully');
    }
    public function addPatient(Request $request, $id){

        Appointment::newAppointment($request);
        return redirect()->back()->with('message','Appointment Add Successfully');
    }
    public function delete($id){

        $this->doctor = Appointment::find($id);

        $this->doctor->delete();
        return redirect('/add-appointment')->with('message','Appointment Delete Successfully');
    }
}
