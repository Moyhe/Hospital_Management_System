@extends('layouts.app')

@section('content')

   @if (count($bookings) > 0)
   <div class="table-responsive container">

    @if ($message = Session::get('success'))
    <div class="alert alert-success" role="alert">
     {{$message}}
    </div>
    @endif

<table class="table table-dark table-striped">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">patient name</th>
        <th scope="col">phone</th>
        <th scope="col">symptoms</th>
        <th scope="col">Doctor</th>
        <th scope="col">Department</th>
        <th scope="col">booking_date</th>
        <th scope="col">Action</th>

      </tr>
    </thead>
    <tbody>

    @foreach ($bookings as $booking)
    <tr>
        <th scope="row">{{ $booking->id }}</th>
        <td>{{ $booking->patient_name}}</td>
        <td>{{ $booking->phone }}</td>
        <td>{{ $booking->symptoms }}</td>
        <td>{{ $booking->doctor }}</td>
        <td>{{ $booking->department }}</td>
        <td>{{ $booking->booking_date }}</td>
        <td>
        <div class="container ">
            <div class="row">
            @auth
             <div class="col">
                <form action="{{route('bookings.destroy', $booking->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                     </form>
              </div>
             @endif
            </div>
          </div>
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>
   @else
   <div class="alert alert-dark container mt-5" role="alert">
    NO bookings Found !!!
   </div>
   @endif

  {{ $bookings->links()  }}
</div>
@endsection
