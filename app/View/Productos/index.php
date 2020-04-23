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
                    <div>Productos en stock
                        <div class="page-title-subheading">Informacion de disponibilidad de productos
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="card col-12">
                <div class="card-header">
                    <a href="<?php echo RUTA_URL; ?>Productos/Create" class="btn btn-success">Registro de nuevo producto</a>
                </div>
                <div class="card-body">

                    

                        <table id="table_id" class="table">
                            <thead>
                                <tr>
                                    <th>

                                    </th>
                                    <th scope="col">
                                        Nombre Producto
                                    </th>
                                    <th scope="col">
                                        Stock
                                    </th>
                                    <th scope="col">
                                        Precio
                                    </th>
                                    <th scope="col">
                                        Descripcion
                                    </th>
                                    
                                    <th>

                                    </th>
                                    <th>

                                    </th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php

                                foreach ($data["productos"] as $productos => $producto) {
                                ?>
                                    <tr>
                                        <td><img class='' style='height: 8rem;width:6em;' src="<?php echo BASE ?>images/Suplementos/<?= $producto->ImageProduct ?>"></td>
                                        <td><?= $producto->nombre_p ?></td>
                                        <td><?= $producto->Stock ?></td>
                                        <td>$<?= $producto->Precio ?></td>
                                        <td><?= $producto->Descripcion ?></td>
                                        <td><a  class="btn btn-danger text-white  mt-1 p-2  p-2 col-12"> Delete</a></td>
                                        <td><a href="<?php echo RUTA_URL?>Productos/Edit/<?= $producto->id ?>" class="btn btn-warning pe-7s-pen text-white mt-1 p-2 col-12"> Editar</a></td>
                                    
                                    </tr>
                                <?php

                                }
                                
                                ?>

                                
                            </tbody>
                        </table>


                    
                </div>
            </div>
        </div>





    </div>


</div>

</div>
<!-- FIN DE app-container en Header-->




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
