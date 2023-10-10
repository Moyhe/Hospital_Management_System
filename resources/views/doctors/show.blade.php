@extends('layouts.app')

@section('content')

<div class="container mt-4">

    <div class="card" style="width: 18rem;">
        <img src="/images/{{$doctor->image}}" class="card-img-top" alt="...">
        <div class="card-body">
          <p class="card-text">{{ $doctor->bio }}</p>
        </div>
      </div>

</div>


@endsection
