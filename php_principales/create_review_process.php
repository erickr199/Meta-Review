<?php
/*
procesa la creacion de una review nueva
*/

require_once "../php/json.php";           //php con declaracion funciones read y write JSON
require_once "./json_paths.php";         //php con la definicion paths archivos JSON


//print_r($_POST);


//Cargar JSON libros/musica/peliculas dependiendo de lo seleccionado por el creador de la review
//Crear un id unico para la review
if($_POST["submit"]=="pelicula"){
$reviews = readJSON(PELICULAS_DATA_FILE);
$id = "mov00".sprintf(count($reviews));
$categoria = "peliculas";
$output_JSON = PELICULAS_DATA_FILE;
$uploaddir = '../posters/films/';
}

if($_POST["submit"]=="libro"){
$reviews = readJSON(LIBROS_DATA_FILE);
$id = "book00".sprintf(count($reviews));
$categoria = "libros";
$output_JSON = LIBROS_DATA_FILE;
$uploaddir = '../posters/books/';
}

if($_POST["submit"]=="musica"){
$reviews = readJSON(MUSICA_DATA_FILE);
$id = "msc00".sprintf(count($reviews));
$categoria = "musica";
$output_JSON = MUSICA_DATA_FILE;
$uploaddir = '../posters/music/';
}


//verificar si el titulo de pelicula/libro/musica ya existe
$review_name =$_POST["titulo"];

foreach ($reviews as $key => $review) {
    if($review_name == $review["titulo"]){
        $reviewname_taken=true;
        break(1);
    }
    else{
        $reviewname_taken=false;
    }
}


if($reviewname_taken==false){

    //guardar la imagen subida al directorio correspondiente
    $uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
    echo '<pre>';
    if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
  //   echo "File is valid, and was successfully uploaded.\n";
    } else {
      //  echo "Possible file upload attack!\n";
    }
  //  echo 'Here is some more debugging info:';
//    print_r($_FILES);

//    print "</pre>";


    //Crear un arreglo con la representación de la review
    if($_POST["submit"]=="pelicula")
    {
        $data = [
            "titulo" => $_POST["titulo"],
            "id" => $id,
            "categoria" => $categoria,
            "clasificacion"=>$_POST["clasificacion"],
            "estreno"   =>  $_POST["estreno"],
            "director"  => $_POST["director"],
            "genero"    => $_POST["genero"],
            "year"      => $_POST["año"],
            "review"    => $_POST["reseña"],
            "image"     => $uploadfile,
            "time_stamp"=> time(),
            "stars"     => intval($_POST["stars"])
        ];
    }
    if($_POST["submit"]=="libro")
    {
        $data = [
            "titulo" => $_POST["titulo"],
            "id" => $id,
            "categoria" => $categoria,
            "autor"  => $_POST["autor"],
            "isbn" => $_POST["isbn"],
            "editorial" => $_POST["editorial"],
            "genero"    => $_POST["genero"],
            "year"      => $_POST["año"],
            "review"    => $_POST["reseña"],
            "image"     => $uploadfile,
            "time_stamp"=> time(),
            "stars"     => intval($_POST["stars"])
        ];
    }
    if($_POST["submit"]=="musica")
    {
        $data = [
            "titulo" => $_POST["titulo"],
            "id" => $id,
            "categoria" => $categoria,
            "compositor"  => $_POST["compositor"],
            "duracion"  => $_POST["duracion"],
            "genero"    => $_POST["genero"],
            "year"      => $_POST["año"],
            "review"    => $_POST["reseña"],
            "image"     => $uploadfile,
            "time_stamp"=> time(),
            "stars"     => intval($_POST["stars"])
        ];
    }

    //Insertar la nueva review en el arreglo
    $reviews[$review_name] = $data;

    //Guardar la estructura en el archivo JSON
    if(writeJSON($output_JSON,$reviews))
    {
        //Redirigir al catálogo
        if($_POST["submit"]=="pelicula")
        {
        header("Location: ../php/categ_peliculas.php");
        }
        if($_POST["submit"]=="libro")
        {
        header("Location: ../php/categ_libros.php");
        }
        if($_POST["submit"]=="musica")
        {
        header("Location: ../php/categ_musica.php");
        }
      //  echo "success";
    }
    else{
        //header("Location: ../index.php?error=1");
        echo "error en writeJSON";
    }
}
else{
  //  echo "<p> El titulo: $review_name ya existe, introduce uno diferente</p>";
    //header("Location: ../index.php?error=1");
}

?>
