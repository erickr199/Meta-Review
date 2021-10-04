 <?php

  function readJSON($filepath){
      //Leer el contenido del archivo
      if($data = file_get_contents($filepath)){
          //Transformarlo a un arreglo y luego devolverlo
          return json_decode($data,true);
      }
      return false;
  }

  //Inserta una arreglo asociativo de PHP en un archivo con formato JSON
  function writeJSON($filepath,$data){
      //Transformar la estructura de datos a JSON
      if($jsonData = json_encode($data,JSON_PRETTY_PRINT)){
          return file_put_contents($filepath,$jsonData);
      }
      return false;
  }

?>
