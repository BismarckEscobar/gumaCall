<script>
$(document).ready(function() {

    $(function() {
        $("ul li").each(function(){
            if($(this).attr("id") == 'grupos')
            $(this).addClass("urlActual");
         })
    });
    /*INICIALIZANDO TABLAS*/
	$('#tblGrupos').DataTable({
        "scrollCollapse": true,
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
            "emptyTable": "NO HAY DATOS DISPONIBLES",
            "search":     "BUSCAR"
        }
    });
    $('#tblVNA tbody').on( 'click', 'tr', function () {
        $(this).toggleClass('selected');
    });
    $('#tblVA tbody').on( 'click', 'tr', function () {
        $(this).toggleClass('selected');
    });
    $("#agregarNuevo").click(function() { $("#nuevoGrupoModal").openModal(); });
});
/*CARGANDO LAS TABLAS DE LOS AGENTES*/
function cargarTablaNoVendedores(idGrupo) {
    $('#tblVNA').DataTable({
        ajax: "listarVendedoresAct/" + idGrupo,
        "destroy": true,
        "info":    false,
        "bPaginate": false,
        "paging": false,
        "ordering": false,
        "pagingType": "full_numbers",
        "emptyTable": "No hay datos disponibles en la tabla",
        "language": {
            "zeroRecords": "No hay datos disponibles"
        },
        columns: [
            { "data": "RUTA" },
            { "data": "NOMBRE" }
        ]
    });
}
function cargarTablaSiVendedores(idGrupo) {
    $('#tblVA').DataTable({
        ajax: "listarVendedoresAgregados/"+ idGrupo,
        "destroy": true,
        "info":    false,
        "bPaginate": false,
        "paging": false,
        "ordering": false,
        "pagingType": "full_numbers",
        "emptyTable": "No hay datos disponibles en la tabla",
        "language": {
            "zeroRecords": "No hay datos disponibles"
        },
        columns: [
            { "data": "VENDEDOR" },
            { "data": "NOMBRE" }
        ]
    });
}

$("#editarInfoGrupo").click(function(){
    $("#editInfoModal").openModal();
});
/*EDITANDO INFORMACION DEL GRUPO*/
$("#editInfo").click(function() {
    if ($('#nombreGrupoBD').val()=="") {
        mensaje("DIGITE UN NOMBRE VALIDO","error");$('#nombreGrupoBD').focus();return false;
    }else if ($('#grupoEstadoBD').is(':checked')){
        $('#grupoEstadoBD').val(1);
    }
    document.getElementById("formEditarGrupo").submit();
});
/*METODO PARA GUARDAR UN NUEVO GRUPO*/
$("#guardarGrupo").click(function(){
    if ($('#nombreGrupo').val()=="") {
        mensaje("DIGITE UN NOMBRE VALIDO","error");$('#nombreGrupo').focus();return false;
    }else if ($("#agente").val()==null) {
        mensaje("SELECCIONE UN RESPONSABLE DE GRUPO","error");$('#agente').focus();return false;
    }else{
        document.getElementById("formNuevoGrupo").submit();
    }
});
/*EVENTOS PARA AGREGAR O QUITAR AGENTES EN GRUPOS*/
$('#addRight').click( function (){
    var table = $('#tblVNA').DataTable();
    var table2 = $('#tblVA').DataTable();
    var data = table.rows('.selected').data();
    for (var i=0; i < data.length ;i++){
        table2.row.add( {
            "VENDEDOR":   data[i]['RUTA'],
            "NOMBRE":       data[i]['NOMBRE']
        } ).draw();
    }
    var rows = table.rows( '.selected' ).remove().draw();
});
$('#addLeft').click( function (){
    var table = $('#tblVNA').DataTable();
    var table2 = $('#tblVA').DataTable();
    var data = table2.rows('.selected').data();
    for (var i=0; i < data.length ;i++){
        table.row.add( {
            "RUTA":     data[i]['VENDEDOR'],
            "NOMBRE":       data[i]['NOMBRE']
        } ).draw();           
    }
    var rows = table2.rows( '.selected' ).remove().draw();
});
/*BUSCANDO INFORMACION DE GRUPO POR ID*/
function editarGrupo(idGrupo) {
    var estado="";
    $.ajax({
        url: "buscarGrupo/" + idGrupo,
        type: "post",
        async: true,
        success: function(data) {
            $.each(JSON.parse(data), function(i, item) {
                $('#grupo').text("GRUPO: "+item['NombreGrupo']),            
                $('#nombreGrupoBD').val(item['NombreGrupo']),
                $('#idGrupoBD1').val(item['IdGrupo']),
                $('#idGrupoBD2').val(item['IdGrupo']),
                estado=item['Estado']
            });
            if(estado == 1)         
                $("#grupoEstadoBD").prop('checked', true);
            else 
                $("#grupoEstadoBD").prop('checked', false);         
        }
    });    
    $("#editarGrupoModal").openModal();
    cargarTablaNoVendedores(idGrupo);
    cargarTablaSiVendedores(idGrupo);    
}
/*GUARDAR EDICION DE GRUPO AÑADIENDO AGENTES*/
$("#editarGrupo").click(function(){
    var grupoDetalle  = new Array();
    var i = 0; var idGrupo=$('#idGrupoBD1').val();
    tabla = $('#tblVA').DataTable();
    tabla.rows().data().each( function (index,value) {
        grupoDetalle[i] = idGrupo +","+ tabla.row(i).data().VENDEDOR;
        i++;        
    });
    var form_data = {
        grupo: grupoDetalle
    };
    if (grupoDetalle.length!=0) {
        swal({
            title: '',
            text: '¿Desea guardar los cambios en el grupo?',
            type: 'warning',
            showCloseButton: true,
            showCancelButton: true,
            confirmButtonColor: '#C72828',
            confirmButtonText: 'ACEPTAR',
            cancelButtonText: 'CANCELAR'
        }).then(function() {
            $.ajax({
                url: "guardandoEdicionGrupo/",
                type: "POST",
                data: form_data,
                success: function(resu) {
                    if (resu=="true") {
                        swal("Informacion Guardada!", "Espere...")
                        $(location).attr('href',"grupos");
                    }else{
                        sweetAlert("Error...", "Ocurrio un error, intente de nuevo", "error");
                        $("#guardarEdicion").show();
                    }
                }
            });
        });
    }else{
        sweetAlert("", "Grupo vacio, Ingrese al menos 1 vendedor!", "error");
    }
});
</script>