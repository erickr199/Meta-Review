<!DOCTYPE html>
<html>
  <?php require_once('../php_principales/head.php'); ?>

  <body>
    <!--Header----->
    <?php require_once('../php_principales/header.php'); ?>

    <section>
      <article class="principal">
        <div class="titulos">
          <h1>Registro de usuarios</h1>
        </div>

        <div class="login-form" style="width: 1000px">
          <form action="./control_formulario.php" method="post" enctype="application/x-www-form-urlencoded">
            <div class="form-group">
              <!-- <label for="id">Id: </label> -->
              <input type="text" class="form-control" name="id" id="id" value="" hidden/>
            </div>

            <div class="form-group">
              <label for="username">Nombre de usuario: </label>
              <input type="text" class="form-control" name="username" id="username" value="" required style="color: black;"/>
            </div>

            <div class="form-group">
              <label for="password">Contraseña: </label>
              <input type="password" class="form-control" name="password" id="password" value="" required/>
            </div>

            <div class="form-group">
              <label for="nombre">Nombre: </label>
              <input type="text" class="form-control" name="nombre" id="nombre" value="" required/>
            </div>

            <div class="form-group">
              <label for="apellidos">Apellidos: </label>
              <input type="text" class="form-control" name="apellidos" id="apellidos" value="" required/>
            </div>

            <div class="form-group">
              <label for="fecha_nacimiento">Fecha de nacimiento: </label>
              <input type="date" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento" value="" required/>
            </div>

            <div class="form-group">
              <!-- <label for="tipo_usuario">Tipo de usuario: </label> -->
              <input type="text" class="form-control" name="tipo_usuario" id="tipo_usuario" value="2" hidden/>
            </div>

            <div class="form-group">
              <button type="submit" class="btn btn-primary login-btn btn-block">Registrarse</button>
            </div>

          </form>
        </div>
      </article>
    </section>

    <!--Footer-->
    <?php require_once('../php_principales/footer.php'); ?>

  </body>
</html>
