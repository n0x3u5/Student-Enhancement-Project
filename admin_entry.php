<!DOCTYPE html>
<html lang="en">
<!-- Head Starts  -->
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Student EnhanceMent Program</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <style>

  </style>
</head>
<!-- Head Ends  -->

<!-- Body Ends  -->
<body>
  <nav class="green darken-4" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo"></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="#">Visit AOT</a></li>
	<li><a href="#">Moodle</a></li>
	<li><a href="#">Student Portal</a></li>
	<li><a href="#">Google Innovation center</a></li>
	<li><a href="#">AOT Mail</a></li>
      </ul>

      <ul id="nav-mobile" class="side-nav">
        <li><a href="#">Visit AOT</a></li>
	<li><a href="#">Moodle</a></li>
	<li><a href="#">Student Portal</a></li>
	<li><a href="#">Google Innovation center</a></li>

      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>
  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
        <br>
        <div class="row"><!-- Title entry-->
					<form action="#">		
						<div class="row">
          		<div class="input-field col s12">
            		<label for="topic"><b style="color:black;">Topic</b></label>
            		<input type="text" class=" class="materialize-textarea" col s8" id="topic">
          		</div>
						</div>
						<br><br>
						<div class="row">
          		<div class="input-field col s4">
								<b>Would you like to give the title option?</b>
          		</div>
						</div>
						<div class="row">
          		<div class="input-field col s1">
            		<input name="title_op1" class="with-gap" type="radio" id="radio1">
     				  	<label for="radio1">Yes</label>
          		</div>
						</div>
						<div class="row">
          		<div class="input-field col s1">
            		<input name="title_op1" class="with-gap" type="radio" id="radio2">
     				  	<label for="radio2">No</label>
          		</div>
						</div>
						<br><br>
						<div class="row">	
          		<div class="input-field col s5">
								<b>Select character or word count or both option here.</b>           	
          		</div>
						</div>
						<div class="row">
          		<div class="input-field col s4">
								<input type="checkbox" id="check_char" />
				      	<label for="check_char">Characters Only</label>
          		</div>
						</div>
						<div class="row">
          		<div class="input-field col s4">
								<input type="checkbox" id="check_word" />
				      	<label for="check_word">Words Only</label>
          		</div>
						</div>
						<br><br>
						<div class="row">	
          		<div class="input-field col s5">
								<b>Set character or word limit here.</b>           	
          		</div>
						</div>
						<div class="row">
          		<div class="input-field col s4">
								<input type="number" id="Char_lim" />
				      	<label for="Char_lim">Character Limit</label>
          		</div>
						</div>
						<div class="row">
          		<div class="input-field col s4">
								<input type="number" id="word_limit" />
				      	<label for="word_limit">Word Limit</label>
          		</div>
						</div>

						<div class="row">
        			<div class="input-field col s10">
          			<i class="material-icons prefix">mode_edit</i>
          			<textarea id="icon_prefix2" class="materialize-textarea"></textarea>
          			<label for="icon_prefix2"><b style="color:black">Important Points:</b></label>
        			</div>
      			</div>
					</form>
				</div>
    </div>
  </div>



  <!--  Scripts-->

	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="js/materialize.min.js"></script>

  	<script src="js/materialize.js"></script>
  	<script src="js/init.js"></script>
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
