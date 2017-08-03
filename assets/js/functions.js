jQuery(document).ready(function( $ ) {
  activeSubMenu();
  activeCarousel();
  // hamburgerBtn();
  countDown();

  $('img[src$=".svg"]').each(function() {
        var $img = jQuery(this);
        var imgURL = $img.attr('src');
        var attributes = $img.prop("attributes");

        $.get(imgURL, function(data) {
            // Get the SVG tag, ignore the rest
            var $svg = jQuery(data).find('svg');

            // Remove any invalid XML tags
            $svg = $svg.removeAttr('xmlns:a');

            // Loop through IMG attributes and apply on SVG
            $.each(attributes, function() {
                $svg.attr(this.name, this.value);
            });

            // Replace IMG with SVG
            $img.replaceWith($svg);
        }, 'xml');
    });

});

// $(window).resize(function(){
//   if ($(window).width() < 992) {
//     activeSubMenu();
//   }
// })

// Function Area
function activeSubMenu() {
  $("#menu").mmenu({
    "extensions": [
      "fx-menu-zoom",
    ],
    "counters": true,
  }, {
     clone: true
  });

  var API = $("#mm-menu").data( "mmenu" );

  $("#mm-open-menu").click(function() {
     API.open();
  });
}

function activeCarousel() {
  if($('body').is('.home-page')) {

    $('.home-carousel-wrap-carousel').owlCarousel({
        items: 1,
        margin: 40,
        loop: true,
        nav: true,
        dots: false,
        autoHeight: true,
        navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-angle-right" aria-hidden="true"></i>'],
    });

    $('.home-gallery-carousel').owlCarousel({
        items: 1,
        margin: 40,
        loop: true,
        nav: false,
        dots: false,
        navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-angle-right" aria-hidden="true"></i>'],
        URLhashListener:true,
        autoplayHoverPause:true,
        startPosition: 'URLHash'
    });

    $('.home-gallery-direction').owlCarousel({
        items: 4,
        margin: 15,
        loop: true,
        nav: false,
        dots: false,
        navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-angle-right" aria-hidden="true"></i>'],
        URLhashListener:true,
        autoplayHoverPause:true,
        startPosition: 'URLHash',
        responsive:{
          0:{
              items:4,
          },
          768:{
              margin: 20,
              items:4,
          },
          1000:{
              items:4,
          },
        }
    });
  }
}

function hamburgerBtn() {
  var forEach=function(t,o,r){if("[object Object]"===Object.prototype.toString.call(t))for(var c in t)Object.prototype.hasOwnProperty.call(t,c)&&o.call(r,t[c],c,t);else for(var e=0,l=t.length;l>e;e++)o.call(r,t[e],e,t)};

  var hamburgers = document.querySelectorAll(".hamburger");
  if (hamburgers.length > 0) {
    forEach(hamburgers, function(hamburger) {
      hamburger.addEventListener("click", function() {
        this.classList.toggle("is-active");
      }, false);
    });
  }
}

function countDown() {
  $('#clock').countdown('2017/08/20', function(event) {
    var $this = $(this).html(event.strftime(''
      + '<span class="wrap-count">%D <span class="break">NGÀY</span> </span>'
      + '<span class="wrap-count">%H <span class="break">GIỜ</span> </span>'
      + '<span class="wrap-count">%M <span class="break">PHÚT</span> </span>'
      + '<span class="wrap-count">%S <span class="break">GIÂY</span> </span>'
      ));
  });
}
