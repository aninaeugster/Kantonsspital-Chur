<?php
require_once("data.php");

  function get_result($sql){
    $db = get_db_connection();
  echo $sql;
    $result = mysqli_query($db, $sql);
    mysqli_close($db);
    return $result;
  }

  function get_result_id($sql){
    $db = get_db_connection();
    mysqli_query($db, $sql);
    $result = mysqli_insert_id($db);
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

  function register($firstname, $lastname, $email, $password){
    $sql = "INSERT INTO user (firstname, lastname, email, password) VALUES ('$firstname', '$lastname', '$email', '$password') ;";
    return get_result_id($sql);
  }

  /* *************************************************************************************
  PROFILE.PHP
  /*************************************************************************************** */

    function get_user_by_id($user_id){
      $sql = "SELECT * FROM user WHERE user_id = $user_id;";
      return get_result($sql);
    }

    /* *************************************************************************************
    INTERESSEN.PHP
    /*************************************************************************************** */

    function add_interests($user_id, $interest_list)
    {
      foreach($interest_list as $interest_id){
        $sql = "INSERT INTO interest_relations (`user-id`, `interest-id`) VALUES ($user_id, $interest_id);";
        get_result($sql);
      }
    }

    function get_interests(){
      $sql = "SELECT * FROM interest;";
      return get_result($sql);
    }

  /* *************************************************************************************
  QUIZ.php
    /*************************************************************************************** */

    function get_questions(){                                      //Antwort an Datenbank (mysqli_query), Ergebnis speichern (result)und Verbindung schliessen
      $sql = "SELECT * FROM questions;";
      return get_result($sql);
  }

    function get_answers_by_questionid($questionid){
      $sql = "SELECT * FROM answers WHERE question_id = $question_id;";
      return get_result($sql);
    }

  ?>
