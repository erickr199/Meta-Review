<?php
  require_once "./config.php";

  function checkPermission($page){
      global $permisos;
      if(isset($_SESSION["logeado"])){
        $user_type=$_SESSION["user_type"];
        if(isset($permisos[$user_type])){
          if(array_search($page,$permisos[$user_type])===false){ //Devuelve el indice de la localidad del arreglo
            header("Location: ./index.php");
          }
        }
      }else{
        header("Location: ./login.php");
      }
  }
