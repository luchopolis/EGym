<?php
require  RUTA_APP . "/View/inc/header.php";
require RUTA_APP . "/View/inc/sidebar.php";
?>

<style>
    .pe-7s-add-user{
        font-size: 18px;
    }
</style>
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-box1 icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>Clientes
                        <div class="page-title-subheading">Listado de los clientes
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="card col-12">
                <div class="card-header">
                    <!-- MANDARÁ A CREAR UN USUARIO PRIMERO ANTES QUE EL CLIENTE-->
                    <a href="<?php echo RUTA_URL; ?>Clientes/Create" class="btn btn-success">Registro de nuevo cliente</a>
                </div>



                <div class="card-body">
                    <table id="table_id" class="table">
                        <thead>
                            <tr>

                                <th scope="col">
                                    Nombres
                                </th>
                                <th scope="col">
                                    Apellidos
                                </th>
                                <th scope="col">
                                    Estatura
                                </th>
                                <th scope="col">
                                    Peso
                                </th>
                                <th scope="col">
                                    Edad
                                </th>
                                <th>

                                </th>
                                <th>

                                </th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data["Clientes"] as $DataClientes => $Cliente) {
                            ?>
                                <tr>
                                    <td><a href="<?= RUTA_URL?>Clientes/Show/<?= $Cliente->id?>"><?= $Cliente->Nombres ?></a></td>
                                    <td><?= $Cliente->Apellidos ?></td>
                                    <td><?= $Cliente->Estatura ?></td>
                                    <td><?= $Cliente->peso ?></td>
                                    <td><?= $Cliente->edad ?></td>
                                    <td><a  href="<?php echo RUTA_URL?>UsuariosClientes/Create/<?= $Cliente->id ?>" class="btn btn-success text-white pe-7s-add-user p-2 col-6"></a></td>
                                    <td><a href="<?php echo RUTA_URL?>Clientes/Edit/<?= $Cliente->id ?>" class="btn btn-warning pe-7s-pen text-white mt-1 p-2 col-6">Editar</a></td>
                                    
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