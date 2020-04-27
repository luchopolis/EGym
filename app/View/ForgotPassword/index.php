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
    <style>
      #Error{
        display: none;
      }
      #Found{
        display: none;
      }
    </style>
  </head>
  <body>
    
      <div class="container-fluid">
        <div class="row">

          <div class="col-sm-7 col-md-6 col-xl-6 formContainer">
            <h2>Restauración de contraseña</h2>
            <div class="card border-danger">

                <form class="col-10 col-md-8"> <!-- Ruta desde el index  el primero es el controller el segundo el metodo-->
                    <div class="form-group">
                        <label>Ingrese su correo electronico    </label>
                        <input type="email" id="Email" name="Email" class="form-control" placeholder="example@example.com">
                        <label id="Error" class="text-danger">Correo no encontrado!</label>
                        <label id="Found" class="text-success">Correo encontrado, revise su bandeja de entrada!</label>
                      </div>  
                

                
        
                </form>
                <div class="form-group">
                  <input type="submit" id="Send" name="Send" class="btn btn-dark" value="Enviar correo">
                  <div class="col-12">
                      <a href="<?php RUTA_URL?>Ingreso">
                      Ya tienes una cuenta?
                      </a>
                  </div>
                </div>
                  
            </div>
           
          </div>
        </div>
      </div>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.4.1.min.js" ></script>
    <script src="js/popper.min.js" ></script>
    <script src="js/bootstrap.min.js.min.js" ></script>

    <script>
    
      

      function RecolectarEmail(){
        data = {
          correo:$('#Email').val()
        };
       
        return data;
      }

     


      function EnvioCorreo(data){
        $.ajax(
          {
            type:"POST",
            url:"ForgotPassword/ValidateEmail/",
            data:data,
            success:(info) => {
              Found();
              
              
            },
            error:(info) => {
              NoHide();
              
            }
          }
        );
      }

      function NoHide(){
        let ErrorText = document.getElementById("Error");
        ErrorText.style.display = "block";
      }

      function Found(){
        let ErrorText = document.getElementById("Found");
        ErrorText.style.display = "block";
      }

      
      $("#Send").click(function(){
        Data = RecolectarEmail();
        EnvioCorreo(Data);
      });
    
    
    </script>
  </body>
