<?php

namespace App\Http\Controllers;

use App\Models\Booking;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookings = Booking::latest()->paginate(5);
        return view('booking.index', compact('bookings'))
               ->with('i', (request()->input('page',1) -1) * 5);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        $booking->delete();

        return redirect()->route('booking.index')
               ->with('success','booking deleted successfully');
    }
}
