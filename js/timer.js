function getTimeRemaining(endtime) {
  var t = Date.parse(endtime) - Date.parse(new Date());
  var seconds = Math.floor((t / 1000) % 60);
  var minutes = Math.floor((t / 1000 / 60) % 60);
  var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
  var days = Math.floor(t / (1000 * 60 * 60 * 24));
  return {
    'total': t,
    'days': days,
    'hours': hours,
    'minutes': minutes,
    'seconds': seconds
  };
}

function initializeClock(id, endtime) {
  var clock = document.getElementById(id);
  var minutesSpan = clock.querySelector('.minutes');
  var secondsSpan = clock.querySelector('.seconds');

  function updateClock() {
    var t = getTimeRemaining(endtime);

    minutesSpan.innerHTML = ('0' + t.minutes).slice(-2) + 'mm';
    secondsSpan.innerHTML = ('0' + t.seconds).slice(-2) + 'ss';

    if (t.total <= 0) {
      clearInterval(timeinterval);
      document.getElementById('essay-body').disabled=true;
      document.getElementById('essay-title').disabled=true;
    }
  }

  updateClock();
  var timeinterval = setInterval(updateClock, 1000);
}
