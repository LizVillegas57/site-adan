 $(function() {
    if ($('section').hasClass('inicio')) {
        //Llamada a  video//
        $('video').cover({
          ratio: 1080 / 1920
        });
        $(window).resize(function() {
          $('video').cover('set');
        });
        //Loading & display bloc for container//
        setTimeout(function(){
         $('.spinnerWave').hide();
         $('.blockContainer').removeClass('hidden');
         $('.blockContainer').fadeIn('slow');
        }, 3000);
    }
    else if ($('section').hasClass('portfolio')) {
        //Custom functionality for Portfolio//
        $('.boxGallery').addClass('hidden');

        $('article').on('click','a',function() {
            $(this).next().slideDown(200).removeClass('hidden').siblings('.boxGallery').slideUp(200);
        });
        $('.boxGallery').on('click','a',function() {
            $(this).parent().slideUp(200).addClass('hidden');
        });
    }
    else if ($('section').hasClass('servicios')) {
      $("#owl-demo").owlCarousel({
          items : 4,
          itemsDesktop : [1199,3],
          itemsDesktopSmall : [979,3]
      });
    }
 });

   

