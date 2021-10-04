<?php
  require_once "./json.php";
  require_once "../php_principales/json_paths.php";
  session_start();

  function get_users(){
      return readJSON(USERS_DATA_FILE);
  }

  //Cargar en un arreglo los datos de los usuarios desde el JSON
  function save_user($data){
      $users = readJSON(USERS_DATA_FILE);
      //Insertar el nuevo usuario en el arreglo
      $users[$data["username"]]=$data;
      return writeJSON(USERS_DATA_FILE,$users);
  }

  function user_exist($data){
    $users = readJSON(USERS_DATA_FILE);
    $username=$data["username"];
    //Buscar los datos en el archivo JSON
    if(!empty($users)){
      foreach($users as $id => $user){
        if($username===$user["username"]){
          return true;
        }else{
          return false;
        }
      }
    }
  }
?>
