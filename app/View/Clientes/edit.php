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
                    <div>Crear cliente
                        <div class="page-title-subheading">Ingreso de nuevos datos de clientes
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <div class="card col-12">
            <div class="card-body">

                <div class="row">
                    <div class="col-6">
                        <form method="POST" action="<?= RUTA_URL?>Clientes/Update/<?= $data["Cliente"]->id?>">
                            <div class="form-group">
                                <label>Nombres del cliente</label>
                                <input type="text" name="names" class="form-control" value="<?= $data["Cliente"]->Nombres?>">
                            </div>
                            <div class="form-group">
                                <label>Apellidos del cliente</label>
                                <input type="text" name="Apes" class="form-control" value="<?= $data["Cliente"]->Apellidos?>">
                            </div>
                            <div class="form-group">
                                <label>Estatura del cliente</label>
                                <input type="text" name="Estatura" class="form-control" value="<?= $data["Cliente"]->Estatura?>">
                            </div>
                            <div class="form-group">
                                <label>Peso del cliente</label>
                                <input type="text" name="peso" class="form-control" value="<?= $data["Cliente"]->peso?> ">
                            </div>
                            <div class="form-group">
                                <label>Edad del cliente</label>
                                <input type="text" name="edad" class="form-control" value="<?= $data["Cliente"]->edad?>">
                            </div>

                            <input type="submit" class="btn btn-primary" value="Guardar registro">
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