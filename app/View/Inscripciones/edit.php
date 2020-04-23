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
                    <div>Inscripción nueva
                        <div class="page-title-subheading">Asignación de cliente a grupo
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <div class="card col-12">
            <div class="card-body">

                <div class="row">
                    <div class="col-6">
                        <form method="POST" action="<?= RUTA_URL ?>Inscripciones/Update/<?= $data["Inscripcionid"]->id?>">
                            <div class="form-group">
                                <label>Lista de Clientes no inscritos</label>
                                <select class="form-control js-example-basic-single" name="clienteid">
                                    <optgroup label="Clientes">

                                    
                                        <?php
                                        foreach ($data["Clientes"] as $Clientes => $Cliente) { ?>

                                            <option value="<?= $Cliente->id ?>" <?= ($Cliente->Nombres == $data["InfoCliente"]->Nombres) ? "Selected" : "" ?>><?= $Cliente->Nombres?> <?= $Cliente->Apellidos?></option>

                                        <?php
                                        }
                                        ?>
                                    </optgroup>

                                </select>
                            </div>

                         

                            <div class="form-group">
                                <label>Lista de grupos</label>
                                <select class="form-control" name="idGrupo">
                                    <optgroup label="Grupos" >


                                        <?php
                                        foreach ($data["Grupos"] as $Grupos => $Grupo) { ?>

                                            <option value="<?= $Grupo->id ?>" <?= ($Grupo->nombregrupo == $data["InfoGrupo"]->nombregrupo) ? "Selected" : "" ?>><?= $Grupo->nombregrupo ?></option>

                                        <?php
                                        }
                                        ?>
                                    </optgroup>

                                </select>
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