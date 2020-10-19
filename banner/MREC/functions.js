;(function($, window, document, undefined) {
	var $win = $(window);
	var $doc = $(document);

  var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
  var i = 0;
  

	$doc.ready(function() {


    /*function animateImage() {
      $('.main img.ladder').animate({left: '-80px', bottom: '0px'}, 1000, function() {});
    }*/


   
    function loopAnimation() {

      $('.main .head').show().addClass('animated slideInRight');
      $('.main .are').show().addClass('animated fadeInLeft');
      $('.main .walking').show().addClass('animated fadeInLeft');

      $('.main .walking').one(animationEnd, function() {
        $(this).removeClass('animated fadeInLeft');
        $('.main .are').removeClass('animated fadeInLeft');
        $('.main .head').removeClass('animated slideInRight');
        setTimeout(function(){
          $('.main .head').fadeOut(500);
          $('.main .are').fadeOut(500);
          $('.main .walking').fadeOut(500);
        },1500);
        setTimeout(function(){
          $('.main .wa').fadeIn(1000);
          //$('.main .lk').fadeIn(1000);
          $('.main p.cybersecurity').show().addClass('animated fadeIn');
          $('.main p.business').show().addClass('animated fadeIn');
        },1600);
      });

      $('.main p.business').one(animationEnd, function() {
        $(this).removeClass('animated fadeIn');
        $('.main p.cybersecurity').removeClass('animated fadeIn');
        setTimeout(function(){
          $('.main p.business').fadeOut(500);
          $('.main p.cybersecurity').fadeOut(500);
        },1500);
        setTimeout(function(){
          $('.main p.gauge').show().addClass('animated fadeIn');
          $('.main p.free').show().addClass('animated fadeIn');
          setTimeout(function(){
            $('.main .take').show().addClass('animated zoomIn');
          },300);
        },1600);
      });

      $('.main .take').one(animationEnd, function() {
        $(this).removeClass('animated zoomIn');
        setTimeout(function(){
          $('.main .take').addClass('animated pulse');
        },600);
      });
        
    } 

    if (!Enabler.isInitialized()) {
      Enabler.addEventListener(
        studio.events.StudioEvent.INIT,
        enablerInitialized);
    } else {
       enablerInitialized();
    }
    function enablerInitialized() {
      // Enabler initialized.
      // In App ads are rendered offscreen so animation should wait for
      // the visible event. These are simulated with delays in the local
      // environment.
      if (!Enabler.isVisible()) {
        Enabler.addEventListener(
          studio.events.StudioEvent.VISIBLE,
          loopAnimation);
      } else {
         loopAnimation();
      }
    }

    //loopAnimation();


  }); // END DOC READY


})(jQuery, window, document);