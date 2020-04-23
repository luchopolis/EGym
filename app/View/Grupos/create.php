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
                    <div>Crear un nuevo grupo
                        <div class="page-title-subheading">Asignación de entrenador a un grupo
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <div class="card col-12">
            <div class="card-body">

                <div class="row">
                    <div class="col-6">
                        <form method="POST" action="<?= RUTA_URL ?>Grupo/Save">
                            <div class="form-group">
                                <label>Lista de Entrenadores</label>
                                <select class="form-control js-example-basic-single" name="empleadoid">
                                    <optgroup label="Entrenadores">

                                    
                                        <?php
                                        foreach ($data["Entrenadores"] as $Entrenadores => $Entrenador) { ?>

                                            <option value="<?= $Entrenador->id ?>"><?= $Entrenador->Entrenador ?></option>

                                        <?php
                                        }
                                        ?>
                                    </optgroup>

                                </select>
                            </div>

                         

                            <div class="form-group">
                                <label>Lista de grupos <span class="text-danger">no disponibles!</span></label>
                                <select class="form-control">
                                    <optgroup label="Grupos">


                                        <?php
                                        foreach ($data["GruposNo"] as $Grupos => $Grupo) { ?>

                                            <option value="<?= $Grupo->id ?>" disabled selected><?= $Grupo->nombregrupo ?></option>

                                        <?php
                                        }
                                        ?>
                                    </optgroup>

                                </select>
                            </div>

                            <div class="form-group">
                                <label><span class="text-success">Seleccione un grupo que no este utilizado</span></label>
                                <select class="form-control " name="Grupo">
                                    <optgroup label="Grupos">


                                        <?php
                                        foreach ($data["GruposAll"] as $Grupos) { ?>

                                            <option value="<?= $Grupos ?>"><?= $Grupos ?></option>

                                        <?php
                                        }
                                        ?>
                                    </optgroup>

                                </select>
                            </div>

                            <div class="form-group">
                                <label>Establecer cupo</label>
                                <input type="text" class="form-control" name="cupo" placeholder="Cupo inicial">
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