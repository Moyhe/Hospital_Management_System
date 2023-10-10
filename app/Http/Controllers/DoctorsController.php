<?php

namespace App\Http\Controllers;

use App\Models\Departments;
use App\Models\Doctors;
use Illuminate\Http\Request;


class DoctorsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $departments = Departments::latest()->paginate(5);
        $doctors = Doctors::latest()->paginate(5);
        return view('doctors.index', compact('doctors', 'departments'))
               ->with('i', (request()->input('page',1) -1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('doctors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'age'=>'required',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'gender' => 'required',
            'bio' => 'required'
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis').".".$image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
         }

         Doctors::create($input);
         return redirect()->route('doctors.create')
                ->with('success','doctor added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Doctors $doctor)
    {
        return view('doctors.show', compact('doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Doctors $doctor)
    {
        return view('doctors.edit', compact('doctor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Doctors $doctor)
    {
        $request->validate([
            'name'=>'required',
            'age'=>'required',
            'gender' => 'required',
            'bio' => 'required'
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis').".".$image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
         }else{
             unset($input['image']);
         }

        $doctor->update($input);

        return redirect()->route('doctors.index')
               ->with('success','doctors updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Doctors $doctor)
    {
        $doctor->delete();

        return redirect()->route('doctors.index')
               ->with('success','doctors deleted successfully');
    }

    public function trashed()
    {
        $doctors = Doctors::onlyTrashed()->get();
       return view('doctors.softDeleted', compact('doctors'));
    }

    public function hdeleted($id)
    {

        $doctors = Doctors::withTrashed()->where('id', $id);

        if ($doctors != null ) {
        $doctors->forceDelete();
        return view('doctors.softDeleted', compact('doctors'));

        }

    }

    public function restore($id)
    {

        $doctor = Doctors::withTrashed()->where('id', $id)->first();
        $doctor->restore();
        return redirect()->route('doctors.index');

    }
}
