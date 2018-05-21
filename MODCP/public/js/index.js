(function($) {
  'use strict';

  $(function() {
    setInterval(function() {
      $.get('/').done(function() {
        console.log('Confirmação de on-line.', Date.now())
      }).fail(function() {
        console.log('Erro ao confirmar a veracidade do estado de on-line.');
      });
    }, 1000 * 45);
  });
})(jQuery);
