import $ from 'jquery';
import 'slick-carousel';
import 'bootstrap/js/dist/collapse';

$(document).ready (function () {
    $('.testimonials-slider').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 3,
        arrows: false,
        dots: true,
        adaptiveHeigh: true,
        arrows: true,
        prevArrow: $('.slick-prev'),
        nextArrow:  $('.slick-next'),
        appendArrows:  $('.slider-nav'),
        appendDots: $('.dots'),


        responsive: [
          {
            breakpoint: 992,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 2,
              dots: true
            }
          },
          {
            breakpoint: 768,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
              dots: false
            }
          },
        ]
      });
      

      //burger menu

      $('.menu-open-btn').on('click', function(e) {
        e.preventDefault();

        setTimeout (function() {
          $(this).closest('.nav').toggleClass('is-open');
        }.bind(this), 0);
      });

      //cnange color header on scroll

      $(window).on('scroll', function(e) {
        if (window.scrollY > 0) {
          $('.header').addClass('scrolled');
        }
          else {
            $('.header').removeClass('scrolled');
          }
      })

      //button to top 
      $(window).on('scroll', function(e) {
        if (window.scrollY > 100) {
          $('.to-top').addClass('active');
        }
          else {
            $('.to-top').removeClass('active');
          }
      })

      $('.to-top').on('click', function(e) {
        e.preventDefault();
        $('html').stop().animate({scrollTop: 0}, 0.5);
    });

});
