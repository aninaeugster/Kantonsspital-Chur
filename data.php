<?php
  function get_db_connection()
{
    $db = mysqli_connect("localhost", "321724_3_1", "HwbiNEfGMz76", "321724_3_1")
    or die("Fehler beim Verbinden mit dem Datenbank-Server.");
    mysqli_set_charset($db, "utf8");
  return $db;
}

  function get_result($sql){
    $db = get_db_connection();
  echo $sql;
    $result = mysqli_query($db, $sql);
    mysqli_close($db);
    return $result;
  }

/* *************************************************************************************
LOGIN.PHP
/*************************************************************************************** */

  function login($email, $password){
    $sql = "SELECT * FROM user WHERE email = '$email' AND password = '$password';";
    return get_result($sql);
  }

  function register($email, $password){
    $sql = "INSERT INTO user (email, password) VALUES ('$email', '$password') ;";
    return get_result($sql);
  }

  /* *************************************************************************************
  PROFILE.PHP
  /*************************************************************************************** */

    function get_user_by_id($user_id){
      $sql = "SELECT * FROM user WHERE user_id = $user_id;";
      return get_result($sql);
    }
  ?>
