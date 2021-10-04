<?php
  require_once('../php/json.php');
  require_once('../php_principales/json_paths.php');

  $categoria=$_POST["categoria"];
  $stars=$_POST["stars"];
  $titulo=$_POST["titulo"];


//Cargar el JSON
$libros=readJSON(LIBROS_DATA_FILE);
$musica=readJSON(MUSICA_DATA_FILE);
$peliculas=readJSON(PELICULAS_DATA_FILE);

//Buscar el libro por el titulo
function save_grade_books($data){
  $libros=readJSON(LIBROS_DATA_FILE);
  //Insertar el nuevo usuario en el arreglo
  $libros[$data["titulo"]]=$data;
  //var_dump($data);
  //var_dump($libros);
  return writeJSON(LIBROS_DATA_FILE,$libros);
}

//Buscar el libro por el titulo
function save_grade_music($data){
  $musica=readJSON(MUSICA_DATA_FILE);
  //Insertar el nuevo usuario en el arreglo
  $musica[$data["titulo"]]=$data;
  //var_dump($data);
  //var_dump($musica);
  return writeJSON(MUSICA_DATA_FILE,$musica);
}

//Buscar el libro por el titulo
function save_grade_movies($data){
  $peliculas=readJSON(PELICULAS_DATA_FILE);
  //Insertar el nuevo usuario en el arreglo
  $peliculas[$data["titulo"]]=$data;
  //var_dump($data);
  //var_dump($peliculas);
  return writeJSON(PELICULAS_DATA_FILE,$peliculas);
}

if($categoria==="libros"){
  foreach($libros as $titulos => $libro){
    $estrellas=$libro["stars"];
    settype($stars, 'int');
    if($titulo===$libro["titulo"]){
        //Modificar las estrellas
        $estrellas=(int)(($estrellas+$stars+1)/2);
        $libro["stars"]=$estrellas;
        //Guardar la estructura de datos en el JSON
        //var_dump($libro["stars"]);
        save_grade_books($libro);
        //Hacer el redirect -> header location
        header("Location:" . $_SERVER["HTTP_REFERER"]);
    }
  }
}else if($categoria==="musica"){
  foreach($musica as $titulos => $music){
    $estrellas=$music["stars"];
    settype($stars, 'int');
    if($titulo===$music["titulo"]){
        //Modificar las estrellas
        $estrellas=(int)(($estrellas+$stars+1)/2);
        $music["stars"]=$estrellas;
        //Guardar la estructura de datos en el JSON
        //var_dump($libro["stars"]);
        save_grade_music($music);
        //Hacer el redirect -> header location
        header("Location:" . $_SERVER["HTTP_REFERER"]);
      }
    }

}else if($categoria==="peliculas"){
  foreach($peliculas as $titulos => $pelicula){
    $estrellas=$pelicula["stars"];
    settype($stars, 'int');
    if($titulo===$pelicula["titulo"]){
        //Modificar las estrellas
        $estrellas=(int)(($estrellas+$stars+1)/2);
        $pelicula["stars"]=$estrellas;
        //Guardar la estructura de datos en el JSON
        //var_dump($libro["stars"]);
        save_grade_movies($pelicula);
        //Hacer el redirect -> header location
        header("Location:" . $_SERVER["HTTP_REFERER"]);
   }
  }
}


?>
