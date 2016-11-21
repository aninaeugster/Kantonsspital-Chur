<?php

session_start();
  if(isset($_SESSION["id"]))  unset($_SESSION["id"]);
    session_destroy();

    require_once("data.php");                                                         //Macht Inhalt der geladenen Datei verfügbar
    require_once("security.php");                                                     //Datensicheritsmassnahme

$error = false;
$error_msg = "";
$success = false;
$success_msg = "";


$question_list = get_questions();

?>

<html lang= "en" >
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Quiz</title>

  <!-- Bootstrap -->
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->



</head>

<body>

  <html>

 <head>

   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
   <meta name="description" content="">
   <meta name="author" content="">

   <title>Kantonsspital Graubünden - Home</title>

   <!-- Bootstrap core CSS -->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

   <!-- Custom styles for this template -->
   <link href="css/simple-sidebar.css" rel="stylesheet">
 </head>

 <body>

   <div class="row">
     <div class="col-xs-1">
       <div class="thumbnail">
         <img src="images/logo.png" alt="LogoKSCH" class="img-responsive">
       </div><!-- /thumbnail -->
     </div><!-- /col-sm-2 -->
   <h1>Machen Sie jetzt mit!</h1>
   <!-- Navigation -->

   <nav class="nav navbar navbar-right">
     <div class="container-fluid">
       <!-- Brand and toggle get grouped for better mobile display -->
       <div class="navbar-header">
         <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
           <span class="sr-only">Toggle navigation</span>
           <span class="icon-bar"></span>
           <span class="icon-bar"></span>
           <span class="icon-bar"></span>
         </button>
         <div class="col-md-12">
           <div class="thumbnail">
             <img src="images/default_ks_avatar.png" alt="thumbnailProfilPic" class="img-responsive">
         <a class="navbar-brand" href="#">Username</a>
     </div><!-- /thumbnail -->
   </div><!-- /col-sm-2 -->
   </div>
       <!-- Collect the nav links, forms, and other content for toggling -->
       <div class = "col-sm-14">
       <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
         <ul class="nav navbar navbar-right">
          <li><a href="#">Home</a></li>
          <li><a href="profil.php">Profil</a></li>
          <li><a href="index.php">Logout</a></li>
         </ul>
       </div>
       </div><!-- /.navbar-collapse -->
     </div><!-- /.container-fluid -->
   </nav><!-- /Navigation -->

   <!-- Hauptinhalt -->




   <div class="container">
     <div class="row">
       <div class="col-md-10">

<p> 1. Welche dieser Neuerungen wurden im Kantonsspital Chur durchgeführt?</p>
<form action="check.php" method="post">
<input type="radio" name="neuerung" value="Indikationsliste"> Überarbeitung der Indikationsliste Radiologie und Nuklearmedizin <br>
<input type="radio" name="neuerung" value="Mikrobien"> Mikrobien <br>
<input type="radio" name="neuerung" value="Zelltherapie"> Zelltherapie <br>
</form>

<p> <input type="submit" name="auswahl" value="Abschicken"> </p>

<p> 2.In welchem Jahr wurde das erste Mal von einem Hospital in Chur berichtet? </p>
<form action="check.php" method="post">
<input type="radio" name="jahr" value="1225"> 1225 <br>
<input type="radio" name="jahr" value="1070"> 1070 <br>
<input type="radio" name="jahr" value="1153"> 1153 <br>
</form>

<p> <input type="submit" name="auswahl" value="Abschicken"> </p>

<p> 3. Was ist im Rahmen des KiM-Projektes geplant? </p>
<form action="check.php" method="post">
<input type="radio" name="kim" value="Neuorientierung"> Neuorientierung der Ausgangsbereiche <br>
<input type="radio" name="kim" value="Neuorganisation"> Neubau des Betthauses M und die Neuorganisation der Kinderklinik <br>
<input type="radio" name="kim" value="Mensabereich"> Umbau des Mensabreichs <br>
</form>

<p> <input type="submit" name="auswahl" value="Abschicken"> </p>

<p> 4.Welcher Teil ist vom SUN-Projekt NICHT betroffen? </p>
<form action="check.php" method="post">
<input type="radio" name="sun" value="MRI"> MRI <br>
<input type="radio" name="sun" value="Röntgeninstitut"> Röntgeninstitut <br>
<input type="radio" name="sun" value="HNO"> HNO-Bereich <br>
</form>

<p> <input type="submit" name="auswahl" value="Abschicken"> </p>

</body>

</html>
