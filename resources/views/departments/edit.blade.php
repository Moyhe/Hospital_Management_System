@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
      <div class="col-md-8">
        @if (count($errors) > 0)
            @foreach ($errors->all() as $error)
            <div class="alert alert-danger" role="alert">
                {{$error}}
            </div>
            @endforeach
            @endif
            <br>

            @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
               {{$message}}
            </div>
            @endif

        <form method="POST" action="{{route('departments.update', $department->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">{{__('Doctors')}}</label>
                <select class="form-select" aria-label="Default select example" name="doctor_id">

                 @foreach ($doctors as $doctor)
                    @if ($doctor->id === $department->doctor_id )
                    <option value="{{ $doctor->id }}" selected>{{ $doctor->name }}</option>
                    @endif
                 @endforeach
                </select>
              </div>
              <hr>
            <div class="mb-3">
                   <label for="formGroupExampleInput" class="form-label">Department Name</label>
                   <input type="text" class="form-control" name="name" value="{{ $department->name }}" id="formGroupExampleInput" placeholder="Enter Your Department">
                 </div>
                 <hr>
                   <div class="mb-3">
                       <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                       <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="8" cols="8">
                        {{ $department->description }}
                       </textarea>
                   </div>
                     <hr>
                   <br> <br>

                   <div class="mb-3">
                    <img class="rounded" src="/images/{{$department->image}}" alt="no" width="300px">
                   </div>

                   <div class="input-group mb-3">
                       <input type="file" class="form-control" name="image" id="inputGroupFile02">
                       <label class="input-group-text" for="inputGroupFile02">Upload</label>
                   </div>

                <button type="submit" class="btn btn-dark mt-3">Submit</button>
             </form>

      </div>
    </div>
  </div>
@endsection
