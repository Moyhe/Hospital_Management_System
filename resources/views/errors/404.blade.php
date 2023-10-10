<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Error</title>
    <link type="text/css" rel="stylesheet" href="{{ asset('css/app.css')}}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">

</head>
<body>

        <!-- LOADER -->
        <div id="preloader">
            <img class="preloader" src="/avatars/heart-loading2.gif" alt="">
         </div>
        <!-- END LOADER -->


           <!-- header -->
           <div class="header">
            <div class=" container">
              <div class="row">
                 <div class="col-md-12">
                    <a class="logo" href="{{ route('home') }}"><img src="/avatars/logo.png" alt="NO"/></a>
                 </div>
              </div>
           </div>
         </div>
         <!-- end header -->

     <!-- mobile_section -->
      <div class="mobile_section">
        <div class="container">
           <div class="row">
              <div class="col-md-12">
                 <div class="demo_box text-center">
                    <h1>Sorry</h1>
                    <figure><img src="/avatars/demo2.png" alt="NO"/></figure>
                 </div>
              </div>
              <div class="col-md-12">
                 <div class="creative text-center">
                    <span>Page </span>
                    <p>The page you requested can not be found in our system</p>
                    <a class="read_more" href="{{ route('home') }}">Go Back</a>
                 </div>
              </div>
           </div>
        </div>
     </div>
     <!-- end mobile_section -->

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js" integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="{{ asset('/js/app.js') }}"></script>

</body>
</html>
