<!DOCTYPE html>
  <html>
    <head>
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <title>SEP | Essay Practice</title>
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css"  media="screen,projection"/>
      <link rel="stylesheet" href="css/master.css" media="screen" title="no title" charset="utf-8">
    </head>
    <body class="teal">
      <header>
        <div class="navbar-fixed">
          <nav class="teal darken-2">
            <div class="container">
              <a id="logo-container" href="#" class="brand-logo flow-text">AoT S.E.P.</a>
              <ul class="right hide-on-med-and-down">
                <li><a href="#">Code Challenge</a></li>
                <li class="active"><a href="essay_practice.php">Essay Practice</a></li>
                <li><a href="#">Email Writing</a></li>
                <li><a href="#">Subject Quiz</a></li>
              </ul>
              <ul id="slide-out" class="side-nav">
                <li><a href="#">Code Challenge</a></li>
                <li class="active"><a href="essay_practice.php">Essay Practice</a></li>
                <li><a href="#">Email Writing</a></li>
                <li><a href="#">Subject Quiz</a></li>
              </ul>
              <a href="#" data-activates="slide-out" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
            </div>
          </nav>
        </div>
      </header>
      <main>
        <div class="container">
          <div id="modal1" class="modal">
            <div class="modal-content">
              <h4>Essay Practice</h4>
              <p>Time to get started on your essay! Your topic for this session is <span class="red-text essay-title">"Lorem Ipsum"</span>. The timer will start as soon as you click the get started button below! Good luck!</p>
            </div>
            <div class="modal-footer">
              <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Get Started!</a>
            </div>
          </div>
          <div class="card teal lighten-5">
            <div class="card-content black-text">
              <div class="row">
                <form class="col s12">
                  <div class="row">
                    <div class="input-field col s12 m6">
                      <input id="essay-title" type="text">
                      <label for="essay-title">Essay Title</label>
                    </div>
                    <span class="card-title col s12 m6 right-align hide-on-small-only" id="clockdiv-med">
                      <span class="minutes red-text"></span><span class="red-text">&nbsp;mm</span>
                      <span class="seconds red-text"></span><span class="red-text">&nbsp;ss</span>
                    </span>
                    <span class="card-title col s12 hide-on-med-and-up" id="clockdiv-sm">
                      <span class="minutes red-text"></span><span class="red-text">&nbsp;mm</span>
                      <span class="seconds red-text"></span><span class="red-text">&nbsp;ss</span>
                    </span>
                  </div>
                  <div class="row">
                    <div class="input-field col s12">
                      <textarea id="essay-area" class="materialize-textarea" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false"></textarea>
                      <label for="essay-area">Your Essay</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="card-action">
                      <button class="btn waves-effect waves-light col s12 m2" type="button" name="save_essay" onclick="Materialize.toast('Saved!', 4000)">Save
                        <i class="material-icons right">save</i>
                      </button>
                      <button class="btn waves-effect waves-light col s12 m2" type="submit" name="submit_essay">Finish
                        <i class="material-icons right">send</i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </main>
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
      <script src="js/timer.js" charset="utf-8"></script>
      <script type="text/javascript">
        $('#modal1').openModal();
        $(".button-collapse").sideNav();
      </script>
    </body>
  </html>
