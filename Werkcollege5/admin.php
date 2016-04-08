<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Mijn Gastenboek Admin</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <style>
            body {
                padding-top: 50px;
                padding-bottom: 20px;
            }
        </style>
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/main.css">

        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>
    <body>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toon Navigatie</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Mijn Gastenboek!</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <form class="navbar-form navbar-right" role="form">
            <button type="submit" class="btn btn-success">Log Uit</button>
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>Administratiepaneel!</h1>
        <p>Beheer de bestaande berichten.</p>
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-12">
          <table class="table table-hover">
            <tr>
              <th>ID</th>
              <th>Naam</th>
              <th>Email</th>
              <th>Titel</th>
              <th>Wijzig</th>
              <th>Verwijder</th>
            </tr>

            <tr>
              <td>1</td>
              <td>Jan</td>
              <td>jan@jansen.be</td>
              <td>Hallo</td>
              <td><a href="">Wijzig</a></td>
              <td><a href="">Verwijder</a></td>
            </tr>

            <tr>
              <td>2</td>
              <td>Piet</td>
              <td>piet@peeters.be</td>
              <td>Goeiendag</td>
              <td><a href="">Wijzig</a></td>
              <td><a href="">Verwijder</a></td>
            </tr>

            <tr>
              <td>3</td>
              <td>Frans</td>
              <td>frans@hotmail.fr</td>
              <td>Bonzour!</td>
              <td><a href="">Wijzig</a></td>
              <td><a href="">Verwijder</a></td>
            </tr>  
          </table>
        </div>
      </div>

      <hr>

      <footer>
        <p>&copy; Company 2015</p>
      </footer>
    </div> <!-- /container -->        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

        <script src="js/vendor/bootstrap.min.js"></script>

        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>
