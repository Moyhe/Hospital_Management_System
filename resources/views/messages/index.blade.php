@extends('layouts.app')

@section('content')

   @if (count($messages) > 0)
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
        <th scope="col">phone</th>
        <th scope="col">Email</th>
        <th scope="col">Actions</th>

      </tr>
    </thead>
    <tbody>

    @foreach ($messages as $message)
    <tr>
        <th scope="row">{{ $message->id }}</th>
        <td>{{ $message->name}}</td>
        <td>{{ $message->phone }}</td>
        <td>{{ $message->email }}</td>
        <td>
        <div class="container p-5">
            <div class="row">
              <div class="col">
       <a class="btn btn-info" href="{{route('messages.show', $message->id)}}">Show</a>
              </div>

            @auth

             <div class="col">
                <form action="{{route('messages.destroy', $message->id)}}" method="POST">
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
    NO Messages Found !!!
   </div>
   @endif

  {{ $messages->links()  }}
</div>
@endsection
