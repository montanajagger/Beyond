(function ($) {
    "use strict";

    // Script for OffCanvas Menu Activation
    $(document).ready(function () {
        $('.toggle-bar').on('click', function () {
            $('.off-canvas-menu-wrap, .off-canvas-overlay').addClass('active');
        })

        $('.cls-off-canvas-menu').on('click', function () {
            $('.off-canvas-menu-wrap, .off-canvas-overlay').removeClass('active');
        })
    })


    $(document).ready(function() {
  
        var scrollLink = $('.scroll');
        
        // Smooth scrolling
        scrollLink.click(function(e) {
          e.preventDefault();
          $('body,html').animate({
            scrollTop: $(this.hash).offset().top-60,
          }, 1000 );
        });
        
        // Active link switching
        $(window).scroll(function() {
          var scrollbarLocation = $(this).scrollTop();
          
          scrollLink.each(function() {
            
            var sectionOffset = $(this.hash).offset().top-100;
            
            if ( sectionOffset <= scrollbarLocation) {
              $(this).parent().addClass('active');
              $(this).parent().siblings().removeClass('active');
            }
          })
          
        })
        
      })
    
    
      $('.off-canvas-menu li a').on('click', function(){
        $('.off-canvas-menu-wrap, .off-canvas-overlay').removeClass('active');
      })


    $(window).on('scroll', function(event) {    
        var scroll = $(window).scrollTop();
        if (scroll < 30) {
            $(".header-area").removeClass("shirnkk");
        } else{
            $(".header-area").addClass("shirnkk");
        }
    });






        // screenshot area
        var swiper = new Swiper('.swiper-container', {
//            autoplay: {
//                delay: 4000,
//            },
            
            speed: 1000,
            effect: 'coverflow',
            loop: true,
            centeredSlides: true,
            slidesPerView: 'auto',
            coverflowEffect: {
                rotate: 0,
                stretch: 0,
                depth: 0,
                modifier: 1,
                slideShadows : false,
            },
            spaceBetween: 5,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
              },
        });





    // Script for Slick Slider Activation
    $('.testimonial-active').slick({
        infinite: true,
        dots:true,
        speed: 1000,
        slidesToShow: 1,
        slidesToScroll: 1,
        centerMode: true,
        prevArrow: '.nav-left',
        nextArrow: '.nav-right'
    });



    // Script for Nice Select Activation 
    $(document).ready(function () {
        $('select').niceSelect();
    })


    // Script for Magnific Popup Activation 
    $(document).ready(function () {
        $('.iframe-link').magnificPopup({ type: 'iframe' });
    });



    // Script For Scroll to top Button
    $(document).ready(function () {
        var back = $('.back-to-top');
        back.on('click', function () {
            $('html, body').animate({
                scrollTop: 0,
            }, 900);
        })
        $(window).on('scroll', function () {
            var self = $(this),
                height = self.height(),
                top = self.scrollTop();
            if (top > height) {
                back.addClass('visible');
            } else {
                back.removeClass('visible');
            }
        })

    })




    Util.cModal('#m-open','#c-modal-one', '.cls-modal')



  
})(jQuery);	 // End line