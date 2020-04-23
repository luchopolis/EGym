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
                        <i class="pe-7s-users icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>Cliente
                        <div class="page-title-subheading">Informacion de clientes
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="card col-12">
            <div class="card-body">
                <div class="col-sm-12 col-md-4">
                    <h2><?= $data["Datos"]->Nombres ?></h2>
                    <hr>
                </div>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Info</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#Credenciales" role="tab" aria-controls="profile" aria-selected="false">Credenciales</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#Credenciales" role="tab" aria-controls="profile" aria-selected="false">IMC(Calculo)</a>
                    </li>

                </ul>

                <div class="tab-content" id="myTabContent">
                    <!-- USer info-->

                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="d-flex flex-row">
                            <div class="col-sm-12 col-md-2 mr-sm-3">
                                <label><strong>Apellidos</strong></label>
                            </div>

                            <div class="col-sm-12 col-md-2 mr-sm-3">
                                <label><?= $data["Datos"]->Apellidos ?></label>
                            </div>
                        </div>

                        <div class="d-flex flex-row">
                            <div class="col-sm-12 col-md-2 mr-sm-3">
                                <label><strong>Estatura(mts)</strong></label>
                            </div>

                            <div class="col-sm-12 col-md-2 mr-sm-3">
                                <label><?= $data["Datos"]->Estatura ?></label>
                            </div>
                        </div>
                        <div class="d-flex flex-row">
                            <div class="col-sm-12 col-md-2 mr-sm-3">
                                <label><strong>Peso(LB)</strong></label>
                            </div>

                            <div class="col-sm-12 col-md-2 mr-sm-3">
                                <label><?= $data["Datos"]->peso ?></label>
                            </div>
                        </div>
                        <div class="d-flex flex-row">
                            <div class="col-sm-12 col-md-2 mr-sm-3">
                                <label><strong>Edad</strong></label>
                            </div>

                            <div class="col-sm-12 col-md-2 mr-sm-3">
                                <label><?= $data["Datos"]->edad ?></label>
                            </div>
                        </div>
                    </div>

                    <!-- END USer info-->

                    <div class="tab-pane fade" id="Credenciales" role="tabpanel" aria-labelledby="profile-tab">
                        <form method="POST" action="<?php echo RUTA_URL?>UsuariosClientes/Update/<?= $data["Datos"]->id?>">   
                            <div class="d-flex flex-row">
                                <div class="form-group">
                                    <label>Nombre de usuario</label>
                                    <input name="UserName" type="text" class="form-control" value="<?php
                                                                                        if (empty($data["Credenciales"]->UserName)) {
                                                                                            echo "";
                                                                                        } else {
                                                                                            echo $data["Credenciales"]->UserName;
                                                                                        }
                                                                                        ?>">
                                </div>
                            </div>

                            <div class="d-flex flex-row">
                                <div class="form-group">
                                    <label>
                                        Email
                                    </label>

                                    <input name="Email" type="text" class="form-control" value="<?php
                                                                                    if (empty($data["Credenciales"]->Email)) {
                                                                                        echo "";
                                                                                    } else {
                                                                                        echo $data["Credenciales"]->Email;
                                                                                    }
                                                                                    ?>">
                                </div>
                            </div>
                            <div class="d-flex flex-row">
                                <div class="form-group">
                                    <label>
                                        Contraseña
                                    </label>
                                    <input name="PassU" type="password" class="form-control" value="<?php
                                                                                    if (empty($data["Credenciales"]->PassWord)) {
                                                                                        echo "";
                                                                                    } else {
                                                                                        echo $data["Credenciales"]->PassWord;
                                                                                    }
                                                                                    ?>">
                                </div>
                            </div>
                            <input type="submit" class="btn btn-primary" value="Cambiar Datos" >

                        </form>
                    </div>
                </div>



            </div>


        </div>


    </div>
</div>







<?php

require RUTA_APP . "/View/inc/footer.php";
?>