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
                        <i class="pe-7s-medal icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>Editar grupo
                        <div class="page-title-subheading">Editar grupo y entrandor asignado
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <div class="card col-12">
            <div class="card-body">

                <div class="row">
                    <div class="col-6">
                        <form method="POST" action="<?= RUTA_URL ?>Grupo/update/<?= $data["Entrenador"]->id ?>">
                            <div class="form-group">
                                <label>Lista de entrenadores</label>
                            
                                <select class="form-control js-example-basic-single" name="entrenadorid">
                                    <optgroup label="Entrenadores">

                                    
                                        <?php
                                        foreach ($data["Entrenadores"] as $Entrenadores => $Entrenador) { ?>

                                            <option value="<?= $Entrenador->id?>" <?= ($Entrenador->id == $data["Entrenador"]->id) ? "Selected" : " " ?>><?= $Entrenador->Entrenador ?></option>
                                            
                                        <?php
                                        
                                        }
                                        
                                        ?>
                                    </optgroup>

                                </select>
                            </div>

                            <div class="form-group">
                                <label class="text-danger">Grupo asignado</label>
                                <select class="form-control" name='idGrupo'>
                                    <optgroup label="Grupos">


                                        <?php
                                        foreach ($data["GruposNo"] as $Grupos => $Grupo) { ?>

                                            <option value="<?= $Grupo->id ?>"  <?= ($Grupo->nombregrupo == $data["GrupoDeEntrenador"]->nombregrupo) ? "Selected" : " " ?>><?= $Grupo->nombregrupo ?></option>

                                        <?php
                                        }
                                        ?>
                                    </optgroup>

                                </select>
                            </div>

                            <div class="form-group">
                                <label><span class="text-success">Nuevo grupo</span></label>
                                <select class="form-control " name="Grupo">
                                    <optgroup label="Grupos">


                                        <?php
                                        foreach ($data["GruposAll"] as $Grupos => $value) { ?>

                                            <option value="<?= $value ?>"><?= $value ?></option>

                                        <?php
                                        }
                                        ?>
                                    </optgroup>

                                </select>
                            </div>

                            <div class="form-group">
                                <label>Establecer cupo</label>
                                <input type="text" class="form-control" name="cupo" placeholder="Cupo inicial" value="<?= $data["Grupo"]->Cupo?>">
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