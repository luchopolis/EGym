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
                        <i class="pe-7s-box1 icon-gradient bg-mean-fruit    ">
                        </i>
                    </div>
                    <div>Información del producto
                        <div class="page-title-subheading">Detalles del producto
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="col-12">

            <div class="row">
                <div class="col-6 p-2">

                    <div class="col-12 text-center">
                        <img id="Product" style="height:25em;width:20em" onclick="uploadImg();" class="img-circle" width="100%" height="100%" src="<?php echo BASE ?>images/Suplementos/silueta.png">
                    </div>

                </div>
                <div class="card col-6 p-2">
                    <div class="text-center">
                        <h4> NOMBRE PRUEBA</h4>
                    </div>
                    <hr> 

                    <div class="row">
                        <div class="col-6">
                            <p>Precio:$50</p>    
                        </div>
                        <div class="col-6">
                            <p>STOCK:$50</p>    
                        </div>
                    </div>
                    <div class="col-12">
                        <p>
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsa commodi possimus omnis, numquam quis repudiandae natus doloremque perferendis quasi quisquam quas laborum sit quae libero quos eligendi modi aspernatur illo?
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>



</div>
</div>



<?php

require RUTA_APP . "/View/inc/footer.php";
?>