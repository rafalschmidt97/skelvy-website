window.onload = function(){
  let hidden = true;

  function makeTimer() {
    let endTime = new Date('2019-06-01');
    endTime = (Date.parse(endTime) / 1000);

    let now = new Date();
    now = (Date.parse(now) / 1000);

    const timeLeft = endTime - now;
    const days = Math.floor(timeLeft / 86400);
    let hours = Math.floor((timeLeft - (days * 86400)) / 3600);
    let minutes = Math.floor((timeLeft - (days * 86400) - (hours * 3600 )) / 60);
    let seconds = Math.floor((timeLeft - (days * 86400) - (hours * 3600) - (minutes * 60)));

    if (hours < '10') { hours = '0' + hours; }
    if (minutes < '10') { minutes = '0' + minutes; }
    if (seconds < '10') { seconds = '0' + seconds; }

    $('#days').html(days);
    $('#hours').html(hours);
    $('#minutes').html(minutes);
    $('#seconds').html(seconds);

    if (hidden) {
      $('#timer').removeClass('invisible');
      hidden = false;
    }
  }

  makeTimer();
  setInterval(function() { makeTimer(); }, 1000);
};