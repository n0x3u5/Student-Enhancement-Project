<!DOCTYPE html>
<html lang="en">
<!-- Head Starts  -->
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>SEP | Admin Entry</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/master.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <style media="screen,projection">
    .card {
      margin-top: -25px;
      padding-left: 10px;
      padding-right: 10px;
    }
    button.card-anchor {
          margin-right: 2em;
          background: none!important;
          border: none;
          font: inherit;
          cursor: pointer;
          text-transform: uppercase;
          font-weight: 400;
          font-size: 18px;
          color: #009688;
        }
        button.card-anchor:hover {
          transition-property: color;
          transition-duration: 0.3s;
          transition-timing-function: ease;
          color: #4db6ac;
        }
        .modal-footer a {
          font-size: 18px;
        }
  </style>
</head>
<!-- Head Ends  -->

<!-- Body Ends  -->
<body class="grey lighten-2">
  <header>
    <div class="navbar-fixed">
      <nav class="green darken-4">
        <div class="container">
          <!-- <a id="logo-container" href="#" class="brand-logo">AoT T.T.</a> -->
          <ul class="right hide-on-med-and-down">
            <li><a href="#">Visit AoT</a></li>
            <li class="active"><a href="admin_entry.php">Admin Entry</a></li>
            <li><a href="#">Moodle</a></li>
            <li><a href="#">Student Portal</a></li>
            <li><a href="#">Google Innovation Center</a></li>
            <li><a href="#">AoT Mail</a></li>
          </ul>
          <ul id="slide-out" class="side-nav">
            <li><a href="#">Visit AoT</a></li>
            <li class="active"><a href="admin_entry.php">Admin Entry</a></li>
            <li><a href="#">Moodle</a></li>
            <li><a href="#">Student Portal</a></li>
            <li><a href="#">Google Innovation Center</a></li>
            <li><a href="#">AoT Mail</a></li>
          </ul>
          <a href="#" data-activates="slide-out" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
        </div>
      </nav>
    </div>
  </header>
  <main>
    <div class="section-background green"></div>
    <div class="section">
      <div class="container">
        <div class="row">
          <div class="col s12 m9">
            <h1 class="center-on-small-only black-text">Admin Entry</h1>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="card">
        <div class="card-content black-text">
          <div class="row" id="form-row">
            <form action="admin_submit.php" id="topic-form" method="post">
        			<div class="row">
            		<div class="input-field col s12">
              		<label for="topic"><b style="color:black">Topic</b></label>
              		<input type="text" class=" class="materialize-textarea" col s8" id="topic" name="topic_name" required>
            		</div>
        			</div>
        			<div class="row">
            		<div class="input-field col s4">
        					<b>Would you like to give the title option?</b>
            		</div>
        			</div>
        			<div class="row">
            		<div class="input-field col s1">
              		<input name="title_op1" class="with-gap" type="radio" id="radio1" value="yes" required>
        				  <label for="radio1">Yes</label>
            		</div>
        			</div>
        			<div class="row">
            		<div class="input-field col s1">
              		<input name="title_op1" class="with-gap" type="radio" id="radio2" value="no"required>
        				  <label for="radio2">No</label>
            		</div>
        			</div>
        			<div class="row">
            		<div class="input-field col s5">
        					<b>Select character or word count or both option here.</b>
            		</div>
        			</div>
        			<div class="row">
            		<div class="input-field col s4">
        					<input type="checkbox" id="check_char" name="count_group[]"  value="chars">
        	      	<label for="check_char">Characters Only</label>
            		</div>
        			</div>
        			<div class="row">
            		<div class="input-field col s4">
        					<input type="checkbox" id="check_word" name="count_group[]" value="words">
        	      	<label for="check_word">Words Only</label>
            		</div>
        			</div>
        			<div class="row">
            		<div class="input-field col s5">
        					<b>Set character or word limit here.</b>
            		</div>
        			</div>
        			<div class="row">
            		<div class="input-field col s4">
        					<input type="number" id="Char_lim" name="max_char">
        	      	<label for="Char_lim">Character Limit</label>
            		</div>
        			</div>
        			<div class="row">
            		<div class="input-field col s4">
        					<input type="number" id="word_limit" name="max_word">
        	      	<label for="word_limit">Word Limit</label>
            		</div>
        			</div>
        			<div class="row">
          			<div class="input-field col s10">
            			<i class="material-icons prefix">mode_edit</i>
            			<textarea id="icon_prefix2" class="materialize-textarea" name="comments" required></textarea>
            			<label for="icon_prefix2"><b style="color:black">Important Points:</b></label>
          			</div>
        			</div>
        		</form>
          </div>
        </div>
        <div class="card-action">
          <button id="submit-btn" class="col card-anchor waves-effect waves-green" type="submit" name="submit_topic" form="topic-form" value="pressed">Submit</button>
        </div>
      </div>
    </div>
  </main>
  <!--  Scripts-->
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="js/materialize.min.js"></script>
	<script type="text/javascript">
 	  $(document).ready(function(){
	  $('.modal-trigger').leanModal();
   	});

    $(document).ready(function() {
        $('select').material_select();
    });
   </script>
  </body>
</html>
