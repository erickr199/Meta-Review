<?php
  //require_once "./modelo_usuarios.php";
  @session_start();
  //checkPermission("header");
  //var_dump($_SESSION);
?>

<header>
    <!--Cover-->
    <div class="cover">
      <!--Logo-->
      <img src="../resources/logo.png" alt="logo" width="500" height="500">
    </div>
  <!-- Barra navegación -->
  <nav class="navbar navbar-expand-sm bg-secondary">
    <!-- User Info -->
    <ul class="navbar-nav mr-auto" style="position: absolute; top: 4%; ">
    <!-- More -->
      <li class="nav-item dropdown mr-auto">
        <a class="nav-link text-white ml-auto" href="#" id="navbardrop" data-toggle="dropdown">
          <img src="../resources/more.png" alt="MetaReview logo" width="20" height="20">
        </a>

          <div class="dropdown-menu dropdown-menu-left">
            <!-- Profile Card -->
            <div  style="width:150px">
              <?php if(!empty($_SESSION) && $_SESSION["logeado"]){ ?>
              <img class="card-img-top" src="../resources/user_icon.jpg" alt="Card image"/>
               <div class="card-body ">
                <h4 class="card-title"><?php echo $_SESSION["username"]?></h4>
               </div>
            </div>
            <a class="dropdown-item" href="../php/mi_perfil.php">Mi Perfil</a>
            <a class="dropdown-item" href="../php/logout.php">Log Out</a>
          <?php } else{ ?>
            <a class="dropdown-item" href="../php/login.php">Iniciar Sesión</a>
          <?php } ?>
          </div>

      </li>
    </ul>

    <ul class="navbar-nav ml-auto" >
      <!-- Botón para administradores (Añadir reseña) -->
      <?php if(!empty($_SESSION) && $_SESSION["logeado"]){ ?>
        <?php if($_SESSION["user_type"]==="1"){ ?>
          <a href="../php/pag_intermedia_reseñas.php">
            <button class="btn btn-primary" type="submit">Añadir Nueva Reseña</button>
          </a>
        <?php } ?>
      <?php } ?>

      <!-- Link -->
      <li class="nav-item">
        <a class="nav-link text-white" href="../php/index.php">Inicio</a>
      </li>
      <!-- Dropdown -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-white" href="#" id="navbardrop" data-toggle="dropdown">
          Categorías
        </a>
        <div class="dropdown-menu ">
          <a class="dropdown-item" href="../php/categ_musica.php">Música</a>
          <a class="dropdown-item" href="../php/categ_peliculas.php">Películas</a>
          <a class="dropdown-item" href="../php/categ_libros.php">Libros</a>
        </div>
      </li>
      <!-- Link -->
      <li class="nav-item">
        <a class="nav-link text-white" href="../php/top_semana.php" target="_self">Top de la semana</a>
      </li>

    </ul>
    <!-- Search Form -->
    <form class="form-inline"  action="../php_principales/search_process.php" method="GET">
      <input class="form-control mr-sm-2" type="text" placeholder="Buscar..." id="search" name="search">
      <button class="btn btn-primary" type="submit">Buscar</button>
    </form>
  </nav>
</header>
