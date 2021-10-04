<?php
  require_once "./modelo_usuarios.php";
  require_once "./autorizar.php";
  checkPermission("reseña_peliculas");
?>

<!DOCTYPE html>
<html>
  <!--Head----->
  <?php require_once('../php_principales/head.php'); ?>

  <body>
    <!--Header----->
    <?php require_once('../php_principales/header.php'); ?>

    <!-- Publicar reseñas-->
    <section>
      <article class="principal">

        <div class="titulos">
          <h1>Publicar reseña pelicula</h1>
        </div>

        <div class="login-form" style="width: 1000px">
          <form action="../php_principales/create_review_process.php" method="POST" enctype="multipart/form-data">

            <!-- <p>Categoria:</p>
            <fieldset class="fs">
              <div class="form-check-inline">
                  <label class="form-check-label" for="peliculas">
                    <input type="radio" class="form-check-input" id="categ" name="categ" value="1" checked>Peliculas
                  </label>
              </div>
              <div class="form-check-inline">
                <label class="form-check-label" for="libros">
                  <input type="radio" class="form-check-input" id="categ" name="categ" value="2">Libros
                </label>
              </div>
              <div class="form-check-inline">
                <label class="form-check-label" for="musica">
                  <input type="radio" class="form-check-input" id="categ" name="categ" value="3">Música
                </label>
              </div>
            </fieldset> -->

            <div class="form-group">
              <label for="titulo">Titulo:</label>
              <input type="text" class="form-control" id="titulo" name="titulo">
            </div>
            <div class="form-group">
              <label for="director">Director/Autor/Compositor:</label>
              <input type="text" class="form-control" id="director" name="director">
            </div>
            <div class="form-group">
              <label for="clasificacion">Clasificación:</label>
              <input type="text" class="form-control" id="clasificacion" name="clasificacion">
            </div>
            <div class="form-group">
              <label for="estreno">Estreno:</label>
              <input type="date" class="form-control" id="estreno" name="estreno">
            </div>
            <div class="form-group">
              <label for="genero">Género:</label>
              <input type="text" class="form-control" id="genero" name="genero">
            </div>
            <div class="form-group">
              <label for="año">Año:</label>
              <input type="text" class="form-control" id="año" name="año">
            </div>
            <div class="form-group">
              <label for="reseña">Reseña:</label>
              <textarea type="text" class="form-control" id="reseña" name="reseña" ></textarea>
            </div>
            <p>Imagen:</p>
            <div class="form-group">
              <div class="custom-file">
                <label class="custom-file-label" for="image">Seleccione una imagen...</label>
                <input type="file" class="custom-file-input" id="userfile" name="userfile" required/>
              </div>
            </div>

            <!--Stars-->
            <label for="stars">Calificacion(estrellas): </label>
            <select class="dropdown" name="stars" id="stars" required>
                      <option class="ddopt" value="1">1</option>
                      <option class="ddopt" value="2">2</option>
                      <option class="ddopt" value="3">3</option>
                      <option class="ddopt" value="4">4</option>
                      <option class="ddopt" value="5">5</option>
            </select>
            </br></br></br>

            <div class="form-group">
              <button type="submit" class="btn btn-primary login-btn btn-block" id="submit" name="submit" value="pelicula">Publicar</button>
            </div>

          </form>
        </div>
      </article>
    </section>

    <!--Footer-->
    <?php require_once('../php_principales/footer.php'); ?>

  </body>
</html>
