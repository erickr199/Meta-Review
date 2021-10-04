<?php
/*Procesamiento comentario*/
 @session_start();

require_once "../php/json.php";          //php con declaracion funciones read y write JSON
require_once "./json_paths.php";         //php con la definicion paths archivos JSON


//print_r($_POST);

//Cargar JSON comentarios
$comments = readJSON(COMMENTS_DATA_FILE);

//El titulo de la review al que esta asociado el comentario fue pasado medieante POST utilizando el "value" del boton de submit
$titulo = $_POST["submit"];


//Crear comentario solo si el usuario esta loggeado
if (isset($_SESSION["logeado"]))
{
    //Crear un arreglo con la representación de un comentario
        $data = [
            "username" => $_SESSION["username"],
            "comment"   => $_POST["comment"],
            "time_stamp"=> time()
        ];

    //Insertar el nuevo comentario asociado al titulo correspondiente en el arreglo
    $comments[$titulo][] = $data;

    //Guardar la estructura en el archivo JSON
    if(writeJSON(COMMENTS_DATA_FILE,$comments))
    {
      //Redirigir a la misma review
    	if($_POST["categoria"]=="peliculas"){ header("Location: ../php/peliculas_reseña.php?titulo=$titulo");}
    	if($_POST["categoria"]=="libros"){ header("Location: ../php/libros_reseña.php?titulo=$titulo");}
    	if($_POST["categoria"]=="musica"){ header("Location: ../php/musica_reseña.php?titulo=$titulo");}
        echo "success";
    }
    else{
        //header("Location: ../index.php?error=1");
        echo "error en writeJSON";
    }
}
else
{
	//Si no esta loggeado, redirigir a pagina para iniciar sesion
	header("Location: ../php/login.php");
}



?>