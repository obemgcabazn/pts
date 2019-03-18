;(function($){
  $(function(){
    var thumbs = $('#thumbscarousel');

    $('#carousel').carouFredSel({
      items: 1,
      scroll: {
        fx: 'crossfade'
      },
      auto: {
        timeoutDuration: 7000,
        duration: 2000
      },
      pagination: {
        container: '#pager',
        duration: 300
      }
    });

    thumbs.carouFredSel({
      circular: false,
      auto: false,
      width: 150,
      height: 75,
      scroll: {
        duration: 200
      },
      items: {
        visible: 1,
        width: 150,
        height: 75
      }
    });

    $('#pager').hover(function() {
      var current = $('#carousel').triggerHandler( 'currentPosition' );
      thumbs.trigger( 'slideTo', [ current, 0, true, { fx: 'none' } ] );
      $('#thumbs').stop().fadeTo(300, 1);
    }, function() {
      $('#thumbs').stop().fadeTo(300, 0);
    });

    $('#pager a').mouseenter(function() {
      var index = $('#pager a').index( $(this) );

      //  clear the queue
      thumbs.trigger( 'queue', [[]] );

      //  scroll
      thumbs.trigger( 'slideTo', [index, { queue: true }] );
    });
  });
})(jQuery)