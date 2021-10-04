<!DOCTYPE html>
<html>
  <!--Head----->
  <?php require_once('../php_principales/head.php'); 
  require_once('../php/json.php');
  require_once('../php_principales/json_paths.php');

////funcion: Sort array por numero de estrellas///
function sort_stars($array){
  foreach ($array as $key => $node) {
     $stars[$key]    = $node["stars"];
  }
  array_multisort($stars, SORT_DESC, $array);
  return $array;
}
//////////////////////////////////////////////////

//Almacenar JSONs en arrays
$libros    = readJSON(LIBROS_DATA_FILE);
$peliculas = readJSON(PELICULAS_DATA_FILE);
$musica    = readJSON(MUSICA_DATA_FILE);

//Ordenar por numero de estrellas
$libros    = sort_stars($libros);
$peliculas = sort_stars($peliculas);
$musica    = sort_stars($musica);

//Almacena en un array las llaves indexadas con numeros 
$index_libros    = array_keys($libros);
$index_peliculas = array_keys($peliculas);
$index_musica    = array_keys($musica);


?>
  <body>
    <!--Header----->
    <?php require_once('../php_principales/header.php'); ?>

    <!--Top de la semana-->
    <section>
      <article class="principal">
        <div class="titulos">
          <h1>Top de la semana</h1>
        </div>

<!--Top Peliculas-->
        <div class="titulos">
          <h2>Películas</h2>
        </div>
<?php 
        for ($i=0;$i<3;$i++){ ?>        
          <div class="row">
            <div class="col">
              <img src="<?php echo $peliculas[$index_peliculas[$i]]["image"];?>" class="rounded mx-auto d-block">
            </div>
            <div class="col-sm-7">
              <div class="resumen">
                <div class="container">
                  <h2> Calificacion:                
                  <?php $stars=$peliculas[$index_peliculas[$i]]["stars"]; ?>
                  <?php for($j=0; $j<$stars ; $j++){ ?>
                    <img src="../resources/Star_1.png" style="height:30px; width:30px; margin:0px;">
                  <?php } ?>

                  </h2>
                  <a href="<?php echo '../php/peliculas_reseña.php?titulo='.$index_peliculas[$i];?>">
                  <h2 style="color: black;"> <?php echo $peliculas[$index_peliculas[$i]]["titulo"];?> </h2>
                  </a>
                  <p>  <?php echo $peliculas[$index_peliculas[$i]]["review"];?> </p>
                </div>
              </div>
            </div>
          </div>
 <?php } ?>

<!--Top Musica-->
         <div class="titulos">
          <h2>Musica</h2>
        </div>
<?php 
        for ($i=0;$i<3;$i++){ ?>        
          <div class="row">
            <div class="col">
              <img src="<?php echo $musica[$index_musica[$i]]["image"];?>" class="rounded mx-auto d-block">
            </div>
            <div class="col-sm-7">
              <div class="resumen">
                <div class="container">
                  <h2> Calificacion:                
                  <?php $stars=$musica[$index_musica[$i]]["stars"]; ?>
                  <?php for($j=0; $j<$stars ; $j++){ ?>
                    <img src="../resources/Star_1.png" style="height:30px; width:30px; margin:0px;">
                  <?php } ?>

                  </h2>
                  <a href="<?php echo '../php/musica_reseña.php?titulo='.$index_musica[$i];?>">
                  <h2 style="color: black;"> <?php echo $musica[$index_musica[$i]]["titulo"];?> </h2>
                  </a>
                  <p>  <?php echo $musica[$index_musica[$i]]["review"];?> </p>
                </div>
              </div>
            </div>
          </div>
 <?php } ?>

<!--Top libros-->
         <div class="titulos">
          <h2>Libros</h2>
        </div>
<?php 
        for ($i=0;$i<3;$i++){ ?>        
          <div class="row">
            <div class="col">
              <img src="<?php echo $libros[$index_libros[$i]]["image"];?>" class="rounded mx-auto d-block">
            </div>
            <div class="col-sm-7">
              <div class="resumen">
                <div class="container">
                  <h2> Calificacion:                
                  <?php $stars=$libros[$index_libros[$i]]["stars"]; ?>
                  <?php for($j=0; $j<$stars ; $j++){ ?>
                    <img src="../resources/Star_1.png" style="height:30px; width:30px; margin:0px;">
                  <?php } ?>

                  </h2>
                  <a href="<?php echo '../php/libros_reseña.php?titulo='.$index_libros[$i];?>">
                  <h2 style="color: black;"> <?php echo $libros[$index_libros[$i]]["titulo"];?> </h2>
                  </a>
                  <p>  <?php echo $libros[$index_libros[$i]]["review"];?> </p>
                </div>
              </div>
            </div>
          </div>
 <?php } ?>


        </article>
    </section>

    <!--Footer-->
    <?php require_once('../php_principales/footer.php'); ?>

  </body>
</html>
