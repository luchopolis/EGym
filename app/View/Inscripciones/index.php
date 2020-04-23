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
                    <div>Inscripciones
                        <div class="page-title-subheading">Listado de participantes 
                        </div>
                    </div>

                </div>


                
            </div>
        </div>

        <div class="row">
                    <div class="card col-12">
                        <div class="card-header">
                            
                            <a href="<?php echo RUTA_URL; ?>Inscripciones/create" class="btn btn-success">Registro inscripcion</a>
                        </div>



                        <div class="card-body">
                            <table id="table_id" class="table">
                                <thead>
                                    <tr>

                                        <th scope="col">
                                            Nombre cliente
                                        </th>
                                        <th scope="col">
                                            Grupo inscrito
                                        </th>
                                       

                                        <th>

                                        </th>
                
                                        
                                    
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data["Inscripciones"] as $Inscripciones => $Inscripcion) {
                                    ?>
                                        <tr>
                                            <td><?= $Inscripcion->Nombres ?></a></td>
                                            <td><?= $Inscripcion->nombregrupo ?></td>
                                            <td><a class="btn pe-7s-pen btn-warning text-white" href="<?= RUTA_URL?>Inscripciones/edit/<?=$Inscripcion->id?>/<?= $Inscripcion->idCliente?>/<?= $Inscripcion->idGrupo?>">Editar</a></td>
                                            

                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>

                        </div>
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
        $('#table_id').DataTable({
            pageLength: 10,
            columnDefs: [{
                orderable: false,
                className: 'select-checkbox',
                targets: 0
            }],
            select: {
                style: 'multi',
                selector: 'td:first-child'
            }
        });
    });
</script>