var lim = 10;
$('#display_count').text('0');
$('#word_left').text(lim);
$("#essay-body").on('keyup', function() {
  var matched_word = this.value.match(/\S+/g);
  if(matched_word != null) {
    var words = matched_word.length;
    if (words > lim) {
      var trimmed = $(this).val().split(/\s+/, lim).join(" ");
      $(this).val(trimmed + " ");
    } else {
      $('#display_count').text(words);
    }
  }
});
