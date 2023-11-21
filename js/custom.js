(function($) {



/*
Insert isotope function here

// init Isotope
var $grid = $('.grid').isotope({
  // options...
});
// layout Isotope after each image loads
$grid.imagesLoaded().progress( function() {
  $grid.isotope('layout');
});

*/

$(window).on('load', function() {
  var $grid = $('.grid').isotope({
      itemSelector: '.grid-item',
  });

});

  /* Validation*/
  function hasHtml5Validation () {
    return typeof document.createElement('input').checkValidity === 'function';
  }

  if (hasHtml5Validation()) {
    $('.validate-form').submit(function (e) {
      if (!this.checkValidity()) {
        e.preventDefault();
        $(this).addClass('invalid');
        $('#status').html('Bitte überprüfe Pflichtfelder');
      } else {
        $(this).removeClass('invalid');
      }
    });
  }

    /* Header Animation */
    jQuery(window).scroll(function() {
        var fromTopPx = 110; // distance to trigger
        var scrolledFromtop = jQuery(window).scrollTop();
        if (scrolledFromtop > fromTopPx) {
            $(".jumbotron").addClass("scrolled");
        } else {
            $(".jumbotron").removeClass("scrolled");

        }
    });

    /* Header Animation */
    jQuery(window).scroll(function() {
        var fromTopPx = 15; // distance to trigger
        var scrolledFromtop = jQuery(window).scrollTop();
        if (scrolledFromtop > fromTopPx) {
            $(".fb-like").addClass("likehidden");
        } else {
            $(".fb-like").removeClass("likehidden");

        }
    });




    /* Tab Fix */
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
        $('.grid').isotope('layout');
    });

    /* Modal Toggle
    $('[data-toggle="ajaxModal"]').on('click',
              function(e) {
                $('#ajaxModal').remove();
                e.preventDefault();
                var $this = $(this)
                  , $remote = $this.data('remote') || $this.attr('href')
                  , $modal = $('<div class="modal fade" id="ajaxModal"><div class=test"></div><div class="modal-body"></div></div>');
                $('body').append($modal);
                $modal.modal({backdrop: 'static', keyboard: false});
                $modal.load($remote);
              }
            );*/

})(jQuery);
