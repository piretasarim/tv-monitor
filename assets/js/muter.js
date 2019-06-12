  $(function() {
      var header_height = 0;
      $('.muter .vertical span').each(function() {
          if ($(this).outerWidth() > header_height) header_height = $(this).outerWidth();
      });

      $('.muter .vertical').height(header_height);
  });