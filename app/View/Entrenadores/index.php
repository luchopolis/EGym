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
                    <div>Entrenadores
                        <div class="page-title-subheading">Listado de los Entrenadores
                        </div>
                    </div>

                </div>


                
            </div>
        </div>

        <div class="row">
                    <div class="card col-12">
                        <div class="card-header">
                            <!-- MANDARÁ A CREAR UN USUARIO PRIMERO ANTES QUE EL CLIENTE-->
                            <a href="<?php echo RUTA_URL; ?>Entrenadores/create" class="btn btn-success">Registro de nuevo Entrenador</a>
                        </div>



                        <div class="card-body">
                            <table id="table_id" class="table">
                                <thead>
                                    <tr>

                                        <th scope="col">
                                            Nombre
                                        </th>
                                        <th scope="col">
                                            Descripcion
                                        </th>
                                        <th scope="col">
                                            Telefono
                                        </th>
                                        
                                        <th>

                                        </th>
                
                                        
                                    
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data["Entrenadores"] as $Entrenadores => $Entrenador) {
                                    ?>
                                        <tr>
                                            <td><a href="<?= RUTA_URL?>Entrenadores/Show/<?= $Entrenador->id?>"><?= $Entrenador->Entrenador ?></a></td>
                                            <td><?= $Entrenador->Descripcion ?></td>
                                            <td><?= $Entrenador->Telefono ?></td>
                                            <td><a class="btn pe-7s-pen btn-warning text-white" href="<?= RUTA_URL?>Entrenadores/Edit/<?= $Entrenador->id?>/<?= $Entrenador->idEmpleado?>">Editar</a></td>
                                            

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