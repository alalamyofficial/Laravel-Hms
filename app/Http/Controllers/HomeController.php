<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Appointment;

class HomeController extends Controller
{
    public function redirect(){

        if(Auth::id()){

            if(Auth::user()->usertype=='0')
            {
                $doctors = Doctor::latest()->get();
                return view('user.home',compact('doctors'));

            }else{

                $doctors = Doctor::latest()->get();
                $appointments = Appointment::all();
                $users = User::all();

                return view('admin.home',compact('doctors','appointments','users'));
            }

        }else{

            return redirect()->back();

        }

    }

    public function index(){

        $doctors = Doctor::latest()->get();
        return view('user.home',compact('doctors'));

    }

    public function appointment(Request $request){

        $appointment = new Appointment;

        $appointment->name = $request->name;
        $appointment->email = $request->email;
        $appointment->date = $request->date;
        $appointment->phone = $request->phone;
        $appointment->message = $request->message;
        $appointment->doctor = $request->doctor;
        $appointment->status = "In Progress";

        if(Auth::id()){
            $appointment->user_id = Auth::id();
        }

        $appointment->save();

        return redirect()->back()
                        ->with('message','Appointment Request Successfully . We Will Contact You Soon');
    }

    public function myappointments(){

        if(Auth::id()){

            $userId = Auth::user()->id;

            $appointments = Appointment::where('user_id',$userId)->get();

            return view('user.myappointments',compact('appointments'));  

        }else{
            return redirect()->back();
        }

    }

    public function cancel_appointment($id){

        $appointment = Appointment::find($id);
        $appointment->delete();
        return redirect()->back();

    }
}
