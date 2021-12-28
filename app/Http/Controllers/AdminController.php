<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Appointment;

class AdminController extends Controller
{

    //For Doctors

    public function add(){

        return view('admin.doctor.add_doctor');

    }

    public function store(Request $request){

        $doctor = new Doctor;
        
        $img_file = $request->image;

        $new_image = time().'.'.$img_file->getClientOriginalName();

        $img_file->move('public/doctor_images/',$new_image);

        $doctor->image = 'public/doctor_images/'.$new_image;

        $doctor->name = $request->name;
        $doctor->phone = $request->phone;
        $doctor->room = $request->room;
        $doctor->speciality = $request->speciality;

        $doctor->save();

        return redirect()->back()->with("message","Doctor Added Successfully");
    }

    public function show_doctors(){

        $doctors = Doctor::all();
        return view('admin.doctor.show_doctor',compact('doctors'));

    }

    public function edit_doctor($id){

        $doctor = Doctor::find($id);

        return view('admin.doctor.edit_doctor',compact('doctor'));

    }

    public function update(Request $request, $id){

        $doctor = Doctor::find($id);
        
        $img_file = $request->image;

        $new_image = time().'.'.$img_file->getClientOriginalName();

        $img_file->move('public/doctor_images/',$new_image);

        $doctor->image = 'public/doctor_images/'.$new_image;

        $doctor->name = $request->name;
        $doctor->phone = $request->phone;
        $doctor->room = $request->room;
        $doctor->speciality = $request->speciality;

        $doctor->save();

        return redirect()->back()->with("message","Doctor Updated Successfully");

    }

    public function delete_doctor($id){

        $doctor = Doctor::find($id);
        
        $doctor->delete();

        return redirect()->back();
    }

    //For Appointments
    public function appointments(){

        $appointments = Appointment::all();

        return view('admin.appointments',compact('appointments'));

    }

    public function approve_appointment(Request $request,$id){

        $appointment = Appointment::find($id);
        
        $appointment->status = "approved";

        $appointment->save();

        return redirect()->back();
    }

    public function cancel_appointment($id){

        $appointment = Appointment::find($id);
        $appointment->delete();
        return redirect()->back();

    }



}
