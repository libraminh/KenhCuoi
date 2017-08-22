jQuery(document).ready(function( $ ) {
  activeSubMenu();
  activeCarousel();
  countDown();
  searchBtn();

  $('#service-detail-modal').appendTo("body")
});

$(window).scroll(function(){
  scrollNav();
})

// Function Area
function searchBtn() {
  $('.search-btn').on('click', function(){
    $('.search-icon-nav').hide();
    $('.search-btn-input').appendTo('.search-btn-input').show('slow');
    $('.search-btn-input').focus();
  })

  $('html').click(function() {
   $('.search-btn-input').hide();
   $('.search-icon-nav').show();
  });

  $('.search-btn').click(function(event){
       event.stopPropagation();
  });
}

function activeSubMenu() {
  $("#menu").mmenu({
    "extensions": [
      "fx-menu-zoom",
      "theme-white"
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
  if($('body').is('.index-page')) {

    $('.home-carousel-wrap-carousel').owlCarousel({
        items: 1,
        margin: 40,
        loop: true,
        nav: true,
        dots: false,
        navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-angle-right" aria-hidden="true"></i>'],
    });

    $('.home-gallery-carousel').owlCarousel({
        items: 1,
        margin: 40,
        loop: true,
        nav: false,
        dots: false,
        autoplay: true,
        autoplayHoverPause: false,
        autoplayTimeout: 4000,
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

  $('.showcase-global').owlCarousel({
      items: 1,
      margin: 40,
      loop: true,
      nav: true,
      dots: false,
      navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-angle-right" aria-hidden="true"></i>'],
  });

  $('.service-detail-showcase-carousel').owlCarousel({
      items: 1,
      margin: 10,
      loop: true,
      nav: false,
      dots: false,
      navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-angle-right" aria-hidden="true"></i>'],
      URLhashListener:true,
      startPosition: 'URLHash'
  });

  $('.service-detail-showcase-carousel-direction-carousel').owlCarousel({
      items: 3,
      margin: 20,
      loop: false,
      nav: false,
      dots: false,
      rewind: true,
      navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-angle-right" aria-hidden="true"></i>'],
  });

  $('.beauty-pic-detail-showcase-carousel').owlCarousel({
      items: 1,
      margin: 10,
      loop: true,
      nav: false,
      dots: false,
      navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-angle-right" aria-hidden="true"></i>'],
      URLhashListener:true,
      startPosition: 'URLHash',
      responsive:{
        0:{
            items:1,
            margin: 20
        }
      }
  });

  $('.beauty-pic-detail-showcase-carousel-direction').owlCarousel({
      items: 6,
      margin: 10,
      loop: false,
      nav: false,
      dots: false,
      rewind: true,
      navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-angle-right" aria-hidden="true"></i>'],
      responsive:{
        0:{
            items:3,
            margin: 20
        },
        768:{
            margin: 20,
            items:3
        },
        1000:{
            items:6,
            margin: 10
        },
      }
  });
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

function scrollNav() {
  var wScroll = $(window).scrollTop();
  if(wScroll > 150) {
    $('.header').addClass('open-header');
    $('.header-banner').slideUp();
  } else {
    $('.header').removeClass('open-header');
    $('.header-banner').slideDown();
  }
}
