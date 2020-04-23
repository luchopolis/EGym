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
                    <div>Crear un nuevo entrenador
                        <div class="page-title-subheading">Ingreso de nuevos datos de entrenador
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <div class="card col-12">
            <div class="card-body">

                <div class="row">
                    <div class="col-6">
                        <form method="POST" action="<?= RUTA_URL ?>Entrenadores/Save">
                            <div class="form-group">
                                <label>Lista de empleados</label>
                                <select class="form-control js-example-basic-single" name="empleadoid">
                                    <optgroup label="Empleados">

                                    
                                        <?php
                                        foreach ($data["Empleados"] as $Empleados => $Empleado) { ?>

                                            <option value="<?= $Empleado->id ?>"><?= $Empleado->Nombre ?></option>

                                        <?php
                                        }
                                        ?>
                                    </optgroup>

                                </select>
                            </div>

                            <div class="form-group">
                                <label>Descripcion</label>
                                <textarea name="Descripcion" class="form-control"></textarea>
                            </div>

                      

                            



                            <input type="submit" class="btn btn-primary" value="Guardar registro">
                        </form>
                    </div>
                </div>

            </div>


        </div>
    </div>

 
<?php

    require RUTA_APP . "/View/inc/footer.php";
?>

<script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>

   