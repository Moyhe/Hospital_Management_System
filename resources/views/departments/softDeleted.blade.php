@extends('layouts.app')

@section('content')


   @if (count($departments) > 0)
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
        <th scope="col">image</th>
        <th scope="col">{{__('Delete For Ever')}}</th>
        <th scope="col">{{__('restore')}}</th>

      </tr>
    </thead>
    <tbody>

    @foreach ($departments as $department)
    <tr>
        <th scope="row">{{ $department->id }}</th>
        <td>{{ $department->name}}</td>
        <td><img src="/images/{{$department->image}}" width="300px"></td>
        <div class="container m-3">
            <div class="row">
            @auth
            <td>
             <div class="col m-4">
                <form action="{{route('department.hdeleted', $department->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
              </div>
            </td>
            <td>
              <div class="col m-4">
                <a class="btn btn-dark" href="{{route('department.restore', $department->id)}}">Restore</a>
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
