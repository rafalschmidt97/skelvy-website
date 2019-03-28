$(function() {
  if (!store.get('cookie-info')) {
    $('#cookie-info').removeClass('d-none');

    $('#cookie-info-alert').on('close.bs.alert', () => {
      $('#cookie-info').addClass('d-none');
      store.set('cookie-info', true)
    })
  }
});
