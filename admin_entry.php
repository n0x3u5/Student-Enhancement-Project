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
          <div class="input-field col s12">
            <label for="topic">Topic</label>
            <input type="text" class="col s8" id="topic">
          </div>
          <div class="input-field col s12">
            Title
            <input type="radio">
            <input type="radio">
          </div>
          <div class="input-field col s12">
            <label for="suggessions">Important Points:</label>
            <input type="text" class="col s8" id="suggession">
          </div>

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
