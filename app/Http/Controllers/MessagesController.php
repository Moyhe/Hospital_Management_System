<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Messages;
use Illuminate\Support\Facades\Auth;

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $messages = Messages::latest()->paginate(5);
        return view('messages.index', compact('messages'))
               ->with('i', (request()->input('page',1) -1) * 5);
    }

        /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('home.contact-us');
    }

    /**
     * Display the specified resource.
     */
    public function show(Messages $message)
    {
        return view('messages.show', compact('message'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

       $request->validate([

           'name' => 'required',
           'phone' => 'required',
           'email'=>'required|unique:messages',
           'message' => 'required',



       ]);

         Messages::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'message' => $request->message,
            'user_id' => Auth::id()
        ]);


     return redirect()->route('messages.create')
            ->with('success', 'message added successfully');

    }

       /**
     * Remove the specified resource from storage.
     */
    public function destroy(Messages $message)
    {
        $message->delete();

        return redirect()->route('messages.index')
               ->with('success','message deleted successfully');
    }

}

