<!DOCTYPE html>
<html>
<?php
require_once('../php/json.php');
require_once('../php_principales/json_paths.php');
$JSON = readJSON(MUSICA_DATA_FILE);
//$review almacena el elemento del JSON que se desplegara en esta pagina
$review = $JSON[$_GET["titulo"]];
/*debug
echo "<pre>";
print_r($review);
echo "</pre>";
*/
?>


  <!--Head----->
  <?php require_once('../php_principales/head.php'); ?>

  <body>
    <!--Header----->
    <?php require_once('../php_principales/header.php'); ?>

    <!-- Página reseñas-->
    <section>
      <article class="principal">
        <div class="titulos">
          <h1><?php echo $review['titulo'] ?></h1>
        </div>
        <div class="row">
          <div class="col-sm-4">
            <img src="<?php echo $review['image'] ?>" class="rounded mx-auto d-block">
          </div>
          <div class="col-sm-8">
            <table >
              <tr>
                <th>Título:</th>
                 <td><?php echo $review['titulo'] ?> </td>
              </tr>
              <tr>
                <th>Calificación:</th>
                  <td>
                  <?php $stars=$review['stars'] ?>
                  <?php for($i=0; $i<$stars ; $i++){ ?>
                    <img src="../resources/Star_1.png">
                  <?php } ?>

                  <?php if(!empty($_SESSION) && $_SESSION["logeado"]){ ?>
                    <?php if($_SESSION["user_type"]==="2"){ ?>
                      <form action="./save_stars.php" method="post">
                          <!-- <input type="text" name="stars"/> -->
                          <input type="hidden" name="titulo" value="<?php echo $review['titulo']; ?>"/>
                          <input type="hidden" name="categoria" value="<?php echo $review['categoria']; ?>"/>
                          <!-- cambiar por radios -->
                          <label style="margin-right: 10px;" class="radio-inline">
                            <input type="radio" name="stars" value="1"> 1
                          </label>
                          <label style="margin-right: 10px;" class="radio-inline">
                            <input type="radio" name="stars" value="2"> 2
                          </label>
                          <label style="margin-right: 10px;" class="radio-inline">
                            <input type="radio" name="stars" value="3"> 3
                          </label>
                          <label style="margin-right: 10px;" class="radio-inline">
                            <input type="radio" name="stars" value="4"> 4
                          </label>
                          <label style="margin-right: 10px;" class="radio-inline">
                            <input type="radio" name="stars" value="5" checked> 5
                          </label>
                          <button class="btn btn-primary" type="submit">Calificar</button>
                      </form>
                    <?php } ?>
                <?php } ?>
                </td>
              </tr>
              <tr>
                <th>Artista:</th>
                 <td><?php echo $review['compositor'] ?> </td>
              </tr>
              <tr>
                <th>Album:</th>
                 <td><?php echo $review['titulo'] ?> </td>
              </tr>
              <tr>
                <th>Duración:</th>
                 <td><?php echo $review['duracion'] ?> </td>
              </tr>
              <tr>
                <th>Género:</th>
                 <td><?php echo $review['genero'] ?> </td>
              </tr>
              <tr>
                <th>Año:</th>
                 <td><?php echo $review['year'] ?> </td>
              </tr>
              <tr>
                <th>Categoría:</th>
                  <td><?php echo $review['categoria'] ?> </td>
              </tr>
              <tr>
                <th>Reseña:</th>
                  <td><?php echo $review['review'] ?> </td>
              </tr>
            </table>
          </div>
        </div>
      </article>

      <article class="comentarios">
        <div class="titulos">
          <h1>Comentarios</h1>
        </div>

        <!--Formulario comentario nuevo-->
        <div class="container mt-3">
          <div class="media border p-3">
            <img src="../resources/user_icon.jpg" alt="user" class="mr-3 mt-3 rounded-circle">
            <div class="media-body">

            <form action="../php_principales/comments_form_process.php" method="POST">
                <input type="hidden" id="categoria" name="categoria" value="musica">
                <input class="form-control mr-sm-2" type="text" placeholder="Agregar un comentario publico..." id="comment" name="comment" required>
                </br>
                <button class="btn btn-primary" style="background: #144F5C;" type="submit" name="submit" id="submit" value="<?php echo $review["titulo"];?>">Comentar</button>
            </form>

            </div>
          </div>
        </div>

        <!--Display comments-->
        <?php require_once('../php_principales/comments_display_process.php'); ?>

        </article>

        <!--Footer-->
        <?php require_once('../php_principales/footer.php'); ?>

  </body>
</html>
