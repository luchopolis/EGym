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
                    <div>Empleado
                        <div class="page-title-subheading">Informacion de empleado
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="card col-12">
            <div class="card-body">
                <div class="col-sm-12 col-md-4">
                    <h2><?= $data["Datos"]->Nombre?> <?= $data["Datos"]->Apellido?></h2>
                    <hr>
                </div>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Horario asignado</a>
                    </li>
                   

                </ul>

                <div class="tab-content" id="myTabContent">
                    <!-- USer info-->

                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="d-flex flex-row">
                            <div class="col-sm-12 col-md-2 mr-sm-3">
                                <label><strong>Dias de trabajo</strong></label>
                            </div>

                            <div class="col-sm-12 col-md-2 mr-sm-3">
                                <label><?= (empty($data["EmpleadoHorario"]->DiasTrabajo)) ? "No hay horario asignado" : $data["EmpleadoHorario"]->DiasTrabajo ?></label>
                            </div>
                        </div>

                        <div class="d-flex flex-row">
                            <div class="col-sm-12 col-md-2 mr-sm-3">
                                <label><strong>Hora de entrada</strong></label>
                            </div>

                            <div class="col-sm-12 col-md-2 mr-sm-3">
                                <label><?= (empty($data["EmpleadoHorario"]->Entrada)) ? "No hay horario asignado" : $data["EmpleadoHorario"]->Entrada ?></label>
                            </div>
                        </div>

                        <div class="d-flex flex-row">
                            <div class="col-sm-12 col-md-2 mr-sm-3">
                                <label><strong>Hora de salida</strong></label>
                            </div>

                            <div class="col-sm-12 col-md-2 mr-sm-3">
                                <label><?= (empty($data["EmpleadoHorario"]->Salida)) ? "No hay horario asignado" : $data["EmpleadoHorario"]->Salida ?></label>
                            </div>
                        </div>

                        
                        
                    </div>

                    <!-- END USer info-->

                 
                </div>



            </div>


        </div>


    </div>
</div>



<?php

require RUTA_APP . "/View/inc/footer.php";
?>
