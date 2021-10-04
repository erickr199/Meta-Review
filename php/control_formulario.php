<?php
  require_once "./modelo_usuarios.php";
  
  //Crear un arreglo con la representación de los usuarios
  $data = [
      "id" => uniqid(),
      "username" => $_POST["username"],
      "password" => $_POST["password"],
      "nombre" => $_POST["nombre"],
      "apellidos" => $_POST["apellidos"],
      "birthday" => $_POST["fecha_nacimiento"],
      "usertype" => $_POST["tipo_usuario"]
  ];

  if(user_exist($data)){
    header("Location: ./index.php?error=1");
  }else{
    if(save_user($data)){
      header("Location: ./index.php");
    }
  }
