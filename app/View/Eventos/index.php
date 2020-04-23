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
                            <i class="pe-7s-medal icon-gradient bg-mean-fruit">
                            </i>
                        </div>
                        <div>Eventos
                            <div class="page-title-subheading">Eventos de gimnasio
                            </div>
                        </div>

                    </div>


                    
                </div>
            
        </div>
        <div class="row"> 
            <div class="card col-12">
                <div id="calendarX" class="p-2"></div>
            </div>
        </div>
        
    </div>


</div>
</div>
    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detalles evento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-12">

            <form>
                <div class="form-group">
                    <label>Evento</label>
                    <input type="input" name="title" id="title" class="form-control" placeholder="Titulo del evento">
                </div>
                <div class="form-group">
                    <label>Descripcion</label>
                    <textarea name="Descripcion" id="Descripcion" class="form-control" placeholder="Descripcion"></textarea>
                </div>
                <div class="form-group">
                    <label>Fecha inicio</label>
                    <input type="date" name="start" id="start" class="form-control">
                </div>
                <div class="form-group">
                    <label>Hora inicio</label>
                    <input type="input" name="hora1" id="hora1" class="form-control" placeholder="Hora inicio">
                </div>
                <div class="form-group">
                    <label>Fecha fin</label>
                    <input type="date" name="end" id="end" class="form-control" >
                </div>
                <div class="form-group">
                    <label>Hora fin</label>
                    <label>Formato de <span class="text-danger">24 hrs</span></label>
                    <input type="input" name="hora2" id="hora2" class="form-control" placeholder="14:00">
                </div>
            </form>

        </div>
      </div>
      <div class="modal-footer">

        <button id="btnGuardar" type="button" class="btn btn-success">Guardar</button>
        <button id="btnModificar" type="button" class="btn btn-warning text-white">Modificar</button>
        <button id="btnBorrar" type="button" class="btn btn-danger text-white">Borrar</button>
        <button id="btnCancelar" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>




<?php

require RUTA_APP . "/View/inc/footer.php";
?>

<script>


 


 /*var Evento2 =  { // this object will be "parsed" into an Event Object
 title: 'The Title', // a property!
 start: '2020-04-02', // a property!
 end: '2020-04-03' // a property! ** see important note below about 'end' **
 };*/


    
    var calendarEl = document.getElementById('calendarX');
    let idEvento;

    let calendar = new FullCalendar.Calendar(calendarEl, {
        plugins: ['dayGrid', 'interaction', 'timeGrid'],
        selectable: true,
        defaultView: 'dayGridWeek',
        height: 530,
        timeZone: 'local',
        dateClick: function (info){  NuevoEvento(info); },
        eventClick: function (info){
            console.log(info.event.end);
            EditarModel(info);
        },
        themeSystem: 'bootstrap',
        header: {
            left: '',
            center: 'title',
            right: 'today,timeGridWeek dayGridMonth timeGridDay dayGridWeek prev,next'
        },
        eventSources: [
            {
                url:"Eventos/Show",
                method:'POST'

            }
        ]

    });
    calendar.setOption('locale', 'es');
    calendar.render();
    



//Eventos Click
$("#btnGuardar").click(function(){
    NuevoEvento = Recolectar();
    calendar.addEvent(NuevoEvento);
    EnviarInformacion("Crear",NuevoEvento);
});

$("#btnModificar").click(function(){
    DatosModificar = Recolectar();

    EnviarInformacion("Editar",DatosModificar);
});
//Fin eventos Click


function NuevoEvento(info){
    let hoy = new Date();
    
    //alert(info.event.title);
    $("#start").val(info.dateStr);
    $("#hora1").val(hoy.getHours()+":"+hoy.getMinutes());

    $('#exampleModal').modal('toggle');
    
    
}

function  EditarModel(info) {
    idEvento = info.event.id;
    console.log(info.event.id);
    $("#title").val(info.event.title);
    $("#Descripcion").val(info.event.extendedProps.Description);
    $("#start").val(info.event.start);
    $("#hora1").val(info.event.start.getHours()+":"+info.event.start.getMinutes());
    $("#end").val(info.event.end);
    $("#hora2").val(info.event.end.getHours()+":"+info.event.end.getMinutes());
    $('#exampleModal').modal('toggle');

}

function Recolectar(){
    nuevoEvento = {
        title:$('#title').val(),
        Description:$('#Descripcion').val(),
        start:$('#start').val()+" "+$('#hora1').val(),
        end:$('#end').val()+" "+$('#hora2').val()
    };
    
    return nuevoEvento;
    
    
    
}

function EnviarInformacion(accion,objetoEvento){

    switch (accion) {
        case "Crear":
            ajaxAccion("Eventos/Store",objetoEvento);
            break;
        case "Editar":

            ajaxAccion("Eventos/Edit/"+idEvento,objetoEvento);

            break;
    }

}

function ajaxAccion (url,objetoEvento){
    $.ajax(
        {
            type:"POST",
            url: url,
            data:objetoEvento,
            success:(info) => {
                console.log(info);
            }

        }
    );
}






</script>