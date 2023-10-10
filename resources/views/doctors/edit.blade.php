@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
      <div class="col-md-8">
            <br>

            @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
            {{$message}}
            </div>
            @endif

         <form  action="{{route('doctors.update', $doctor->id)}}" method="POST" enctype="multipart/form-data">
               @csrf
               @method('PUT')
               <div class="mb-3">
                   <label for="formGroupExampleInput" class="form-label">Name</label>
                   <input type="text" class="form-control" name="name" id="formGroupExampleInput" value="{{$doctor->name}}">
                 </div>
                <hr>
                 <div class="mb-3">
                   <label for="formGroupExampleInput2" class="form-label">Age</label>
                   <input type="text" class="form-control" name="age" id="formGroupExampleInput2" value="{{$doctor->age}}">
                 </div>
                 <hr>
                   <div class="mb-3">
                       <label for="exampleFormControlTextarea1" class="form-label">Bio</label>
                       <textarea class="form-control" name="bio" id="exampleFormControlTextarea1" rows="8" cols="8">
                          {{$doctor->bio}}
                       </textarea>
                   </div>
                     <hr>
                     <label for="">Gender</label>
                       <br>
                      @if ($doctor->gender == 'Male')
                      <div class="form-checkform-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" checked value="{{$doctor->gender}}">
                        <label class="form-check-label" for="inlineRadio1">Male</label>
                      </div>

                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="Female" disabled>
                        <label class="form-check-label" for="inlineRadio2">Female</label>
                      </div>
                      @else
                      <div class="form-checkform-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="Male" disabled>
                        <label class="form-check-label" for="inlineRadio1">Male</label>
                      </div>

                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" checked value="{{$doctor->gender}}" >
                        <label class="form-check-label" for="inlineRadio2">Female</label>
                      </div>
                      @endif

                   <br> <br>

                   <div class="mb-3">
                    <img class="rounded" src="/images/{{$doctor->image}}" width="300px">
                   </div>

                   <div class="input-group mb-3">

                       <input type="file" class="form-control" name="image" id="inputGroupFile02">
                       <label class="input-group-text" for="inputGroupFile02">Upload</label>
                   </div>
                <button type="submit" class="btn btn-success mt-3">Update</button>
             </form>

      </div>
    </div>
  </div>
@endsection
