<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Appointment;
use App\Notifications\EmailNotification;
use Notification;
use Auth;


class AdminController extends Controller
{

    //For Doctors

    public function add(){

        if(Auth::id()){

            if(Auth::user()->usertype=='1')
            {
                return view('admin.doctor.add_doctor');

            }else{

                return redirect('/');
            }

        }else{

            return redirect()->back();

        }


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

        if(Auth::id()){

            if(Auth::user()->usertype=='1')
            {
                $doctors = Doctor::all();
                return view('admin.doctor.show_doctor',compact('doctors'));

            }else{

                return redirect('/');
            }

        }else{

            return redirect()->back();

        }        



    }

    public function edit_doctor($id){

        if(Auth::id()){

            if(Auth::user()->usertype=='1')
            {

                $doctor = Doctor::find($id);

                return view('admin.doctor.edit_doctor',compact('doctor'));

            }else{

                return redirect('/');
            }

        }else{

            return redirect()->back();

        }


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

        if(Auth::id()){

            if(Auth::user()->usertype=='1')
            {

                $doctor = Doctor::find($id);
        
                $doctor->delete();
        
                return redirect()->back();
                
            }else{

                return redirect('/');
            }

        }else{

            return redirect()->back();

        }

    }

    //For Appointments
    public function appointments(){

        if(Auth::id()){

            if(Auth::user()->usertype=='1')
            {

                $appointments = Appointment::all();

                return view('admin.appointments',compact('appointments'));

            }else{

                return redirect('/');
            }

        }else{

            return redirect()->back();

        }


    }

    public function approve_appointment(Request $request,$id){

        if(Auth::id()){

            if(Auth::user()->usertype=='1')
            {
                $appointment = Appointment::find($id);
        
                $appointment->status = "approved";
        
                $appointment->save();
        
                return redirect()->back();

            }else{

                return redirect('/');
            }

        }else{

            return redirect()->back();

        }


    }

    public function cancel_appointment($id){

        if(Auth::id()){

            if(Auth::user()->usertype=='1')
            {

                $appointment = Appointment::find($id);
                $appointment->delete();
                return redirect()->back();

            }else{

                return redirect('/');
            }

        }else{

            return redirect()->back();

        }


    }

    public function email_view($id){

        if(Auth::id()){

            if(Auth::user()->usertype=='1')
            {
                $appointment = Appointment::find($id);

                return view('admin.email_view',compact('appointment'));

            }else{

                return redirect('/');
            }

        }else{

            return redirect()->back();

        }



    }

    public function send_email(Request $request , $id){

        $appointment = Appointment::find($id);

        $details = [

            "greeting" => $request->greeting,
            "body" => $request->body,
            "action_text" => $request->action_text,
            "action_url" => $request->action_url,
            "endpart" => $request->endpart,
        ];

        Notification::send($appointment,new EmailNotification($details));

        return redirect()->back()->with('message','Mail Send Successfully');
    }



}
