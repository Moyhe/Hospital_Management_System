
/** google_map js **/
function myMap() {
    var mapProp = {
        center: new google.maps.LatLng(40.712775, -74.005973),
        zoom: 18,
    };
    var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
}


// nice select

$(document).ready(function() {
    $('select').niceSelect();

    // $("i").click(function() {

    //     $("input[type=search]").toggleClass('active');


    // });
});
// date picker

// date picker
$(function () {

    "use strict";

    $("#inputDate").datepicker({
        autoclose: true,
        todayHighlight: true
    }).datepicker('update', new Date());


/* Loader page */

      setTimeout(() => {
          $("#preloader").fadeToggle();
      }, 1000);

/* Back to top */

$(window).scroll(function () {
    if ($(this).scrollTop() > 1) {
        $('.dmtop').css({
            bottom: "75px"
        });
    } else {
        $('.dmtop').css({
            bottom: "-100px"
        });
    }
});

$(".dmtop").click(function() {
    $("html, body").animate({ scrollTop: 0 }, "slow");
    return false;
});




});



