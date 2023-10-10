
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
       <div class="btn-box">
        <a href="{{ route('departments') }}">
          View All
        </a>
      </div>
    </div>

    </div>
 </section>
<!-- end department section -->



  <!-- about section -->
  <section class="about_section layout_padding">
    <div class="container ">
      <div class="heading_container heading_center">
        <h2>
          <span class="design_dot"></span>
          About Our Hospital
        </h2>
      </div>
      <div class="col-md-7 mx-auto px-0 wow fadeIn">
        <div class="img-box b2">
          <img src="/avatars/about-img.png" alt="" />
        </div>
      </div>
      <div class="col-md-9 mx-auto px-0">
        <div class="detail-box">
          <p>
            Esse sed doloribus error ad laborum dolorem nobis? Cum, culpa? Distinctio natus excepturi fugit eveniet quasi animi ab obcaecati laudantium sit, ratione recusandae accusamus, voluptatum iste placeat. Esse, eos cumque.
            Culpa nesciunt quia qui possimus eveniet dolore a debitis consectetur quod. Eligendi recusandae placeat soluta
          </p>
          <a href="{{ route('about')}}">
            Read More
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- end about section -->


   <!-- doctor section -->


   <section class="doctor_section layout_padding">
    <div class="container">

    <div class="heading_container heading_center">
            <h2>
              Our Doctors
            </h2>
            <p class="col-md-10 mx-auto px-0">
              Incilint sapiente illo quo praesentium officiis laudantium nostrum, ad adipisci cupiditate sit, quisquam aliquid. Officiis laudantium fuga ad voluptas aspernatur error fugiat quos facilis saepe quas fugit, beatae id quisquam.
            </p>
          </div>


    <div class="row">

        @foreach ($doctors as $doctor)
        <div class="col-sm-6 col-lg-4 mx-auto">
            <div class="box  wow fadeIn">
                <div class="img-box">
                  <img src="/images/{{$doctor->image}}" alt="">
                </div>
                <div class="detail-box">
                  <div class="social_box">
                    <a href="">
                        <i class="fa-brands fa-facebook"></i>
                    </a>
                    <a href="">
                        <i class="fa-brands fa-twitter"></i>
                    </a>
                    <a href="">
                        <i class="fa-brands fa-youtube"></i>
                    </a>
                    <a href="">
                        <i class="fa-brands fa-linkedin"></i>
                    </a>
                  </div>
                  <h5>
                  {{ $doctor->name }}
                  </h5>
                  <h6 class="">
                    Doctor
                  </h6>
                </div>
              </div>
            </div>
        @endforeach

        </div>

        <div class="btn-box">
            <a href="{{ route('doctors') }}">
              View All
            </a>
          </div>
    </div>

    </section>

    <!-- end doctor section -->

  <!-- Book section -->

  <section class="book_section layout_padding">
  <div class="container">
     <div class="row">
        <div class="col  wow fadeIn">
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
          <form action="{{ route('booking') }}" method="post">

            @csrf
            @method('POST')

            <h4>
                BOOK <span>APPOINTMENT</span>
            </h4>

            <div class="row">

        <div class="mb-3 col-lg-4 ">
            <label for="inputPatientName" class="form-label">Patient Name</label>
            <input type="text" class="form-control" name="patient_name" id="inputPatientName" placeholder="">
        </div>

      <div class="mb-3  col-lg-4 ">
        <label for="inputDoctortName" class="form-label">Doctor Name</label>
        <select class=" form-control wide" name="doctor" id="inputDoctortName" aria-label="Default select example">
            <option selected>choose doctor name</option>
           @foreach ($doctors as $doctor)
           <option value="{{ $doctor->name }}">{{ $doctor->name }}</option>
           @endforeach
        </select>
      </div>

      <div class="mb-3 col-lg-4 ">
        <label for="inputDepartmentName" class="form-label">Department Name</label>
        <select class=" form-control wide" name="department" id="inputDepartmentName" aria-label="Default select example">
             <option selected>choose department name</option>
             @foreach ($departments as $department)
             <option value="{{ $department->name }}">{{ $department->name }}</option>
             @endforeach
        </select>
      </div>

    </div>

    <div class="row">

    <div class="mb-3 col-lg-4">
        <label for="inputPhone" class="form-label">Phone Number</label>
        <input type="number" class="form-control" name="phone" id="inputPhone" placeholder="XXXXXXXXXX">
    </div>

    <div class="mb-3  col-lg-4">
        <label for="inputSymptoms" class="form-label">Symptoms</label>
        <input type="text" class="form-control" name="symptoms" id="inputSymptoms" placeholder="">
    </div>

    <div class="mb-3 mt-2 col-lg-4">
        <label for="inputDate">Choose Date</label>
        <div class="input-group date" id="inputDate"  data-date-format="mm-dd-yyyy">
          <input type="text" name="booking_date" class="form-control"  readonly>
          <span class="input-group-addon date_icon">
            <i class="fa-solid fa-calendar-days"></i>
          </span>
        </div>
    </div>

    </div>
    <div class="btn-box">
        <button type="submit" class="btn">Book</button>
    </div>
        </form>
        </div>
     </div>
  </div>

  </section>

 <!-- end Book Section -->

 <!-- client section -->

<section class="client_section layout_padding-bottom">
  <div class="container">
    <div class="heading_container heading_center ">
        <h2>
          Testimonial
        </h2>
    </div>

    <div id="carouselExample" class="carousel slide">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="row">
               <div class="col-md-11 col-lg-10 mx-auto">
                 <div class="box">
                    <div class="img-box">
                        <img src="/avatars/muhammed.jpg" alt="" />
                    </div>
                    <div class="detail-box">
                        <div class="name">
                          <h6>
                            Alan Emerson
                          </h6>
                        </div>
                        <p>
                          Enim consequatur odio assumenda voluptas voluptatibus esse nobis officia. Magnam, aspernatur nostrum explicabo, distinctio laudantium delectus deserunt quia quidem magni corporis earum inventore totam consectetur corrupti! Corrupti, nihil sunt? Natus.
                        </p>
                        <i class="fa-solid fa-quote-left"></i>
                    </div>
                </div>
               </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="row">
                <div class="col-md-11 col-lg-10 mx-auto">
                  <div class="box">
                     <div class="img-box">
                         <img src="/avatars/muhammed.jpg" alt="" />
                     </div>
                     <div class="detail-box">
                         <div class="name">
                           <h6>
                             Alan Emerson
                           </h6>
                         </div>
                         <p>
                           Enim consequatur odio assumenda voluptas voluptatibus esse nobis officia. Magnam, aspernatur nostrum explicabo, distinctio laudantium delectus deserunt quia quidem magni corporis earum inventore totam consectetur corrupti! Corrupti, nihil sunt? Natus.
                         </p>
                         <i class="fa-solid fa-quote-left"></i>
                     </div>
                 </div>
                </div>
             </div>
          </div>
          <div class="carousel-item">
            <div class="row">
                <div class="col-md-11 col-lg-10 mx-auto">
                  <div class="box">
                     <div class="img-box">
                         <img src="/avatars/muhammed.jpg" alt="" />
                     </div>
                     <div class="detail-box">
                         <div class="name">
                           <h6>
                             Alan Emerson
                           </h6>
                         </div>
                         <p>
                           Enim consequatur odio assumenda voluptas voluptatibus esse nobis officia. Magnam, aspernatur nostrum explicabo, distinctio laudantium delectus deserunt quia quidem magni corporis earum inventore totam consectetur corrupti! Corrupti, nihil sunt? Natus.
                         </p>
                         <i class="fa-solid fa-quote-left"></i>
                     </div>
                 </div>
                </div>
             </div>
          </div>
        </div>
       <div class="carousel_btn-container">
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
       </div>
      </div>

  </div>

</section>

 <!-- end client section -->

 @include('includes.footer')

@endsection



