<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo RUTA_URL?>css/bootstrap.min.css">
    <!-- Estilos Personalizados-->
    <link rel="stylesheet" href="<?= RUTA_URL?>css/Login.css">
    
  </head>
  <body>
    
      <div class="container-fluid">
        <div class="row">

          <div class="col-sm-7 col-md-6 col-xl-6 formContainer">
            <h2>Cambio de contraseña</h2>
            <div class="card p-5">

                <form class="col-10 col-md-8" method="POST" action="<?= RUTA_URL?>ChangePass/Update/<?= $data["UsuarioID"]?>"> <!-- Ruta desde el index  el primero es el controller el segundo el metodo-->
                    <div class="form-group">
                        <label>Ingrese su nueva contraseña</label>
                        <input type="password" id="NPass" name="NPass" class="form-control" placeholder="Nueva Contraseña">
                        
                      </div>  
                    <div class="form-group">
                        <input type="submit" class="btn btn-dark" value="Cambiar">
                        <div class="col-12">
                            <a href="<?= BASE?>Ingreso">
                            Ya tienes una cuenta?
                            </a>
                        </div>
                    </div>

                </form>
                
                  
            </div>
           
          </div>
        </div>
      </div>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?php echo RUTA_URL?>js/jquery-3.4.1.min.js" ></script>
    <script src="<?php echo RUTA_URL?>js/popper.min.js" ></script>
    <script src="<?php echo RUTA_URL?>js/bootstrap.min.js.min.js" ></script>
  </body>