<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Models\Doctors;
use App\Models\Departments;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $doctors = Doctors::latest()->limit(3)->get();
        $departments = Departments::latest()->limit(4)->get();
        return view('home.index', compact('doctors', 'departments'));

    }

    public function doctors()
    {
        $doctors = Doctors::latest()->paginate(12);
        return view('home.doctors', compact('doctors'))
              ->with('i', (request()->input('page',1) -1) * 12);
    }

    public function departments()
    {
        $departments = Departments::latest()->paginate(12);
        return view('home.departments', compact('departments'))
                ->with('i', (request()->input('page',1) -1) * 12);
    }

    public function about()
    {
        return view('home.about');
    }

    public function bookDate(Request $request)
    {
        $request->validate([

            'patient_name'=>'required',
            'phone'=>'required',
            'doctor' => 'required',
            'symptoms' => 'required',
            'booking_date' => 'required',
            'department' => 'required',

        ]);



         Booking::create([

            'patient_name'=> $request->patient_name,
            'phone'=>$request->phone,
            'doctor' => $request->doctor,
            'symptoms' => $request->symptoms,
            'booking_date' => $request->booking_date,
            'department' => $request->department,
            'user_id' => Auth::id()

         ]);

         return redirect()->route('home')
                ->with('success','your date was registered');
    }

}
