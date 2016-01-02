$(document).ready(function() {
  $('#modal1').openModal({
    dismissible: false
  });
  $(".button-collapse").sideNav();
  $("#essay-body").focus(function() {
    $("#word-counter").removeClass("grey-text");
    $("#word-counter").addClass("teal-text");
  });
  $("#essay-body").focusout(function() {
    $("#word-counter").removeClass("teal-text");
    $("#word-counter").addClass("grey-text");
  });
  $('#start-btn').click(function() {
    var deadline = new Date(Date.parse(new Date()) + 1 * 60 * 1000);
    initializeClock('clockdiv-med', deadline);
    initializeClock('clockdiv-sm', deadline);
  });
  $("#save-btn").click(function() {
    Materialize.toast('Saved!', 4000);
  });
  $("#finish-btn").click(function() {
    var essay_title = $("#essay-title").val();
    var essay_body = $('#essay-body').val();
    $.ajax({
      url: "essay_checker.php",
      data: {
        "essay-title" : essay_title,
        "essay-body" : essay_body
      },
      type: "POST",
      dataType : "json",
      success : function(json) {
       console.log(json.essay_checker.multiple_space_exists);
       var message = "";
       if (json.essay_checker.multiple_space_exists === 0) {
         message="<div class=\"modal-content\"><h4>Essay Result</h4><p>Great! Looks like there were no spacing issues in your essay. Good work!</p></div><div class=\"modal-footer\"><a href=\"#!\" class=\"modal-action modal-close waves-effect waves-teal btn-flat teal-text\" id=\"end-btn\">Alright!</a></div></div>";
       } else {
         message="<div class=\"modal-content\"><h4>Essay Result</h4><p>Whoa! Looks like your essay had some spacing issue between words. Review your essay before submitting next time!</p></div><div class=\"modal-footer\"><a href=\"#!\" class=\"modal-action modal-close waves-effect waves-teal btn-flat teal-text\" id=\"end-btn\">Alright!</a></div></div>";
       }
       $('#result-modal').html(message);
      },
      error : function(xhr, status, errorThrown) {
        alert( "Sorry, there was a problem!" );
        console.log( "Error: " + errorThrown );
        console.log( "Status: " + status );
        console.dir( xhr );
      },
      complete : function(xhr, status) {
        console.log("request complete");
        $("#end-btn").click(function() {
          $("#result-modal").closeModal();
        });
      }
    });
  });
});
$(document).ajaxStart(function() {
  $('#result-modal').openModal({
    dismissible : false
  });
});
