<?php 
/*Search process: utiliza la seccion de buscar en la barra de navegacion para arrojar un resultado*/
//var_dump($_GET["search"]);

require_once('../php/json.php');
require_once('../php_principales/json_paths.php');


///////////////Funciones///////////////
function append_array ($array_a, $array_b){
//Inserta todos los elementos de unarreglo asociativo B 
//al final de un arreglo asociativo A
	foreach ($array_b as $key => $value) {
		$array_a[$key] = $value;
	}
	return $array_a;
}

//hace busqueda recursiva en un array, devuelve la llave de la primera coincidencia
function recursive_array_search($needle,$haystack) {
    foreach($haystack as $key=>$value) {
        $current_key=$key;
        if($needle===$value OR (is_array($value) && recursive_array_search($needle,$value) !== false)) {
            return $current_key;
        }
    }
    return false;
}
/////////////////////////////

//cargar los JSONs
$peliculas = readJSON(PELICULAS_DATA_FILE);
$libros =	 readJSON(LIBROS_DATA_FILE);
$musica =    readJSON(MUSICA_DATA_FILE);

//poner todos los JSON en un mismo array
$array = $peliculas;
$array = append_array($array,$libros);
$array = append_array($array,$musica);


//Buscar si hay alguna coincidencia con la busqueda en la base de datos (JSONs almacenados en $array)
$search = $_GET["search"];
$key = recursive_array_search($search,$array);
if ($key)
{
	//redireccionar a la pagina correspondiente
	$categoria = $array[$key]["categoria"];
	if ($categoria=="peliculas"){$link='../php/peliculas_reseña.php?titulo='.$key;}
	if ($categoria=="libros"){$link='../php/libros_reseña.php?titulo='.$key;}
	if ($categoria=="musica"){$link='../php/musica_reseña.php?titulo='.$key;}

	  header("Location: ".$link);
}
else
{ ?>

<!DOCTYPE html>
<html>
	<!--Head----->
	<?php require_once('../php_principales/head.php'); ?>
<body>
	<!--Header----->
	<?php require_once('../php_principales/header.php'); ?>
	</br>
	<h3><?php echo "No se encontraron coincidencias para la busqueda: $search"?></h3>

  	</br></br></br></br></br></br></br></br></br></br></br></br>
	<!--Footer-->
	<?php require_once('../php_principales/footer.php'); ?>
</body>
</html>


<?php } ?>