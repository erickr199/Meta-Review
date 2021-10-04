<?php
  require_once "./json.php";
  require_once "../php_principales/json_paths.php";
  require_once "./config.php";

  $username = $_POST["username"];
  $password = $_POST["password"];
  // var_dump($username);
  // var_dump($password);
  // die();

  if($users = readJSON(USERS_DATA_FILE)){
    $user = $users[$username];
    if($password === $user["password"]){
        session_start();
        $_SESSION["logeado"] = true;
        $_SESSION["tiempo_inicio"] = time();
        $_SESSION["username"] = $user["username"];
        $_SESSION["nombre"] = $user["nombre"];
        $_SESSION["apellidos"] = $user["apellidos"];
        $_SESSION["user_type"] = $user["usertype"];
        if($_SESSION["logeado"]){
          header("Location: ./index.php");
        }
    }else{
        header("Location: ./login.php?error=1");
    }
  }
?>
