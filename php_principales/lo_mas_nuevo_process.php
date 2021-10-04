<?php 
/*Genera la seccion de "Lo mas nuevo" en la landing page (index.php)
  Esta seccion desplega los contenidos agregados mas recientemente por time_stamp*/

require_once('../php/json.php');
require_once('../php_principales/json_paths.php');

$peliculas = readJSON(PELICULAS_DATA_FILE);
$libros =	 readJSON(LIBROS_DATA_FILE);
$musica =    readJSON(MUSICA_DATA_FILE);

function append_array ($array_a, $array_b){
//Inserta todos los elementos de unarreglo asociativo B 
//al final de un arreglo asociativo A
	foreach ($array_b as $key => $value) {
		$array_a[$key] = $value;
	}
	return $array_a;
}

//poner todos los JSON en un mismo array
$array = $peliculas;
$array = append_array($array,$libros);
$array = append_array($array,$musica);

//Sort array por time_stamp
foreach ($array as $key => $node) {
   $timestamps[$key]    = $node["time_stamp"];
}
array_multisort($timestamps, SORT_DESC, $array);

//arreglo que almacena las llaves del array en un arreglo indexado por numeros
$titulo = array_keys($array);
$index =0;

?>

  <!-- Lo más nuevo -->
    <section id="topnew">
      <div class="titulos">
        <h3>Mantente al día</h3>
        <h1>Lo más nuevo</h1>
      </div>

      <div class="Block_Table">
      	<?php 
      	//generar tabla lo mas nuevo
      		for ($row=1;$row<=2;$row++)
      		{
      		  echo '<div class="Row">';
      		  for ($col=1;$col<=4;$col++){ 
      		  	  //obtener categoria elemento para saber direccion a redireccionar	
      		      $categoria = $array[$titulo[$index]]["categoria"];
      		      if ($categoria=="peliculas"){$link='../php/peliculas_reseña.php?titulo='.$titulo[$index];}
      		      if ($categoria=="libros"){$link='../php/libros_reseña.php?titulo='.$titulo[$index];}
      		      if ($categoria=="musica"){$link='../php/musica_reseña.php?titulo='.$titulo[$index];}
      		  	  ?>
	      		  <a href="<?php echo $link; ?>">
	                <div class="Item">
	                  <img src="<?php echo $array[$titulo[$index]]["image"];?>" alt=""/>
	                  <div class="overlay"></div>
	                  <h2> <?php echo $array[$titulo[$index]]["titulo"];?> </h2>
	                  <p>  <?php echo $array[$titulo[$index]]["review"];?> </p>
	                </div>
	              </a>

         <?php $index++;
     		  }
      		  echo '</div>';
      		}
      	?>
      </div>
    </section>








