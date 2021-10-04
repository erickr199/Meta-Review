<!DOCTYPE html>
<html>
  <?php require_once('../php_principales/head.php'); ?>

  <body>
    <!--Header----->
    <?php require_once('../php_principales/header.php'); ?>

    <!--Inicio -->
    <section>
      <article class="ini">
        <div id="Inicio">
          <h1>Descubre estrenos y clasicos</h1>
          <p>¡Ingresa o crea una nueva cuenta y se parte de la mejor comunidad de reseñas de la web! Siendo parte de MetaReview además de poder ver todo el contenido podrás compartir tus comentarios sobre las reseñas y asignarles una calificación. ¡No te quedes fuera!</p>

          <a href="../php/login.php">
            <button type="button" class="btn btn-primary">
              Registrarse
            </button>
          </a>

        </div>
      </article>
    </section>


    <!-- Lo más nuevo -->
    <?php require_once('../php_principales/lo_mas_nuevo_process.php'); ?>

    <!-- Categorías -->
    <div class="titulos">
      <h1>Categorias</h1>
    </div>

    <section class="Categorias">
      <div id="categorias_tabe">
        <a href="../php/categ_peliculas.php">
          <div class="Item">
            <img src="../resources/Peliculas.png" alt=""/><br/>
            <h2>Peliculas</h2>
            <p>Descubre los mejores estrenos cinematográficos y comparte tu opinión sobre ellos.</p>
          </div>
        </a>
        <a href="../php/categ_libros.php">
          <div class="Item">
            <img src="../resources/libros.png" alt=""/><br/>
              <h2>Libros</h2>
              <p>Conoce clásicos literarios de todos  los tiempos y comparte tus ideas sobre ellos.</p>
          </div>
        </a>
        <a href="../php/categ_musica.php">
         <div class="Item">
           <img src="../resources/musica.png" alt=""/><br/>
            <h2>Musica</h2>
            <p>Descubre todas las épocas de la música y comparte tu opinión acerca de los grandes éxitos.</p>
          </div>
        </a>
    </div>
  </section>

  <!--Mas Info, Conoce meta review-->
  <section id="MasInfo">
    <div class="divp">
      <h1>Conoce Meta Review</h1>
        <p>MetaReview es un sitio de reseñas sobre tres ramas culturales a fin de dar a conocer contenido artístico y darle una valoración popular mediante reseñas, votaciones y comentarios.</p>
      </div>
      <img src="../resources/logo.png" alt="MetaReview logo">
  </section>

<!--Footer-->
<?php require_once('../php_principales/footer.php'); ?>

  </body>


</html>
