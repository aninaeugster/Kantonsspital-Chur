<?php
session_start();
  if(isset($_SESSION["id"]))  unset($_SESSION["id"]);
    session_destroy();

    require_once("data.php");
    require_once("security.php");

$error = false;
$error_msg = "";
$success = false;
$success_msg = "";


if(isset($_POST["login-submit"])){
  if(!empty($_POST["email"]) && !empty($_POST["password"])) {
    $email = filter_data($_POST["email"]);
    $password = filter_data($_POST["password"]);

    $result = login($email, $password);

    $row_count = mysqli_num_rows($result);

  if($row_count == 1) {
    $user = mysqli_fetch_assoc($result);
    session_start();
    $_SESSION["id"] = $user["user_id"];
    header("Location:home.php");
  }
    else {
      $error = true;
      $error_msg .= "E-Mail und Passwort sind falsch. Bitte versuche es nochmals.</br>";
      }
}   else {
    $error = true;
    $error_msg .= "Bitte fülle beide Felder aus.</br>";
  }
}

  if(isset($_POST["register-submit"])){
    if(!empty($_POST["firstname"]) && !empty($_POST["lastname"]) && !empty($_POST["email"]) && !empty($_POST["password"]) && !empty($_POST["confirm-password"])){
      $firstname = filter_data($_POST["firstname"]);
      $lastname = filter_data($_POST["lastname"]);
      $email = filter_data($_POST["email"]);
      $password = filter_data($_POST["password"]);
      $confirm_password = filter_data($_POST["confirm-password"]);
    if ($password == $confirm_password){
        $db = get_db_connection();
      $sql = "INSERT INTO user (firstname, lastname, email, password) VALUES ('$firstname', '$lastname', '$email', '$password');";
        echo $sql;
    if(mysqli_query($db, $sql)){
        $success = true;
        $success_msg = "Du hast dich erfolgreich registriert.</br>";
        $success_msg = "Bitte logge dich jetzt ein.</br>";
      }else {
        $error = true;
        $error_msg .= "</br>";
            }
      mysqli_close($db);
    }else{
      $error = true;
      $error_msg .= "Bitte überprüfen Sie ihre Passworteingabe.</br>";
    }
    }else {
        $error = true;
        $error_msg .= "Bitte füllen Sie beide Felder aus.</br>";
      }
  }
?>


<!-- HTML-Code -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Kantonsspital Graubünden - Login</title>

    <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="css/login.css" rel="stylesheet">
  </head>

  <body>
    <!-- http://bootsnipp.com/snippets/featured/login-and-register-tabbed-form -->
    <div class="container">
    	<div class="row">
  			<div class="col-md-6 col-md-offset-3">
  				<div class="panel panel-login">
  					<div class="panel-heading">
  						<div class="row">
  							<div class="col-xs-12">
    							<h3>Kantonsspital Graubünden</h3>
  							</div>
  						</div>


  						<hr>
  					</div>
  					<div class="panel-body">
  						<div class="row">
  							<div class="col-lg-12">

  								<!-- Login-Formular -->
  								<form id="login-form" action="index.php" method="post" role="form" style="display: block;">
  									<div class="form-group">
  										<input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="E-Mail-Adresse" value="">
  									</div>
  									<div class="form-group">
  										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Passwort">
  									</div>
  									<div class="form-group">
  										<div class="row">
  											<div class="col-sm-6 col-sm-offset-3">
  												<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Login">
  											</div>
  										</div>
  									</div>
  								</form>
  								<!-- /Login-Formular -->
                  <!-- /Registrierungs-Formular -->
  								<form id="register-form" action="index.php" method="post" role="form" style="display: none;">
  									<div class="form-group">
                      <!-- Feld 1 - Vorname -->
                      <div class="form-group">
                        <input type="text" name="firstname" id="firstname" tabindex="2" class="form-control" placeholder="Vorname">
                      </div>
                      <!-- Feld 2 - Nachname -->
                      <div class="form-group">
                        <input type="text" name="lastname" id="lastname" tabindex="2" class="form-control" placeholder="Nachname">
                      </div>
                      <!-- Feld 3 - Emailadresse -->
  										<input type="email" name="email" id="email" tabindex="2" class="form-control" placeholder="E-Mail-Adresse" value="">
  									</div>
                    <!-- Feld 4 - Passwort -->
  									<div class="form-group">
  										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Passwort">
  									</div>
                    <!-- Feld 5 - Passwort bestätigen -->
  									<div class="form-group">
  										<input type="password" name="confirm-password" id="confirm-password" tabindex="2" class="form-control" placeholder="Passwort bestätigen">
  									</div>
                    <!-- Checkboxen Interessen -->
                    <!-- Checkbox Interesse 1-->
                    <label class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" value="future">
                        <span class="custom-control-indicator"></span>
                        <span class="custom-control-description">Zukunft</span>
                    </label>
                  </br>
                    <!-- Checkbox Interesse 2 -->
                    <label class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" value="events">
                        <span class="custom-control-indicator"></span>
                        <span class="custom-control-description">Veranstaltungen</span>
                    </label>
                  </br>
                    <!-- Checkbox Interesse 3 -->
                    <label class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" value="history">
                        <span class="custom-control-indicator"></span>
                        <span class="custom-control-description">Geschichte</span>
                    </label>
                  </br>
                    <!-- Chechbox Interesse 4 -->
                    <label class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" value="news">
                        <span class="custom-control-indicator"></span>
                        <span class="custom-control-description">News</span>
                    </label>
                  </br>
                    <!-- Chechbox Interesse 5 -->
                    <label class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" value="projectsun">
                        <span class="custom-control-indicator"></span>
                        <span class="custom-control-description">Bauprojekt SUN</span>
                    </label>
                  </br>
                    <!-- Chechbox Interesse 6 -->
                    <label class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" value="projectkidsstation">
                        <span class="custom-control-indicator"></span>
                        <span class="custom-control-description">Bauprojekt Kinderstation</span>
                    </label>
                  </br>
                    <!-- Checkbox Interesse 7 -->
                    <label class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" value="doctor">
                        <span class="custom-control-indicator"></span>
                        <span class="custom-control-description">Eine Ärztin erzählt</span>
                    </label>

                    <!-- Button registrieren -->
  									<div class="form-group">
  										<div class="row">
  											<div class="col-sm-6 col-sm-offset-3">
  												<input type="submit" name="register-submit" id="register-submit" tabindex="3" class="form-control btn btn-register" value="Jetzt registrieren">
  											</div>
  										</div>
  									</div>
                  </div>
  								</form>
                  <div class="row">
                    <div class="col-xs-6">
                        <a href="#" id="login-form-link">Login</a>
                      </div>
                  </div>

                  <div class="row">
                    <div class="col-xs-6">
                      <a href="#" id="register-form-link">Hast du noch kein Konto?</a>
                    </div>
                  </div>
  							</div>
  						</div>
  					</div>
  				</div>
  			</div>


<!-- Rückmeldung Registrierungs- / Loginprozess -->
      <?php if($success == true){ ?>
            <div class="alert alert-success" role="alert"><?php echo $success_msg; ?></div>
      <?php } ?>

      <?php if($error == true){ ?>
            <div class="alert alert-danger" role="alert"><?php echo $error_msg; ?></div>
      <?php } ?>

    </div><!-- /container -->


    <!-- Javascript -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script>

      $(function() {

        $('#login-form-link').click(function(e) {
      		$("#login-form").delay(100).fadeIn(100);
       		$("#register-form").fadeOut(100);
      		$('#register-form-link').removeClass('active');
      		$(this).addClass('active');
      		e.preventDefault();
      	});

      	$('#register-form-link').click(function(e) {
      		$("#register-form").delay(100).fadeIn(100);
       		$("#login-form").fadeOut(100);
      		$('#login-form-link').removeClass('active');
      		$(this).addClass('active');
      		e.preventDefault();
      	});

      });
    </script>

  </body>
</html>
