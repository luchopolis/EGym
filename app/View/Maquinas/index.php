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
                        <i class="pe-7s-gym icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>Equipo de entrenamiento
                        <div class="page-title-subheading">Equipo de entrenamiento
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="card col-12">
                <div class="card-header">
                    <a href="<?php echo RUTA_URL; ?>Maquinas/Create" class="btn btn-success">Registro de nuevo equipo</a>
                </div>
                <div class="card-body">

                    

                        <table id="table_id" class="table">
                            <thead>
                                <tr>
                                    <th>

                                    </th>
                                    <th scope="col">
                                        Nombre de maquina
                                    </th>
                                    <th>

                                    </th>
                                    <th>

                                    </th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php

                                foreach ($data["Maquinas"] as $Maquinas => $Maquina) {
                                ?>
                                    <tr>
                                        <td><img class='' style='height: 8rem;width:6em;' src="<?php echo BASE ?>images/Maquinas/<?= $Maquina->Imagen ?>"></td>
                                        <td><?= $Maquina->NombreMaquina ?></td>
                                        
                                        <td><a  class="btn btn-danger text-white  mt-1 p-2  p-2 col-12"> Delete</a></td>
                                        <td><a href="<?php echo RUTA_URL?>Maquinas/Edit/<?= $Maquina->id ?>" class="btn btn-warning pe-7s-pen text-white mt-1 p-2 col-12"> Editar</a></td>
                                    
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

<?php

require RUTA_APP . "/View/inc/footer.php";
?>