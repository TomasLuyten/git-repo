<?

require_once 'global.php';

$bericht = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

	$errors = array();
	
	if(empty($_POST['naam'])){
		$errors[] = 'Gelieve een naam in te vullen.';
	}

	if(empty($_POST['titel'])){
		$errors[] = 'Gelieve een titel in te vullen.';
	}

	if(empty($_POST['bericht'])){
		$errors[] = 'Gelieve een bericht in te vullen.';
	}

	if(empty($_POST['email']) && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
		$errors[] = 'Gelieve een geldig email in te vullen.';
	}
	
	if(empty($errors)){
		$statement = $db->prepare('INSERT INTO gb_posts (naam, email, titel, bericht, datum) VALUES (?, ?, ?, ?, '. time() .')');
		$statement->bind_param('ssss', $_POST['naam'], $_POST['email'], $_POST['titel'], $_POST['bericht']);
		$statement->execute();
		$bericht = 'Verzonden';
	}else{
		$bericht = implode('<br />', $errors);
	}

}

if(!empty($_GET['deleteId']) && !empty($_SESSION['userId'])){
	$sql = "DELETE FROM gb_posts WHERE id = ". $_GET['deleteId'];
	mysqli_query($db, $sql);
}


$sql = "SELECT * FROM gb_posts ORDER BY datum DESC";
$posts = $db->query($sql);

?><!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Mijn Gastenboek</title>
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
          <form class="navbar-form navbar-right" role="form" method="post" action="login.php">
            <div class="form-group">
              <input type="text" placeholder="Email" class="form-control" name="email">
            </div>
            <div class="form-group">
              <input type="password" placeholder="Wachtwoord" class="form-control" name="wachtwoord">
            </div>
            <button type="submit" class="btn btn-success">Log in</button>
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>Hallo iedereen!</h1>
        <p>Welkom op mijn gastenboek! Lees hieronder de vorige berichtjes of plaats er zelf één!</p>
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-6">
          <h2>Vorige Berichten</h2>

          <?php while($post = $posts->fetch_assoc()){ ?>

          <article>
            <header>
              <h4><?=$post['titel']?></h4>
            </header>
            <p><?=$post['bericht']?></p>
            <footer>
              <p>Geplaatst door <a href="mailto:<?=$post['email']?>"><?=$post['naam']?></a> op <time pubdate="pubdate"><?=date('d M Y \o\m H\ui', $post['datum'])?></time></p>
              <?php if(!empty($_SESSION['userId'])){ ?>
              <p><a href="?deleteId=<?=$post['id']?>">Verwijder Post</a> - <a href="edit.php?editId=<?=$post['id']?>">Wijzig Post</a></p>
              <? } ?>
            </footer>
          </article>
          
		  <?php } ?>

        </div>

        <div class="col-md-6">
          <h2>Plaats een Bericht</h2>
          <form method="post" action="#">
            <?php if(!empty($bericht)){ ?>
            <div class="form-group">
				<p><?=$bericht?></p>            
            </div>
            <?php } ?>
            <div class="form-group">
              <label for="naam">Naam</label>
              <input type="text" class="form-control" id="naam" name="naam" placeholder="Je Naam">
            </div>
            <div class="form-group">
              <label for="email">Emailadres</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Je Emailadres">
            </div>
            <div class="form-group">
              <label for="titel">Titel</label>
              <input type="text" class="form-control" id="titel" name="titel" placeholder="Titel van Bericht">
            </div>
            <div class="form-group">
              <label for="bericht">Je Bericht</label>
              <textarea class="form-control" id="bericht" name="bericht" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-default">Verstuur!</button>
          </form>
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
