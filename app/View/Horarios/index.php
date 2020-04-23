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
                    <a href="<?php echo RUTA_URL; ?>Horarios/create" class="btn btn-success">Asignar nuevo horario</a>
                </div>



                <div class="card-body">
                    <table id="table_id" class="table">
                        <thead>
                        <tr>

                            <th scope="col">
                                Nombre Empleado
                            </th>
                            <th scope="col">
                                DiasTrabajo
                            </th>
                            <th scope="col">
                                Entrada
                            </th>
                            <th scope="col">
                                Salida
                            </th>

                            <th>

                            </th>
                            <th>

                            </th>



                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($data["Horarios"] as $Horarios => $Horario) {
                            ?>
                            <tr>
                                <td><?= $Horario->N ?> <?= $Horario->A?></td>
                                <td><?= $Horario->DiasTrabajo ?></td>
                                <td><?= $Horario->Entrada ?></td>
                                <td><?= $Horario->Salida ?></td>
                                <td><a class="btn pe-7s-pen btn-warning text-white" href="<?= RUTA_URL?>Horarios/edit/<?= $Horario->idEMp?>/<?= $Horario->idHorario?>">Editar</a></td>
                                <td><a class="btn btn-danger text-white" href="<?= RUTA_URL?>Horarios/edit/<?= $Horario->idEMp?>/<?= $Horario->idHorario?>">Borrar</a></td>

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
