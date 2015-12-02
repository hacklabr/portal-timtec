/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 * ======================================================================== */

 (function($) {

  // Use this variable to set up the common and page specific functions. If you
  // rename this variable, you will also need to rename the namespace below.
  var Sage = {
    // All pages
    'common': {
      init: function() {
        // JavaScript to be fired on all pages
      },
      finalize: function() {
        // JavaScript to be fired on all pages, after page specific JS is fired
      }
    },
    // Home page
    'home': {
      init: function() {
        // JavaScript to be fired on the home page
      },
      finalize: function() {
        // JavaScript to be fired on the home page, after the init JS
      }
    },
    // About us page, note the change from about-us to about_us.
    'about_us': {
      init: function() {
        // JavaScript to be fired on the about us page
      }
    }
  };

  // The routing fires all common scripts, followed by the page specific scripts.
  // Add additional events for more control over timing e.g. a finalize event
  var UTIL = {
    fire: function(func, funcname, args) {
      var fire;
      var namespace = Sage;
      funcname = (funcname === undefined) ? 'init' : funcname;
      fire = func !== '';
      fire = fire && namespace[func];
      fire = fire && typeof namespace[func][funcname] === 'function';

      if (fire) {
        namespace[func][funcname](args);
      }
    },
    loadEvents: function() {
      // Fire common init JS
      UTIL.fire('common');

      // Fire page-specific init JS, and then finalize JS
      $.each(document.body.className.replace(/-/g, '_').split(/\s+/), function(i, classnm) {
        UTIL.fire(classnm);
        UTIL.fire(classnm, 'finalize');
      });

      // Fire common finalize JS
      UTIL.fire('common', 'finalize');
    }
  };

  // Load Events
  $(document).ready(UTIL.loadEvents);


  /**
  * Formulário de criação de usuário
  */
  $('.js-create-user-meta').on('submit', function () {
    
    var $form = $(this);

    $.ajax({
        url: vars.ajaxurl + "?action=saveCadUserDown",
        type: 'POST',
        dataType: 'json',
        data: $form.serialize(),
        success: function (r) {
          alert("funciona");
        },
        error: function (r) {
          console.log(r);
        }

    });


    return false;
  });

/**
* Slide News
*/
$('#newsCarousel').carousel({
  interval: 5000
});

$('.carousel .item').each(function(){
  var next = $(this).next();
  if (!next.length) {
    next = $(this).siblings(':first');
  }
  next.children(':first-child').clone().appendTo($(this));

  for (var i=0;i<2;i++) {
    next=next.next();
    if (!next.length) {
      next = $(this).siblings(':first');
    }

    next.children(':first-child').clone().appendTo($(this));
  }
});


/**
* Fecha Modal Home
*/
$('.js-close-modal').on('click',function(e){
    e.preventDefault();
    $('#modal-home').hide(200);
});


/**
* Scroll Home
*/
$('.js-scroll-to').on('click', function(e){
    var targetSelector = $(this).data('target');
    var $target = $(targetSelector);
    if(!e.ctrlKey){
        $('body,html').stop().animate({scrollTop: $target.offset().top},200);
    }

});

/**
* Mostra mais cursos na lista de cursos
*/

$('.show-more-courses').on('click', function(e){
    $(this).css('display','none');
    $('.list-courses').addClass('open');
});


})(jQuery); // Fully reference jQuery after this point.
