<?php
  require_once "./modelo_usuarios.php";
  require_once "./autorizar.php";
  checkPermission("mi_perfil");

  $tipo_de_usuario = readJSON(USER_TYPE_DATA_FILE);
?>

<!DOCTYPE html>
<html>
  <!--Head----->
  <?php require_once('../php_principales/head.php'); ?>

  <body>
    <!--Header----->
    <?php require_once('../php_principales/header.php'); ?>

    <!--Mi perfil-->
    <section>
      <article class="principal">
        <div class="titulos">
          <h1>Mi perfil</h1>
        </div>

        <div class="media border p-3">
          <img src="../resources/user_icon.jpg" alt="John Doe" class="mr-3 mt-3 rounded-circle" style="width:60px;">
          <div class="media-body">
            <?php if(!empty($_SESSION) && $_SESSION["logeado"]){ ?>
              <h3> <?php echo $_SESSION["nombre"] . " " . $_SESSION["apellidos"] ?></h3>
              <h4> <?php echo $tipo_de_usuario[$_SESSION["user_type"]]["name"] ?></h4>
            <?php } ?>
          </div>
        </div>
      </article>

    </section>

    <!--Footer-->
    <?php require_once('../php_principales/footer.php'); ?>

  </body>
</html>
