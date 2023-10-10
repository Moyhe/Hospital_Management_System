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
        <th scope="col">Actions</th>

      </tr>
    </thead>
    <tbody>

    @foreach ($doctors as $doctor)
    <tr>
        <th scope="row">{{ $doctor->id }}</th>
        <td>{{ $doctor->name}}</td>
        <td>{{ $doctor->age}}</td>
        <td>{{ $doctor->gender }}</td>
        <td><img src="/images/{{$doctor->image}}" class="rounded img-thumbnail" width="300px"></td>
        <td>
        <div class="container p-5">
            <div class="row">
              <div class="col">
       <a class="btn btn-info" href="{{route('doctors.show', $doctor->id)}}">Show</a>
              </div>

            @auth

             <div class="col">
                <form action="{{route('doctors.destroy', $doctor->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>

              </div>

              <div class="col">
                <a class="btn btn-success" href="{{route('doctors.edit', $doctor->id)}}">Edit</a>
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
    NO Doctors Found !!!
   </div>
   @endif

  {{ $doctors->links()  }}
</div>
@endsection
