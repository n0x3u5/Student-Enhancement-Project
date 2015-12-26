<!DOCTYPE html>
  <html>
    <head>
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <title>SEP | Essay Practice</title>
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="css/master.css" media="screen,projection" title="no title" charset="utf-8">
      <style media="screen,projection">
        #essay-title {
          font-size: 2em;
        }
        #essay-topic {
          font-weight: 400;
        }
        #clockdiv-med, #clockdiv-sm {
          font-weight: 600;
        }
        #essay-row {
          margin-bottom: 0px;
        }
        #essay-area {
          margin-bottom: 0px;
        }
        #word-counter {
          color: teal;
          font-size: small;
        }
      </style>
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
              <a href="#!" class="modal-action modal-close waves-effect waves-green btn" id="start-btn">Get Started!</a>
            </div>
          </div>
          <div class="card teal lighten-5">
            <div class="card-content black-text">
              <div class="row">
                <span class="card-title col s12 m6" id="essay-topic">Lorem Ipsum</span>
                <span class="card-title col s12 m6 right-align hide-on-small-only" id="clockdiv-med">
                  <span class="minutes red-text"></span>
                  <span class="seconds red-text"></span>
                </span>
                <span class="card-title col s12 hide-on-med-and-up" id="clockdiv-sm">
                  <span class="minutes red-text"></span>
                  <span class="seconds red-text"></span>
                </span>
              </div>
              <div class="row">
                <form class="col s12">
                  <div class="row">
                    <div class="input-field col s12 m6">
                      <input id="essay-title" type="text" class="truncate">
                      <label for="essay-title">Essay Title</label>
                    </div>
                  </div>
                  <div class="row" id="essay-row">
                    <div class="input-field col s12">
                      <textarea id="essay-area" class="materialize-textarea" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false"></textarea>
                      <label for="essay-area">Your Essay</label>
                    </div>
                  </div>
                  <div class="row">
                    <p id="word-counter" class="right-align col s12"><span id="display_count">0</span>/<span id="word_left">10</span></p>
                  </div>
                  <div class="row">
                    <div class="card-action">
                      <button id="save-btn" class="btn waves-effect waves-light col s12 m2" type="button" name="save_essay">Save
                        <i class="material-icons right">save</i>
                      </button>
                      <button id="finish-btn" class="btn waves-effect waves-light col s12 m2" type="button" name="submit_essay">Finish
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
      <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
      <script src="js/timer.js" charset="utf-8"></script>
      <script src="js/spacer.js" charset="utf-8"></script>
      <script src="js/word_counter.js" charset="utf-8"></script>
      <script type="text/javascript">
        $(document).ready(function() {
          $('#modal1').openModal({
            dismissible: false
          });
          $(".button-collapse").sideNav();
          $("#save-btn").click(function() {
            Materialize.toast('Saved!', 4000);
          });
          $('#start-btn').click(function() {
            var deadline = new Date(Date.parse(new Date()) + 1 * 60 * 1000);
            initializeClock('clockdiv-med', deadline);
            initializeClock('clockdiv-sm', deadline);
          });
          $('#finish-btn').click(function() {
            space_checker();
          });
        });
      </script>
    </body>
  </html>
