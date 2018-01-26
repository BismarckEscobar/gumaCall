<script>
    $("#mnCamp").addClass("urlActual");

     var pathname = window.location.pathname;
     var numcamp;
     var camp;
     if(pathname.match(/detalles.*/)){
        console.log($("#span1").text());
         console.log($("#span2").text());
     }else if(pathname.match(/cCliente.*/)){
        console.log($("#spCamp1").text());  
        console.log($("#spCamp2").text());  
     }
     
    //$("#outCall").openModal();
    $(document).ready(function() {
        $("#tblArtSeleccionados").DataTable({
            "scrollCollapse": true,
            "bPaginate": false,
            "ordering": false,              
            "info":    false,            
            "lengthMenu": [[20,30,50,100,-1], [20,30,50,100,"Todo"]],
            "language": {
                "zeroRecords": "NO HAY RESULTADOS",
                "paginate": {
                    "first":      "Primera",
                    "last":       "Última ",
                    "next":       "Siguiente",
                    "previous":   "Anterior"                    
                },
                "lengthMenu": "MOSTRAR _MENU_",
                "emptyTable": "NO HAY ARTICULOS SELECCIONADOS",
                "search":     "BUSCAR"
            }
        });

        var control;
        $("#USN,#USI").hide();
        var frm_Kronos =$("#Kronos");
        localStorage.setItem("uNombre", $("#USI").text());
        localStorage.setItem("uId", $("#USN").text());
        

        if (localStorage.getItem("EnLinea")=== "true"){
            firebase.database().ref("USUARIOS").child(localStorage.getItem("uNombre")).update({
                EnLinea : 1
            });
        }

        /*INICIO DE CRONOMETRO DE LLAMADA*/
        var Kronos_Run = null;
        $("#btn-comenzar").click(function() {
            var numTelefono = $("#numTelefono").text();
            var tiempo = {hora: 0,minuto: 0,segundo: 0,centesimas:0};
            if ( $(this).text() == 'INICIAR' ){
                $("#btn-comenzar").css("background", "#d32f2f");
                $("#crono1").show();
                $(this).text('FINALIZAR');
                    Kronos_Run = setInterval(function(){
                    tiempo.centesimas++;
                     if(tiempo.centesimas >= 100){
                        tiempo.centesimas = 0;
                        tiempo.segundo++;
                    }
                    if(tiempo.segundo >= 60){
                        tiempo.segundo = 0;
                        tiempo.minuto++;
                    }

                    if(tiempo.minuto >= 60){
                        tiempo.minuto = 0;
                        tiempo.hora++;
                    }
                    Hrs = tiempo.hora < 10 ? '0' + tiempo.hora : tiempo.hora;
                    Min = tiempo.minuto < 10 ? '0' + tiempo.minuto : tiempo.minuto;
                    Seg = tiempo.segundo < 10 ? '0' + tiempo.segundo : tiempo.segundo;
                    Cen = tiempo.centesimas < 10 ? '0' + tiempo.centesimas : tiempo.centesimas

                   frm_Kronos.text(Hrs+":"+Min+":"+Seg+":"+Cen);

             },10);
            }else{
                $(this).css("background", "#1E824C");
                $("#crono1").hide();               
                $("#lblDuracion").text(frm_Kronos.text());
                $(this).text('INICIAR');
                clearInterval(Kronos_Run);
                $("#frm_Numero").val(numTelefono);
                $("#title-num-tel").text(numTelefono);
                
                llenandoCmbArticulos($("#spCamp1").text());
                
                $('#outCall').openModal({
                    dismissible:false
                });
            }
        });

        $("#aComment").click(function () {
            if ($("#addComment").attr('style')=='display: none;'){
                $("#addComment").show('slow');
            }else{
                $("#addComment").hide('slow');
            }
        });

        /*FIN DE CRONOMETRO DE LLAMADA*/
        /*INICIO DE GUARDADO DE LLAMADA*/
        $("#id_Guardar_llamada").click(function() {
            var tabla = $("#tblArtSeleccionados").DataTable();
            var artSeleccionados = new Array();
            var pos = 0;

            var Cli   =  $("#clienteLlamado").html();
            var cmp   =  $("#spCamp1").html();
            var Num   =  $("#frm_Numero").val();
            var TPF   =  $("#frm_TPF").val();
            var Monto =  $("#frm_Monto").val();
            var Comnt =  $("#frm_comentario").val();
            var unidad = '0';
            var ext = $("#fmr_ext").val();

            Monto == "" ? Monto="0" : console.log(":+1:");

            if(TPF == null || Monto=='' || Num=='' || unidad==''){
                swal('Oops...','Hay Informacion sin completar!','error')
            }else{

                tabla.rows().eq(0).each(function(index) {
                    var row = tabla.row(index);
                    var data = row.data();

                    artSeleccionados[pos] = data[0];
                    pos++;
                });

                var Frm_Datos = {
                    num:Num,
                    Cliente:Cli,
                    Camp:cmp,
                    TPF: TPF,
                    Monto:  Monto,
                    Coment: Comnt,
                    Articulos: artSeleccionados,
                    Unidad : unidad,
                    EXT: ext,
                    TimeInCall:frm_Kronos.text()
                };

                $.ajax({
                    url: "Guardar_llamada",
                    type: "post",
                    async:true,
                    data: Frm_Datos,
                    success:
                        function(WTF){
                            if(WTF > 0){
                                swal({
                                    title: 'Informacion Guardada',
                                    timer: 3000,
                                    showConfirmButton:false,
                                    html:'<p>Cargando Datos</p>'+'<br>'+'<div class="preloader-wrapper active">'+
                                            '<div class="spinner-layer spinner-blue-only">'+
                                            '<div class="circle-clipper left">'+
                                                '<div class="circle"></div>'+
                                            '</div><div class="gap-patch">'+
                                                '<div class="circle"></div>'+
                                            '</div><div class="circle-clipper right">'+
                                                '<div class="circle"></div>'+
                                            '</div>'+
                                            '</div>'+
                                        '</div>'
                                }).then(
                                    function () {},
                                    function (dismiss) {
                                        window.location.href = "detalles?C="+cmp;
                                    }
                                )
                            }else{
                                swal({
                                    title: 'Ooopp!!',
                                    text: "Algo salio mal, Contacte al Administrado.",
                                    type: 'warning',
                                    showCancelButton: false
                                });
                            }
                        }
                });
            }
        });
        /*FIN DE CRONOMETRO DE LLAMADA*/


        $('#tblcampanias,#tbl_camp_cliente').DataTable({
            initComplete: function () {
                this.api().columns().every( function () {                      
                    var column = this;
                    var select = $('<select id="column'+column[0]+'c"><option value="">TODOS</option></select>')
                        .appendTo( $('#tbl_camp_cliente2 .dataTables_wrapper .dataTables_filter' ))

                        .on( 'change', function () {
                            var val = $.fn.dataTable.util.escapeRegex(
                                $(this).val()                            
                            );                       
                            column
                                .search( val ? '^'+val+'$' : '', true, false )
                                .draw();
                            } )                
                        column.data().unique().sort().each( function ( d, j ) {
                                  
                        select.append( '<option value="'+d+'">'+d+'</option>' );
                    } );
                    
                } );

            },
            "scrollCollapse": true,
            "info":    false,
            "lengthMenu": [[10,20,30,50,100,-1], [10,20,30,50,100,"Todo"]],
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

        $("#cModal").click(function() {$("#outCall").openModal();});
        if (localStorage.getItem("EnLinea")=== "true" || localStorage.getItem("EnLinea")=== null) {
            localStorage.setItem("FechaInicio", getDate());
            localStorage.setItem("EnLinea", false);
            live()
        }else{
            live();
        }
        function live(){
            control = setInterval(function(){
                $('#ttCall').text(Cal_Date(localStorage.getItem("FechaInicio"),getDate()));
            },10);
        }

        $("#ID_Cerrar").click(function(){
            clearInterval(control);
            //clearInterval(intFirebase);
            localStorage.setItem("EnLinea", true);
            Close_Eyes_Of_God(localStorage.getItem("uNombre"));
            $('#ttCall').text("00:00:00");

           window.location.href = "salir"


        });



       /* intFirebase = setInterval(function(){
            Ear_Eyes_Of_God(
                localStorage.getItem("FechaInicio"),
                getDate(),
                Cal_Date(localStorage.getItem("FechaInicio"),getDate()),
                localStorage.getItem("uNombre"),
                localStorage.getItem("uId")
            );
        },30000);*/



        firebase.database().ref("USUARIOS").on('child_changed', function(data) {
            if (data.key==localStorage.getItem("uNombre")){
                clearInterval(control);
                //clearInterval(intFirebase);

                if (data.val().EnLinea==2){
                    $('#mTiempoFuera').openModal({dismissible:false});
                    localStorage.setItem("Incio_Descanso",getDate());
                   var Frm_Datos = {
                        TIPO:'PAUSA',
                        FECHA_INICIO:localStorage.getItem("Incio_Descanso"),
                        FECHA_FIN:getDate(),
                        tTotal:Cal_Date(localStorage.getItem("Incio_Descanso"),getDate())
                    };
                    $.ajax({
                        url: "GUARDAR_PAUSA",
                        type: "post",
                        async:true,
                        data: Frm_Datos
                    });
                }else{
                    var Frm_Datos = {
                        TIPO:'PAUSA_OFF',
                        FECHA_INICIO:localStorage.getItem("Incio_Descanso"),
                        FECHA_FIN:getDate(),
                        tTotal:Cal_Date(localStorage.getItem("Incio_Descanso"),getDate())
                    };
                    $.ajax({
                        url: "GUARDAR_PAUSA",
                        type: "post",
                        async:true,
                        data: Frm_Datos
                    });
                    $('#mTiempoFuera').closeModal();
                    //setTimeout("", 3000);
                    location.reload(); //Refrescar pagina despues de cerrar el modal mTiempoFuera
                }





                Interval_pausa = setInterval(function(){
                    $('#ttPausa').text(Cal_Date(localStorage.getItem("Incio_Descanso"),getDate()));
                },10);
            }
        });



    Ear_Eyes_Of_God(
        localStorage.getItem("FechaInicio"),
        getDate(),
        Cal_Date(localStorage.getItem("FechaInicio"),getDate()),
        localStorage.getItem("uNombre"),
        localStorage.getItem("uId")
    );


    function Ear_Eyes_Of_God(Init,End,isTime,id,name,camp,numcamp) {
        firebase.database().ref("USUARIOS").child(id).update({
            Agente: id,
            FechaInicio: Init,
            FechaFin: End,
            ttTrabajo:isTime,
            ttEnPausa:"",
            Nombre:name,
            Camp: (pathname.match(/detalles.*/) ? camp = $("#span2").text(): camp = $("#spCamp2").text()),  
            NumCamp: (pathname.match(/detalles.*/) ? numcamp = $("#span1").text(): numcamp = $("#spCamp1").text())

        });
        firebase.database().ref("USUARIOS").child(id).once('value', function(snapshot) {
            if (snapshot.val().EnLinea==2){
                $('#mTiempoFuera').openModal({
                    dismissible:false
                });
                Interval_pausa = setInterval(function(){
                    $('#ttPausa').text(Cal_Date(localStorage.getItem("Incio_Descanso"),getDate()));
                },10);
            }else{
                $('#mTiempoFuera').closeModal();       
            }
        });


    }


    function Cal_Date(DateInit,DateNow){
        return(moment.utc(moment(DateNow,"DD-MM-YYYY HH:mm:ss").diff(moment(DateInit,"DD-MM-YYYY HH:mm:ss"))).format("HH:mm:ss"));
    }


    });
    function Death() {
        clearInterval(control);
        //clearInterval(intFirebase);
        localStorage.setItem("EnLinea", true);
        console.log(localStorage.getItem("EnLinea"));
        Close_Eyes_Of_God(localStorage.getItem("uNombre"));
        $('#ttCall').text("00:00:00");



    }

    function Close_Eyes_Of_God(id) {
        firebase.database().ref("USUARIOS").child(id).update({
            EnLinea : 0,
            FechaInicio: localStorage.getItem("FechaInicio"),
            FechaFin: getDate(),
            ttTrabajo:$('#ttCall').text()

        });
    }
    function getDate(){
        var hoy = new Date();
        var dd = hoy.getDate(),mm = hoy.getMonth()+1,yyyy = hoy.getFullYear();
        var h = hoy.getHours(),i = hoy.getMinutes(),s=hoy.getSeconds();
        if(dd<10) {dd='0'+dd}
        if(mm<10) {mm='0'+mm}
        if(h<10) {h='0'+h}
        if(i<10) {i='0'+i}
        if(s<10) {s='0'+s}
        hoy = dd+'-'+mm+'-'+yyyy+ ' ' + h +':'+i+':'+s;
        return hoy;
    }
    function cOut(){
        Death();
    }
    $("#cModal").click(function() { $("#outCall").openModal(); });

    /*INICIO DE LOS DETALLES DE LA CAMPAÑA*/
    function getDetalles(id){
        window.location.href = "detalles?C="+id
    };
    /*FINDE LOS DETALLES DE LA CAMPAÑA*/

    /*INICIO DE INFORMACION DEL CLIENTE EN LA CAMPAÑA*/
    function getInfoCliente(CP,CL) {
        window.location.href = "cCliente?CP="+CP+"&CL="+CL
    }
    /*DIN DE INFORMACION DEL CLIENTE EN LA CAMPAÑA*/

    $('#filtrarClientes').on('keyup', function() {
        var table = $('#tbl_camp_cliente').DataTable();
        table.search(this.value).draw();
    });

/*NUEVA ACTUALIZACION: NUEVO DISEÑO PANTALLA LLAMADA*/

function getNumTelefono(numTelefono) {
    if (numTelefono == " " || numTelefono == "") {
        mensaje("El campo del teléfono esta vacío","error");
    }else {
        $('#Kronos').text("00:00:00:00");
        $('#numTelefono').text(numTelefono);
        $("#nuevaLlamada-modal").openModal({
            dismissible:false
        });
    }
}

function llenandoCmbArticulos(numeroCamp) {
    $.ajax({
        url: "listarArticulos/"+numeroCamp,
        type: "POST",
        async: true,
        success: function(data) {
            if (data!=1) {
                $('#frm_articulos').empty();
                $("#frm_articulos").append('<option value="" disabled selected>SELECCIONE LOS PRODUCTOS VENDIDOS</option>');
                $.each(JSON.parse(data), function(i, item) {
                    $("#frm_articulos").append('<option value="' + item['value'] + '">' + item['desc'] + '</option>');
                });
                $('#frm_articulos').trigger("chosen:updated");
            }
        }
    });
}

$("#agregarArticuloDT").on('click', function() {
    var table = $('#tblArtSeleccionados').DataTable();
    var articulo = $('#frm_articulos').val();

    $.ajax({
        url: "agregarArtDatatable/"+articulo,
        type: "POST",
        async: true,
        success: function(data) {
            if (data!=1) {
                $.each(JSON.parse(data), function(i, item) {
                    table.row.add( [
                        item['ARTICULO'],
                        item['DESCRIPCION'],
                        '<center><a class="btn-floating red" href="#"><i class="tiny material-icons quitar">close</i></a></center>'
                    ]).draw(false);
                });
            }
        }
    });
});

$('#tblArtSeleccionados tbody').on( 'click', 'i.quitar', function () {
    var tabla = $('#tblArtSeleccionados').DataTable();
    tabla
    .row( $(this).parents('tr'))
    .remove()
    .draw();
} );

$("#cancelarProceso").on("click", function() {
    swal({
        title: '¿Desea cancelar la operación?',
        text: 'Los datos que haya ingresado se borraran',
        type: 'warning',
        showCloseButton: true,
        showCancelButton: true,
        confirmButtonColor: '#C72828',
        confirmButtonText: 'OK',
        cancelButtonText: 'CANCELAR'
    }).then(function() {
        var table = $('#tblArtSeleccionados').DataTable();
            table
            .clear()
            .draw();
        $("#frm_Monto").val("");
        $("#frm_comentario").val("");
        $("#outCall").closeModal();
    });
});

</script>