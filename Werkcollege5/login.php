<?

require_once 'global.php';

$bericht = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

	$errors = array();

	if(empty($_POST['wachtwoord'])){
		$errors[] = 'Gelieve een wachtwoord in te vullen.';
	}

	if(empty($_POST['email']) && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
		$errors[] = 'Gelieve een geldig email in te vullen.';
	}
	
	if(empty($errors)){
		$statement = $db->prepare('SELECT id FROM gb_users WHERE email = ? AND wachtwoord = ?');
		$wachtwoord = sha1(SALT . $_POST['wachtwoord']);
		$statement->bind_param('ss', $_POST['email'], $wachtwoord);
		$statement->execute();
		$statement->bind_result($userId);
		$statement->fetch();
		die($userId);
			if($userId > 0){
				$_SESSION['userId'] = $userId;
				header('Location: index.php');
			}else{
				$bericht = "Email of wachtwoord niet correct";
			}
			
			
	}else{
		$bericht = implode('<br />', $errors);
	}

}


$sql = "SELECT * FROM gb_posts ORDER BY datum DESC";
$posts = $db->query($sql);

?><!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Administrator Login</title>
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
        </div><!--/.navbar-collapse -->
      </div>
    </nav>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>Enkel voor admins!</h1>
        <p>Oops, je moet je inloggen om deze pagina te bekijken!</p>
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-12">
          <h2>Login</h2>
          <form>
          <?php if(!empty($bericht)){ ?>
            <div class="form-group">
				<p><?=$bericht?></p>            
            </div>
            <?php } ?>
            <div class="form-group">
              <label for="gebruikersnaam">Gebruikersnaam</label>
              <input type="text" class="form-control" id="gebruikersnaam" placeholder="Je Gebruikersnaam">
            </div>
            <div class="form-group">
              <label for="wachtwoord">Wachtwoord</label>
              <input type="password" class="form-control" id="wachtwoord" placeholder="Je Wachtwoord">
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox" name="onthouden"> Login 2 weken onthouden
              </label>
            </div>
            <button type="submit" class="btn btn-default">Log In!</button>
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
