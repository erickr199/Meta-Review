<?php
  require_once "./modelo_usuarios.php";
  require_once "./autorizar.php";
  checkPermission("pag_inter");
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
          <h1>Categoria de la reseña</h1>
        </div>

        <div class="catt">
          <a href="./publicar_reseñas.php">Pelicula</a>
          <a href="./publicar_reseña_libros.php">Libro</a>
          <a href="./publicar_reseña_musica.php">Música</a>
        </div>

      </article>
    </section>

    <!--Footer-->
    <?php require_once('../php_principales/footer.php'); ?>

  </body>
</html>
