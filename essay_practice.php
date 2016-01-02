<!DOCTYPE html>
  <html>
    <head>
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <title>SEP | Essay Practice</title>
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="css/master.css" media="screen,projection" title="no title" charset="utf-8">
      <style media="screen,projection">
        .card {
          margin-top: -25px;
        }
        #essay-title {
          font-size: 2em;
        }
        #essay-topic {
          font-weight: 400;
        }
        #clockdiv-med, #clockdiv-sm {
          font-weight: 600;
        }
        #form-row, #essay-row, #essay-body {
          margin-bottom: 0px;
        }
        #word-counter {
          font-size: small;
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
    <body class="grey lighten-2">
      <header>
        <div class="navbar-fixed">
          <nav class="teal darken-2">
            <div class="container">
              <a id="logo-container" href="#" class="brand-logo">AoT T.T.</a>
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
        <div class="section-background teal"></div>
        <div class="section">
          <div class="container">
            <div class="row">
              <div class="col s12 m9">
                <h1 class="center-on-small-only white-text">Essay Practice</h1>
              </div>
            </div>
          </div>
        </div>
        <div class="container">
          <div id="modal1" class="modal">
            <div class="modal-content">
              <h4>Essay Practice</h4>
              <p>Time to get started on your essay! Your topic for this session is <span class="red-text essay-title">"Lorem Ipsum"</span>. The timer will start as soon as you click the get started button below! Good luck!</p>
            </div>
            <div class="modal-footer">
              <a href="#!" class="modal-action modal-close waves-effect waves-teal btn-flat teal-text" id="start-btn">Get Started!</a>
            </div>
          </div>
          <div id="result-modal" class="modal">
            <div class="modal-content center-align">
              <div class="preloader-wrapper active">
                <div class="spinner-layer spinner-blue">
                  <div class="circle-clipper left">
                    <div class="circle"></div>
                  </div><div class="gap-patch">
                    <div class="circle"></div>
                  </div><div class="circle-clipper right">
                    <div class="circle"></div>
                  </div>
                </div>

                <div class="spinner-layer spinner-red">
                  <div class="circle-clipper left">
                    <div class="circle"></div>
                  </div><div class="gap-patch">
                    <div class="circle"></div>
                  </div><div class="circle-clipper right">
                    <div class="circle"></div>
                  </div>
                </div>

                <div class="spinner-layer spinner-yellow">
                  <div class="circle-clipper left">
                    <div class="circle"></div>
                  </div><div class="gap-patch">
                    <div class="circle"></div>
                  </div><div class="circle-clipper right">
                    <div class="circle"></div>
                  </div>
                </div>

                <div class="spinner-layer spinner-green">
                  <div class="circle-clipper left">
                    <div class="circle"></div>
                  </div><div class="gap-patch">
                    <div class="circle"></div>
                  </div><div class="circle-clipper right">
                    <div class="circle"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card">
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
              <div class="row" id="form-row">
                <form action="essay_checker.php" method="post" class="col s12" id="essay-form">
                  <div class="row">
                    <div class="input-field col s12 m6">
                      <input id="essay-title" type="text" class="truncate" name="essay-title" required>
                      <label for="essay-title">Essay Title</label>
                    </div>
                  </div>
                  <div class="row" id="essay-row">
                    <div class="input-field col s12">
                      <textarea id="essay-body" name="essay" class="materialize-textarea" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" required></textarea>
                      <label for="essay-body">Your Essay</label>
                    </div>
                  </div>
                  <div class="row">
                    <p id="word-counter" class="right-align col s12 grey-text"><span id="display_count">0</span>/<span id="word_left">10</span></p>
                  </div>
                </form>
              </div>
            </div>
            <div class="card-action">
              <button id="save-btn" class="col card-anchor waves-effect waves-teal" type="button" name="save_essay" form="essay-form">Save
                <!-- <i class="material-icons right">save</i> -->
              </button>
              <button id="finish-btn" class="col card-anchor waves-effect waves-teal" type="button" name="submit_essay" form="essay-form">Finish
                <!-- <i class="material-icons right">send</i> -->
              </button>
            </div>
          </div>
        </div>
      </main>
      <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
      <script src="js/timer.js" charset="utf-8"></script>
      <script src="js/word_counter.js" charset="utf-8"></script>
      <script src="js/essay_practice.js" charset="utf-8"></script>
    </body>
  </html>
