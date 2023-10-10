@extends('includes.header')

@section('content')


 <!-- department section -->
 <section class="department_section layout_padding">

    <div class="department_container">

     <div class="container">

        <div class="heading_container heading_center">
            <h2>
              Our Departments
            </h2>
            <p>
              Asperiores sunt consectetur impedit nulla molestiae delectus repellat laborum dolores doloremque accusantium
            </p>
          </div>

       <div class="row">

      @foreach ($departments as $department)
      <div class="col-md-3">
        <div class="box ">
          <div class="img-box">
            <img src="/images/{{$department->image}}" alt="NO">
          </div>
          <div class="detail-box">
            <h5>
              {{ $department->name }}
            </h5>
            <p>
              {{ $department->description }}
            </p>
          </div>
        </div>
      </div>
      @endforeach

       </div>

    </div>

    </div>
 </section>
<!-- end department section -->
@include('includes.footer')

@endsection
