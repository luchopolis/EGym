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
                        
                            
                            
                            
                            <form method="POST" action="<?php echo RUTA_URL ?>UsuariosClientes/Save/<?= $data["ID"]?>" enctype="multipart/form-data">
                                
                                <div class="position-relative form-group">
                                    <input type="text" class="form-control" name="Correo" placeholder="Correo" required>
                                </div>
                                <div class="position-relative form-group">
                                    <input type="text" class="form-control" name="Usuario" placeholder="Usuario" required>
                                </div>
                                <div class="position-relative form-group">
                                    <input type="password" class="form-control" name="PassWD" placeholder="Contraseña" required>
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

<?php

require RUTA_APP . "/View/inc/footer.php";
?>