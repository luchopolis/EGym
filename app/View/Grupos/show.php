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
                    <div>Clientes atendidos
                        <div class="page-title-subheading">Lista de clientes que atiende
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="card col-12">
            <div class="card-body">
                <div class="col-sm-12 col-md-4">
                    <h2>Grupo: <?= $data["Grupo"] ?></h2>
                    <hr>
                </div>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Clientes</a>
                    </li>


                </ul>

                <div class="tab-content" id="myTabContent">
                    <!-- Clientes info-->

                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                        <div class="row">
                            <div class="card col-12">
                                



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
                                                    Estatura(mts)
                                                </th>
                                                <th scope="col">
                                                    Peso(lb)
                                                </th>




                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($data["Participantes"] as $Participantes => $Participante) {
                                            ?>
                                                <tr>
                                                    <td><a href="<?= RUTA_URL ?>Clientes/Show/<?= $Participante->id ?>"><?= $Participante->Nombres ?></a></td>
                                                    <td><?= $Participante->Apellidos ?></td>
                                                    <td><?= $Participante->Estatura?></td>
                                                    <td><?= $Participante->peso?></td>
                                                    


                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>


                    </div>
                    <!-- fin Clientes info-->


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