<?php
  session_start();
?>

<!DOCTYPE html>
<html>
  <!--Head----->
  <?php require_once('../php_principales/head.php'); ?>

  <body>
    <!--Header----->
    <?php require_once('../php_principales/header.php'); ?>

    <section>
      <article class="principal">

        <div class="titulos">
          <h1>Log In/ Registro/ Crear Cuenta</h1>
        </div>

        <div class="login-form">
          <?php if(isset($_GET["error"])){ ?>
              <h3 style="color: red;">El usuario o contraseña son incorrectos.</h3>
          <?php } ?>
          <form action="./procesologin.php" method="post" enctype="application/x-www-form-urlencoded">
                <h2 class="text-center">Sign in</h2>
                <div class="form-group">
                  <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-user"></i></span>
                      <input type="text" class="form-control" name="username" id="username" value="" placeholder="Username" required style="color: black;">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                      <input type="password" class="form-control" name="password" id="password" value="" placeholder="Password" required>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary login-btn btn-block">Sign in</button>
                </div>
                <!-- <div class="clearfix">
                    <label class="pull-left checkbox-inline"><input type="checkbox"> Remember me</label>
                    <a href="#" class="pull-right">Forgot Password?</a>
                </div>
                <div class="or-seperator">
                  <i>or</i>
                </div>
                <p class="text-center">Login with your social media account</p>
                <div class="text-center social-btn">
                    <a href="#" class="btn btn-primary"><i class="fa fa-facebook"></i>&nbsp; Facebook</a>
                    <a href="#" class="btn btn-info"><i class="fa fa-twitter"></i>&nbsp; Twitter</a>
              <a href="#" class="btn btn-danger"><i class="fa fa-google"></i>&nbsp; Google</a>
                </div> -->
                <br/>
                <p class="text-center">Don't have an account?
                  <a href="./registro.php">Sign up here!</a></p>
            </form>
        </div>
      </article>
    </section>
    <!--Login
    <section>
      <article class="principal">

        <div class="titulos">
          <h1>Log In/ Registro/ Crear Cuenta</h1>
        </div>

        <div class="divform">
          <form action="/action_page.php">

            <label for="email">Email:</label>
            <input type="email" class="inputform" id="email" placeholder="Enter email" name="email">
            <br/><br/>

            <label for="pwd">Password:</label>
            <input type="password" class="inputform" id="pwd" placeholder="Enter password" name="pswd">

            <label class="form-check-label">
              <input  type="checkbox" name="remember"> Remember me
            </label>
            <br/><br/>

            <button type="submit" class="btn btn-primary btn-lg">
              Submit
            </button>
          </form>
        </div>

        <div class="col-sm-4">
          <div>
            <button class="button">
              Log In with Facebook
            </button>
          </div>
          <div>
          <button class="button">
            Log In with Google
          </button>
          </div>
        </div>

      </article>
    </section>
    -->
        <!--
        <div class="row">
          <div class="col-sm-8">
            <form action="/action_page.php">
                <div class="form-group">
                  <label for="email">Email:</label>
                  <input type="email" class="form-control mr-sm-4" id="email" placeholder="Enter email" name="email">
                </div>
                <div class="form-group">
                  <label for="pwd">Password:</label>
                  <input type="password" class="form-control mr-sm-4" id="pwd" placeholder="Enter password" name="pswd">
                </div>
                <div class="form-group form-check">
                  <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" name="remember"> Remember me
                  </label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
              <br>
            </div>
            <div class="col-sm-4">
              <div>
                <button class="button">
                  Log In with Facebook
                </button>
              </div>
              <div>
              <button class="button">
                Log In with Google
              </button>
              </div>
            </div>
          </div>
        </article>
      </section>
      -->

    <!--Footer-->
  <?php require_once('../php_principales/footer.php'); ?>

  </body>
</html>
