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
                        <i class="pe-7s-box1 icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>Empleados
                        <div class="page-title-subheading">Listado de los Empleadoss
                        </div>
                    </div>

                </div>


                
            </div>
        </div>

        <div class="row">
                    <div class="card col-12">
                        <div class="card-header">
                            <!-- MANDARÁ A CREAR UN USUARIO PRIMERO ANTES QUE EL CLIENTE-->
                            <a href="<?php echo RUTA_URL; ?>Empleados/Create" class="btn btn-success">Registro de nuevo Empleado</a>
                        </div>



                        <div class="card-body">
                            <table id="table_id" class="table">
                                <thead>
                                    <tr>

                                        <th scope="col">
                                            Nombre
                                        </th>
                                        <th scope="col">
                                            Apellido
                                        </th>
                                        <th scope="col">
                                            Direccion
                                        </th>
                                        <th scope="col">
                                            Telefono
                                        </th>
                                        <th>

                                        </th>
                
                                        
                                    
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data["Empleados"] as $Empleados => $Empleado) {
                                    ?>
                                        <tr>
                                            <td><a href="<?= RUTA_URL?>Empleados/Show/<?=$Empleado->id?>"><?= $Empleado->Nombre ?></a></td>
                                            <td><?= $Empleado->Apellido ?></td>
                                            <td><?= $Empleado->Direccion ?></td>
                                            <td><?= $Empleado->Telefono ?></td>
                                            <td><a class="btn pe-7s-pen btn-warning text-white" href="<?= RUTA_URL?>Empleados/Edit/<?= $Empleado->id?>">Editar</a></td>
                                            

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