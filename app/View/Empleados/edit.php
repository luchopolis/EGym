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
                        <div>Empleados
                            <div class="page-title-subheading">Ingreso de nuevos datos de empleado
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="card col-12">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <form method="POST" action="<?= RUTA_URL?>Empleados/Update/<?= $data["Empleado"]->id?>">
                            
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input class="form-control" name="Name" value="<?= $data["Empleado"]->Nombre;?>" required>
                                </div>

                                <div class="form-group">
                                    <label>Apellido</label>
                                    <input class="form-control" name="Apellido" value="<?= $data["Empleado"]->Apellido;?>" required> 
                                </div>

                                <div class="form-group">
                                    <label>Dirección</label>
                                    <input class="form-control" name="Dirr" value="<?= $data["Empleado"]->Direccion;?>" required>
                                </div>

                                <div class="form-group">
                                    <label>Telefono</label>
                                    <input class="form-control" name="tel" value="<?= $data["Empleado"]->Telefono;?>" required> 
                                </div>

                                <input type="submit" value="Actualizar Registro" class="btn btn-primary">
                            
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
