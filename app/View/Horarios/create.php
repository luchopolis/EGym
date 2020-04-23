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
                    <div>Crear un nuevo horario
                        <div class="page-title-subheading">Asignación de horario a empleado
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <div class="card col-12">
            <div class="card-body">

                <div class="row">
                    <div class="col-6">
                        <form method="POST" action="<?= RUTA_URL ?>Horarios/Save">
                            <div class="form-group">
                                <label>Lista de Empleados no asignados</label>
                                <select class="form-control js-example-basic-single" name="empleadoid">
                                    <optgroup label="Empleados sin asignar">


                                        <?php
                                        foreach ($data["Empleados"] as $Empleados => $Empleado) { ?>

                                            <option value="<?= $Empleado->id ?>"><?= $Empleado->Nombre ?> <?= $Empleado->Apellido?></option>

                                            <?php
                                        }
                                        ?>
                                    </optgroup>

                                </select>
                            </div>

                            <div class="form-group">
                                <label>Dias de trabajo</label>
                                <input class="form-control" name="Dias" placeholder="Dias" required>
                            </div>

                            <div class="form-group">
                                <label>Hora de entrada</label>
                                <input class="form-control" name="HrEntrada" placeholder="Hora de entrada" required>
                            </div>

                            <div class="form-group">
                                <label>Hora de salida</label>
                                <input class="form-control" name="HrSalida" placeholder="Hora de salida" required>
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