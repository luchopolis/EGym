<?php
require  RUTA_APP . "/View/inc/header.php";
require RUTA_APP . "/View/inc/sidebar.php";
?>
<style>
    img {
        border-radius: 100%;
    }
    .page-title-icon{
        font-size: 4em;
    }
</style>

    <div class="app-main__outer">

        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div class="page-title-icon">
                            <i class="pe-7s-users icon-gradient bg-mean-fruit">
                            </i>
                        </div>
                        <div>Usuarios Administrativos
                            <div class="page-title-subheading">Lista de los usuarios Administrativos y empleados
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="card col-12">
                    <div class="card-header">
                        <a href="<?php echo RUTA_URL; ?>Usuarios/Create" class="btn btn-success">Crear nuevo usuario</a>
                    </div>
                    <div class="card-body">

                        <div class="row">


                            <?php
                            foreach ($data["Usuarios"] as $usuarios => $datos) {

                            ?>
                                <div class="col-md-4">
                                    <div class="mb-3 card">
                                        <div class="card-header">

                                            <div class="col-12 text-center">
                                                <img width="40px" height="40px" class="img-circle img-flui" src="<?php echo BASE ?>images/<?php echo $datos->NombreImagen ?>">
                                            </div>


                                        </div>
                                        <div class="card-body">

                                            <div class="col-12 text-center">
                                                <div class="d-flex justify-content-center">
                                                    <div class="pe-7s-user"></div>
                                                    <div class="col-12 text-center">
                                                        <h5 class="card-title"><?php echo $datos->UserName ?></h5>
                                                    </div>

                                                </div>




                                            </div>
                                            <div class="d-flex justify-content-center">
                                                <div class="pe-7s-mail-open">

                                                </div>
                                                <div class="col-12 text-center"><?php echo $datos->Email ?></div>
                                            </div>

                                            <div class="col-12 text-center"><?php echo $datos->Tipo ?></div>

                                            <div class="col-12 text-center">
                                                <div class="col-12">
                                                    <a class="text-white btn btn-warning" href="<?= RUTA_URL ?>Usuarios/Edit/<?php echo $datos->id ?>">Editar</a>
                                                    <a class="text-white btn btn-danger" data-toggle="modal" data-target="#myModal"><?php $idU = $datos->id ?>Dar de Baja</a>

                                                </div>



                                            </div>

                                        </div>

                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>





        </div>


    </div>

</div>
<!-- FIN DE app-container en Header-->

<!-- INCIO DEL MODAL ELIMINAR-->
<div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        
                        <p class="modal-title">Confirmar la accion?</p>
                        
                        
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">X</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        <div class="page-title-icon">
                            <li class="pe-7s-attention icon-gradient bg-sunny-morning"></li>
                        </div>
                        
                        <p class="text-danger">Espera!, estas a punto de eliminar al usuario, deseas continuar ?></p>
                    </div>
                    <div class="modal-footer">
                        
                            <button type="submit" name="delete" class="btn btn-primary">Confirmar</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                     
                        
                    </div>
                </div>

            </div>
        </div>
<!-- FIN DEL MODAL ELIMINAR-->


<?php

require RUTA_APP . "/View/inc/footer.php";
?>