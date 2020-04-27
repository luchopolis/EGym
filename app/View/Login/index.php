<?php

$UsuarioSesion = $this->Library("Sesiones");
$UsuarioSesion->start();
$UsuarioInfo = $UsuarioSesion->getSesiones();


if(!empty($UsuarioInfo)){
   $this->Redirect("MainMenu");
}


?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Estilos Personalizados-->
    <link rel="stylesheet" href="css/Login.css">
  </head>
  <body>
    
      <div class="container-fluid">
        <div class="row">

          <div class="col-5 col-md-6 col-xl-6 ImageLeft">
            <div class="LeftImageForm col-12">
              <h2>
                <span id="Asgard">Asgard</span>
                <span id="GYM">GYM</span>
              </h2>
              <h4>
                Panel Adminstrativo
              </h4>
            </div>
          </div>
          <div class="col-sm-7 col-md-6 col-xl-6 formContainer">
            <h2>Inicio de sesion</h2>
            <form class="col-10 col-md-8" action="Ingreso/Login/" method="POST"> <!-- Ruta desde el index  el primero es el controller el segundo el metodo-->
              <div class="input-group">
                
                  <input type="text" name="UserName" class="form-control" placeholder="Usuario">
                  <input type="password" name="PassWD" class="form-control" placeholder="Contraseña">   
              </div>

              <input type="submit" class="btn btn-dark" value="Ingresar">
              <div class="col-12">
                <a href="<?= RUTA_URL?>ForgotPassword">
                  Olvido la Contraseña?
                </a>
              </div>
    
            </form>
          </div>
        </div>
      </div>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.4.1.min.js" ></script>
    <script src="js/popper.min.js" ></script>
    <script src="js/bootstrap.min.js.min.js" ></script>
  </body>
</html>
