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

                    <div class="row">
                        <?php   
                        
                            foreach($data["productos"] as $productos => $producto){
                        
                        ?>
                            <div class="col-md-4">
                                <div class="col-mb-4 card justify-align-center">

                                    <div class="col-mb-6 text-center" style="height: 15rem;">
                                        <img class="card-img-top" style="height: 15rem;width:15em;" src="<?php echo BASE ?>images/Suplementos/<?= $producto->ImageProduct?>" alt="Card image cap">
                                    </div>


                                </div>
                                <div class="card-body">
                                    <h5><?= $producto->nombre_p?></h5>

                                    <div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h3>$<?= $producto->Precio?></h3>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <a class="btn btn-success text-white pe-7s-light p-2 col-12"> Informacion</a>
                                            <a class="btn btn-warning pe-7s-pen text-white mt-1 p-2 col-12"> Editar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php } ?>

                        

                     
                    </div>
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