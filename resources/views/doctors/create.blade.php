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
        <form method="POST" action="{{route('doctors.store')}}" enctype="multipart/form-data">
            @csrf
            @method('POST')
               <div class="mb-3">
                   <label for="formGroupExampleInput" class="form-label">Name</label>
                   <input type="text" class="form-control" name="name" id="formGroupExampleInput" placeholder="Enter Your Name">
                 </div>
                <hr>
                 <div class="mb-3">
                   <label for="formGroupExampleInput2" class="form-label">Age</label>
                   <input type="text" class="form-control" name="age" id="formGroupExampleInput2" placeholder="Enter Your Age">
                 </div>
                 <hr>
                   <div class="mb-3">
                       <label for="exampleFormControlTextarea1" class="form-label">Bio</label>
                       <textarea class="form-control" name="bio" id="exampleFormControlTextarea1" rows="8" cols="8"></textarea>
                   </div>
                     <hr>
                     <label for="">Gender</label>
                       <br>
                    <div class="form-checkform-check-inline">
                       <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="Male">
                       <label class="form-check-label" for="inlineRadio1">Male</label>
                     </div>

                     <div class="form-check form-check-inline">
                       <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="Female">
                       <label class="form-check-label" for="inlineRadio2">Female</label>
                     </div>
                   <br> <br>
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
