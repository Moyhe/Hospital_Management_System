@extends('includes.header')

@section('content')

  <!-- contact section -->
  <section class="contact_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>
          Get In Touch
        </h2>
      </div>
      <div class="row">
        <div class="col-md-6">

          <div class="form_container">
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
            <form action="{{ route('messages.store') }}" method="post">
                @csrf
                @method('POST')
              <div class="row">
                <div class="col-lg-6">
                  <div>
                    <input type="text" name="name" placeholder="Your Name" />
                  </div>
                </div>
                <div class="col-lg-6">
                  <div>
                    <input type="text" name="phone" placeholder="Phone Number" />
                  </div>
                </div>
              </div>
              <div>
                <input type="email" name="email" placeholder="Email" />
              </div>
              <div>
                <input type="text" name="message" class="message-box" placeholder="Message" />
              </div>
              <div class="btn_box">
                <button>
                  SEND
                </button>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-6">
          <div class="map_container">
            <div class="map">
             <img src="/avatars/slider-img.png" class="img-fluid"  alt="">
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end contact section -->

  @include('includes.footer')
@endsection
