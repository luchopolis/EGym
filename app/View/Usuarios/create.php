<?php

require  RUTA_APP . "/View/inc/header.php";
require RUTA_APP . "/View/inc/sidebar.php";


?>

    <div class="app-main__outer">
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div class="page-title-icon">
                            <i class="pe-7s-users icon-gradient bg-mean-fruit">
                            </i>
                        </div>
                        <div>Crear usuario
                            <div class="page-title-subheading">Crear usuario en base al rol necesitado
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-6 align-self-center">
                    <div class="main-card mb-3 card">
                        
                            
                        <div class="card-body">
                        
                            
                            
                            
                            <form method="POST" action="<?php echo RUTA_URL ?>Usuarios/Save" enctype="multipart/form-data">
                                <div class="form-group">
                                    <img id="UserImage" onclick="uploadImg();" class="img-circle" height="100" src="<?php echo BASE?>images/default.png">
                                    <input type="file" onchange="changePreview(this);" id="imgAvatar" name="imgAvatar" class="btn btn-success" value="Cambiar" onclick="ChangeImage();">
                                </div>
                                <div class="position-relative form-group">
                                    <input type="text" class="form-control" name="Correo" placeholder="Correo" required>
                                </div>
                                <div class="position-relative form-group">
                                    <input type="text" class="form-control" name="Usuario" placeholder="Usuario" required>
                                </div>
                                <div class="position-relative form-group">
                                    <input type="password" class="form-control" name="PassWD" placeholder="Contraseña" required>
                                </div>

                                <div class="position-relative form-group">
                                    <select name="Tipo" class="form-control">
                                        <?php

                                        foreach ($data["Tipos"] as $Tipo) {

                                        ?>
                                            <option>
                                                <?php echo $Tipo->TipoEmpleado ?>
                                            </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>


                                <input type="submit" class="active btn btn-focus" value="Registrar usuario">
                            </form>

                            

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <script type="text/javascript">
        function uploadImg(){
            document.querySelector("#imgAvatar").click();
        }
        function changePreview(e){
            var URL = window.URL;
            var url = URL.createObjectURL(e.files[0]);
            document.querySelector("#UserImage").src = url;
            
        }
        </script>


    <?php

    require RUTA_APP . "/View/inc/footer.php";
    ?>