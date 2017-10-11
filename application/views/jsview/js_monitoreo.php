<script>
    $(document).ready(function() {
        $(function() {
            $("ul li").each(function(){
                if($(this).attr("id") == 'monitor')
                $(this).addClass("urlActual");
             })
        });
        Eyes();
    });
    function Eyes(){
        var sac=1;
        firebase.database().ref("USUARIOS").once('value', function(snapshot) {
            snapshot.forEach(function(childSnapshot) {
                var childKey = childSnapshot.key;
                var childData = childSnapshot.val();
                switch(childData.EnLinea)
                {
                    case 2:
                        color = "red";
                        estado="RETOMAR";
                        EsPausa=1;
                        break;
                    case 1:
                        color = "green";
                        estado="PAUSAR";
                        EsPausa=2;
                        break;
                    case 0:
                        color = "grey";
                        estado="-";
                        EsPausa=0;
                        EsPausa=0;
                        break;
                }

                if (childData.EnLinea===0) {
                    btn = "";
                    tTrabajo ="";
                    tCamp ="";
                }else{
                    tTrabajo =childData.ttTrabajo
                    tCamp =childData.Camp
                    btn = "<a class='waves-effect waves-light btn' onclick='updateEyes("+'"'+childKey+'"'+','+EsPausa+")'>"+estado+"</a>";
                }


                $("#monitoreo").append('' +
                    '<div class="col s12 m3">'+
                    '<div class="card hoverable '+color+'">'+
                    '<div class="card-content white-text">' +
                    '<span class="card-title">AGENTE: '+childKey+'</span>'+
                    '<h1 class="center">'+sac+'</h1>'+
                    '<h5 class="center">Nº 0051</h5>'+
                    '<h5 class="center">'+tCamp+'</h5>'+
                    '<h4 class="center">'+tTrabajo+'</h4>'+
                    '</div>'+
                    '<div class="card-action">'+btn+'<div>'+
                    '</div>'+
                    '</div>');
                sac++;

            });
        });
    }
    function updateEyes(ID,Estado){

        swal({
            title: '¿Desea pausar a este Agente?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si',
            cancelButtonText: 'No'
        }).then(function () {
            firebase.database().ref("USUARIOS").child(ID).update({EnLinea : Estado});
            window.location.href = "Monitoreo";
        })

    }

       /******************CONFIGURAR DATEPICKER*******************/
    $('.datepicker').pickadate({
        labelMonthNext: 'Mes siguiente',
        labelMonthPrev: 'Mes anterior',
        labelMonthSelect: 'Selecciona un mes',
        labelYearSelect: 'Selecciona un año',
        monthsFull: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        monthsShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
        weekdaysFull: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
        weekdaysShort: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],
        weekdaysLetter: ['D', 'L', 'M', 'X', 'J', 'V', 'S'],
        today: 'Hoy',
        clear: 'Limpiar',
        close: 'Cerrar',
        format: 'yyyy-mm-dd',
        closeOnSelect: false
            //min: new Date()
    });

    $("#tblLog").DataTable({
            "scrollCollapse": true,
            "info":    false,
            "lengthMenu": [[5,10,20,100,-1], [5,10,20,100,"Todo"]],
            "language": {
                "zeroRecords": "NO HAY RESULTADOS",
                "paginate": {
                    "first":      "Primera",
                    "last":       "Última ",
                    "next":       "Siguiente",
                    "previous":   "Anterior"
                },
                "lengthMenu": "MOSTRAR _MENU_",
                "emptyTable": "NO HAY DATOS DISPONIBLES",
                "search":     "BUSCAR"
            }
        });

     function limpiarTabla (idTabla) {
        idTabla = $(idTabla).DataTable();
        idTabla.destroy();
        idTabla.clear();
        idTabla.draw();
    } 

    function Filtrar(){
        limpiarTabla(tblLog);
        var f1 = $("#FechaInicio").val();
        var f2 = $("#FechaFin").val();
        $("#carga").show();
        $("#tblLog").DataTable({
            "ajax":{
                'type': 'POST',
                'url': 'ajaxLog',
                'data': {
                   f1: f1,
                   f2: f2
                },
            },
            Responsive:true,
            async:'false',
            "info":    false,
                "bPaginate": true,
                "paging": true,
                "pagingType": "full_numbers",
                "lengthMenu": [[5,10,20,100,-1], [5,10,20,100,"Todo"]],
                "language": {
                    "emptyTable": "No hay datos disponibles en la tabla",
                    "lengthMenu": '_MENU_ ',
                    "search": '<i class=" material-icons">search</i>',
                    "loadingRecords": "",
                    "paginate": {
                        "first": "Primera",
                        "last": "Última ",
                        "next":       "Siguiente",
                        "previous":   "Anterior"
                    }
                },
                columns:[
                    {"data":"session_id"},
                    {"data":"UserName"},
                    {"data":"Nombre"},
                    {"data":"FechaInicio"},
                    {"data":"FechaFinal"},
                    {"data":"Tiempo_Total"},
                    {"data":"Tipo"},
                    {"data":"Enlace"}
                ],
                "fnInitComplete": function () {
                    $('#tblLog').on( 'init.dt', function () {
                        $('#carga').hide();                     
                    }).DataTable();
                }
        });
    };

function CerrarSesion(elem,fechai){
    var id = $(elem).attr('id');
    var fechainicio = $("#fechainicio").val(fechai);
    var fecha = new Date();
    var fechafin = moment(fecha).format("YYYY-MM-DD HH:mm:ss");
    swal({
    title: 'Desea cerrar la sesión de este usuario?',
    html:"<input type='hidden' id ='id_session' name='id' value='"+elem+"'>"+
    "<input name='fecha' id='fechainicio' type='hidden' value='"+fechai+"'>"+
     "<input name='fecha2' id='fechafin' type='hidden' value='"+fechafin+"'>",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    cancelButtonText:"Cancelar",
    confirmButtonText: 'Si, Cerrar la sesión!'
    }).then(function(){
      var data = {
        id: $("#id_session").val(),
        fecha: $("#fechainicio").val(),
        fecha2: $("#fechafin").val(),
      };
        $.ajax({
            url:"forzarCierre",
            type:"POST",
            async:true,
            data:data,
            success:function(){
              if(data)
              {
                  swal({
                    type:"success",
                    title:"sesion cerrada",
                    confirmButtonText:"cerrar"
                }).then(function(){
                    Filtrar();
                });
              }
            }
        });
    });
    
}

</script>