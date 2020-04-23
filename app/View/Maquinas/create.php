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
                    <div>Registro de nueva maquina
                        <div class="page-title-subheading">Registro de nueva maquina
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card col-12">
            <div class="card-body">
                <div class="row">

                    <div class="col-12">
                        <form method="POST" action="<?php echo RUTA_URL ?>Maquinas/Save" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-6">
                                        
                                    <div class="col-12 text-center">
                                        <img id="Maquina" style="height:25em;width:20em" onclick="uploadImg();" class="img-circle" width="100%" height="100%"  src="<?php echo BASE?>images/Maquinas/silueta.jpg">
                                    </div>
                                    
                                    <div class="form-group">    
                                        <input type="file" onchange="changePreview(this);" id="MaquinaImg" name="MaquinaImg" class="form-control-file mt-2" value="Cambiar" onclick="ChangeImage();">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <input class="form-control" name="NombreMaquina" placeholder="Nombre Maquina">
                                    </div>

                                    
                         
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-success col-12" value="Registrar Maquina">
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
        document.querySelector("#MaquinaImg").click();
    }

    function changePreview(e) {
        var URL = window.URL;
        var url = URL.createObjectURL(e.files[0]);
        document.querySelector("#Maquina").src = url;

    }
</script>

<?php

require RUTA_APP . "/View/inc/footer.php";
?>