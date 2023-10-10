@extends('layouts.app')

@section('content')


   @if (count($doctors) > 0)
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
        <th scope="col">name</th>
        <th scope="col">age</th>
        <th scope="col">gender</th>
        <th scope="col">image</th>
        <th scope="col">{{__('Delete For Ever')}}</th>
        <th scope="col">{{__('restore')}}</th>

      </tr>
    </thead>
    <tbody>

    @foreach ($doctors as $doctor)
    <tr>
        <th scope="row">{{ $doctor->id }}</th>
        <td>{{ $doctor->name}}</td>
        <td>{{ $doctor->age}}</td>
        <td>{{ $doctor->gender }}</td>
        <td><img src="/images/{{$doctor->image}}" width="300px"></td>

        <div class="container p-5">
            <div class="row">
            @auth
            <td>
             <div class="col">
                <form action="{{route('doctor.hdeleted', $doctor->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
              </div>
            </td>
            <td>
              <div class="col">
                <a class="btn btn-dark" href="{{route('doctor.restore', $doctor->id)}}">Restore</a>
              </div>
            </td>
             @endauth
            </div>
          </div>
      </tr>

    @endforeach

    </tbody>
  </table>
   @else
   <div class="alert alert-dark container mt-5" role="alert">
    NO Trashed Found !!!
   </div>
   @endif

</div>
@endsection
