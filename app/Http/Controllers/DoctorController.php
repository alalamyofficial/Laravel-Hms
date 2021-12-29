<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;

class DoctorController extends Controller
{
    public function show(){

        $doctors = Doctor::latest()->get();

        return view('doctors',compact('doctors'));

    }
}
