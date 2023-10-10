<?php

namespace App\Http\Controllers;

use App\Models\Departments;
use App\Models\Doctors;
use Illuminate\Http\Request;

class DepartmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = Departments::latest()->paginate(5);
        return view('departments.index', compact('departments'))
              ->with('i', (request()->input('page',1) -1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $doctors = Doctors::all();
        if($doctors->count() == 0)
        {
            return redirect()->route('doctors.create');
        }
        return view('departments.create', compact('doctors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

       $request->validate([

           'name' => 'required',
           'description' => 'required',
           'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
           'doctor_id' => 'required'

       ]);



       if ($image = $request->file('image')) {
           $destinationPath = 'images/';
           $profileImage = date('YmdHis').".".$image->getClientOriginalExtension();
           $image->move($destinationPath, $profileImage);
           $input['image'] = "$profileImage";
     }

     Departments::create([
        'name' => $request->name,
        'description' => $request->description,
        'image' =>  $input['image'],
        'doctor_id' => $request->doctor_id
     ]);



     return redirect()->route('departments.index')
            ->with('success', 'department added successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Departments $department)
    {
        return view('departments.show', compact('department'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Departments $department)
    {
        $doctors = Doctors::all();
        if($doctors->count() == 0)
        {
            return redirect()->route('doctors.create');
        }
        return view('departments.edit', compact('department', 'doctors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Departments $department)
    {
        $request->validate([

            'name' => 'required',
            'description' => 'required',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'doctor_id' => 'required'

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

         $department->update($input);

        return redirect()->route('departments.index')
               ->with('success','department updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Departments $department)
    {
        $department->delete();

        return redirect()->route('departments.index')
                ->with('success','department deleted successfully');
    }


    public function trashed()
    {
        $departments = Departments::onlyTrashed()->get();
       return view('departments.softDeleted', compact('departments'));
    }

    public function hdeleted($id)
    {

        $departments = Departments::withTrashed()->where('id', $id);

        if ($departments != null ) {
        $departments->forceDelete();
        return view('departments.softDeleted', compact('departments'));

        }

    }

    public function restore($id)
    {

        $departments = Departments::withTrashed()->where('id', $id)->first();
        $departments->restore();
        return redirect()->route('departments.index');

    }
}
