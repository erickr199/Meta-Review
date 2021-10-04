<?php 
/*Desplegar comentarios en la pagina de la review actual*/
require_once "../php/json.php";          //php con declaracion funciones read y write JSON
require_once "../php_principales/json_paths.php";         //php con la definicion paths archivos JSON

//Cargar JSON comentarios
$comments = readJSON(COMMENTS_DATA_FILE);

if (isset($comments[$review["titulo"]]))
{
	//almacena los comentarios unicamente de la review actual(local)
	$local_comments = $comments[$review["titulo"]];
	$i = count($local_comments)-1;

	for ($i;$i>=0;$i--)
	{ 
		$date = date('m/d/Y', $local_comments[$i]["time_stamp"]);
		?>
		<div class="container mt-3">
          <div class="media border p-3">
            <img src="../resources/user_icon.jpg" alt="user" class="mr-3 mt-3 rounded-circle">
            <div class="media-body">
              <h4> <?php echo $local_comments[$i]["username"]; ?> <small>
              	<i> Posted on <?php echo $date;?></i></small></h4>
              <p><?php echo $local_comments[$i]["comment"];?></p>
            </div>
          </div>
        </div>
<?php
	}

}
else
{ ?>
	<!--Desplegar mensaje de no existencia de comentarios en caso de que aun no haya-->
        <div class="container mt-3">
          <div class="media border p-3">
            <div class="media-body">
              </br>
              <p>Aun no hay comentraios publicados, se el primero en comentar!</p>
               </br>
            </div>
          </div>
        </div>

<?php } ?>


