<!DOCTYPE html>
<html>
<!--Head----->
<?php
require_once('../php_principales/head_categorias.php');
require_once('../php/json.php');
require_once('../php_principales/json_paths.php');

$peliculas = readJSON(PELICULAS_DATA_FILE);
$titulo = array_keys($peliculas);
$index = count($peliculas)-1;
?>
<body>
    <!--Header----->
    <?php require_once('../php_principales/header.php'); ?>

  <!--////Categorias////-->
 <section>
     <div class="titulos">
    <h1>Peliculas</h1>
    </div>
      <div id="Categorias_page">
        <div id="categorias_chart">
        <?php
          $row_max = intval((count($peliculas)/5)+1);
          $item_max = (count($peliculas)) % 5;

          //Generar tabla de peliculas con PHP
          for ($row=1;$row<=$row_max;$row++)
          {

            echo '<div class="row">';

            if($row<$row_max)
            {
              for($item=1;$item<=5;$item++){ ?>
                  <div class="Item">
                    <img src="<?php echo $peliculas[$titulo[$index]]["image"];?>" alt=""/><br/>
                    <a href="<?php echo '../php/peliculas_reseña.php?titulo='.$titulo[$index] ?>">
                      <p> <?php echo $peliculas[$titulo[$index]]["titulo"];?> </p>
                    </a>
                    <p>  <?php echo $peliculas[$titulo[$index]]["year"];?>   </p>
                  </div>
        <?php $index--;
              }
            }
            else
            {
              for($item=1;$item<=$item_max;$item++){ ?>
                  <div class="Item">
                     <img src="<?php echo $peliculas[$titulo[$index]]["image"];?>" alt=""/><br/>
                     <a href="<?php echo '../php/peliculas_reseña.php?titulo='.$titulo[$index] ?>">
                       <p> <?php echo $peliculas[$titulo[$index]]["titulo"];?> </p>
                     </a>
                     <p>  <?php echo $peliculas[$titulo[$index]]["year"];?>   </p>
                  </div>
        <?php $index--;
              }
            }

            echo '</div>';
          }

        ?>
    </div>
  </div>
  </section>

  <!--Footer-->
  <?php require_once('../php_principales/footer.php'); ?>
  </body>
</html>
