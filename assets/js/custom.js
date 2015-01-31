jQuery(document).ready(function($){

/*-------------------Smooth scroll-----------------------------*/
  $('a[href^="#"]').on('click',function (e) {
      e.preventDefault();

      var target = this.hash,
      $target = $(target);

      $('html, body').stop().animate({
          'scrollTop': $target.offset().top
      }, 900, 'swing', function () {
          window.location.hash = target;
      });
  });


/*-------------------Fix for Collapsed Navbar with #Links-----------------------------*/
$("body").click(function(event) {
        // only do this if navigation is visible, otherwise you see jump in navigation while collapse() is called
         if ($(".navbar-collapse").is(":visible") && $(".navbar-toggle").is(":visible") ) {
            $('.navbar-collapse').collapse('toggle');
        }
  });

/*-------------------Tooltips-----------------------------*/
  $('[rel=tooltip]').tooltip();

});
