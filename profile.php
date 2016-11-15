<?php
session_start();
  if(!isset($_SESSION['id'])){
  //  header("Location:index.php");
  }else{
    $user_id = $_SESSION['id'];
  }

  require_once("data.php");
  $result = get_user_by_id($user_id);
  $user = mysqli_fetch_assoc($result);
    echo $user['firstname'];


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

    <title>Kantonsspital Chur - Login</title>

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
    							<h3>Kantonsspital Chur</h3>
  							</div>
  						</div>
  						<hr>
  					</div>

            <!-- Eingabefelder Formular -->
  					<div class="panel-body">
  						<div class="row">
  							<div class="col-lg-12">
  								<form id="edit-profile" action="profile.php" method="post" role="form" style="">
                    <div class="input-group">
                          <input type="text" class="form-control" placeholder="Vorname" aria-describedby="basic-addon1">
                        </div>

                    <div class="input-group">
                          <input type="text" class="form-control" placeholder="Nachname" aria-describedby="basic-addon1">
                        </div>
                      <div class="input-group">
                          <input type="text" class="form-control" placeholder="E-Mail" aria-describedby="basic-addon1">
                        </div>
                      <div class="input-group">
                          <input type="text" class="form-control" placeholder="Passwort" aria-describedby="basic-addon1">
                        </div>
                        <br>

                        <!-- Eingabefelder Formular Ende -->

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
                  </form>
                  <!-- Speichern Button -->
                  <div class="panel-body">
                    <div class="row">
                      <div class="col-lg-12">
                        <input type="submit" name="login-submit" id="login-submit" value="Speichern">
                      </div>
                    </div>
                  </div>

  							</div>
  						</div>
            </div>
          </div>
        </div>
      </div>






    <!-- Javascript -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script>

    </script>

  </body>
</html>
