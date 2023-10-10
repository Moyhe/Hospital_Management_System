@extends('layouts.app')

@section('content')

 <div class="container text-center">
<table class="table table-dark table-striped">
    <thead>
      <tr>
        <th scope="col">message</th>
      </tr>
    </thead>
    <tbody>

    <tr>
      <td>{{ $message->message }}</td>
    </tr>

    </tbody>
  </table>

</div>

@endsection
