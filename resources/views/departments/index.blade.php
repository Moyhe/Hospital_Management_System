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
        <th scope="col">Actions</th>

      </tr>
    </thead>
    <tbody>

    @foreach ($departments as $department)
    <tr>
        <th scope="row">{{ $department->id }}</th>
        <td>{{ $department->name}}</td>
        <td><img src="/images/{{$department->image}}" alt="no" class="rounded img-thumbnail" width="300px"></td>
        <td>
        <div class="container p-5">
            <div class="row">
              <div class="col">
       <a class="btn btn-info" href="{{route('departments.show', $department->id)}}">Show</a>
              </div>

            @auth

             <div class="col">
                <form action="{{route('departments.destroy', $department->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                     </form>
              </div>

              <div class="col">
                <a class="btn btn-success" href="{{route('departments.edit', $department->id)}}">Edit</a>
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
    NO Departments Found !!!
   </div>
   @endif

  {{ $departments->links()  }}
</div>
@endsection
