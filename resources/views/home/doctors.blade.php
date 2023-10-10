@extends('includes.header')

@section('content')



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
            <div class="box">
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
    </div>

    </section>

    <!-- end doctor section -->
    @include('includes.footer')
@endsection
