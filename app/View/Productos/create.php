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
                    <div>Registro de producto
                        <div class="page-title-subheading">Registro de nuevo producto
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card col-12">
            <div class="card-body">
                <div class="row">

                    <div class="col-12">
                        <form method="POST" action="<?php echo RUTA_URL ?>Productos/Save" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-6">
                                        
                                    <div class="col-12 text-center">
                                        <img id="Product" style="height:25em;width:20em" onclick="uploadImg();" class="img-circle" width="100%" height="100%"  src="<?php echo BASE?>images/Suplementos/silueta.png">
                                    </div>
                                    
                                    <div class="form-group">    
                                        <input type="file" onchange="changePreview(this);" id="ProductImg" name="ProductImg" class="form-control-file mt-2" value="Cambiar" onclick="ChangeImage();">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <input class="form-control" name="Producto" placeholder="Nombre producto">
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-6">
                                            <input class="form-control" name="Precio" placeholder="Precio $">
                                        </div>
                                        <div class="form-group col-6">
                                            <input class="form-control" name="Stock" placeholder="Cantidad inicial">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" name="ImageProduct" placeholder="Ingresa la descripcion"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <input type="submit" class="btn btn-success col-12" value="Registrar producto">
                                    </div>
                                </div>

                            </div>


                        </form>

                    </div>
                </div>
            </div>


        </div>




    </div>
</div>

</div>

<script type="text/javascript">
    function uploadImg() {
        document.querySelector("#ProductImg").click();
    }

    function changePreview(e) {
        var URL = window.URL;
        var url = URL.createObjectURL(e.files[0]);
        document.querySelector("#Product").src = url;

    }
</script>

<?php

require RUTA_APP . "/View/inc/footer.php";
?>