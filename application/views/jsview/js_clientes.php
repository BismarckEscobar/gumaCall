<script>
$(document).ready(function() {

    $(function() {
        $("ul li").each(function(){
            if($(this).attr("id") == 'clientes')
            $(this).addClass("urlActual");
         })
    });

    $("#aClientExcel").click(function() {$("#modalCargaCliente").openModal();});
    $("#aClientInd").click(function() {$("#modalCargaClienteInd").openModal();});

    $('#tblCliente').DataTable({
        ajax: "listandoClientes",
        "destroy": true,
        "bFilter": true,
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
        },
        columns: [
            { "data": "CODIGO" },
            { "data": "RUC" },
            { "data": "NOMBRE" },
            { "data": "TELEFONO1" },
            { "data": "TELEFONO2" },
            { "data": "TELEFONO3" },
            { "data": "DIRECCION" },
            { "data": "OPC" }
        ],
        "fnInitComplete": function () {
            $("#pgr1").hide();
        }
    });

    $('.dropdown-button').dropdown();
});

$('#guardarClientes').click(function() {
    if ($('#dataCliente').val()=="") {
        mensaje("No ha cargado ningun archivo excel","error");
        val=false;
    } else {
        $('#formCargaCliente').submit();
        espere();
    }
});

$('#guardarUnCl').click( function() {
    if (validarControles()!=true) {
        msj = validarControles();
        mensaje(msj,'error');
    }else {
        if ($('#rucCliente').val()=='') {
            ruc1='N/D';
        }else{
            ruc1=$('#rucCliente').val();
        }
        var form_data = {
            Tipo:'I',
            ID_Cliente: $('#codCliente').val(),
            RUC: ruc1,
            Nombre: $('#nombreCliente').val(),
            Direccion: $('#direccionCliente').val(),
            Telefono1: $('#telf1').val(),
            Telefono2: $('#telf2').val(),
            Telefono3: $('#telf3').val(),
            Vendedor: $('#selectRuta').val()
        };
        $.ajax({
            url: "editCliente",
            type: "post",
            async: true,
            data: form_data,
            success: function(data) {
                if (data==1) {
                    swal({
                      title: 'GUARDADO CON EXITO',
                      text: '¿Desea guardar otro cliente?',
                      type: 'success',
                      showCancelButton: true,
                      confirmButtonText: 'Sí',
                      confirmButtonColor: '#3085d6',
                      cancelButtonText: 'NO',
                      cancelButtonColor: '#C72828',
                    }).then(function() {
                        limpiarControles();
                        $('#codCliente').focus();
                    }, function(dismiss) {
                      if (dismiss === 'cancel') {
                        location.reload();
                      }
                    })
                }else if(data==false) {
                    mensaje('El código del cliente ya existe', 'error');
                }
            }
        });
    }
});

function espere() {
    swal({
        title: "Cargando datos",
        text: 'Actualizado con éxito',
        showConfirmButton:false,
        showCloseButton: false,
        allowOutsideClick: false,
        html:'<p>Espere por favor...</p><br>'+'<div class="preloader-wrapper active">'+
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
    }).then();
}

function limpiarControles() {
    $('#codCliente').val('');
    $('#rucCliente').val('');
    $('#nombreCliente').val('');
    $('#direccionCliente').val('');
    $('#telf1').val('');
    $('#telf2').val('');
    $('#telf3').val('');
}

function validarControles() {
    if ($('#codCliente').val()=='') {
        return 'Debe ingresar un codigo valido';
    }else if ($('#nombreCliente').val()=='') {
        return 'Debe ingresar el nombre';
    }else if ($('#direccionCliente').val()=='') {
        return 'Ingrese una dirección valida';
    }else if ($('#telf1').val()=='' && $('#telf2').val()=='' && $('#telf3').val()=='') {
        return 'Debe ingresar al menos un número teléfonico';
    }else if ($('#selectRuta').val()==null) {
        return 'Seleccione una ruta';
    }else {
        return true;
    }
}

function editar_registro(id) {
    $(".input-edit-"+id).removeAttr("readonly");
    $( ".input-edit-"+id).removeClass( "no-edit" ).addClass( "edit" );

    $("#opciones2-"+id).show();
    $("#opciones1-"+id).hide();
}

function guardarEdicion(idCliente) {
    var form_data = {
        Tipo:'U',
        ID_Cliente: idCliente,
        RUC: $('#ruc-'+idCliente).val(),
        Nombre: $('#nombre-'+idCliente).val(),
        Direccion: $('#dir-'+idCliente).val(),
        Telefono1: $('#telf1-'+idCliente).val(),
        Telefono2: $('#telf2-'+idCliente).val(),
        Telefono3: $('#telf3-'+idCliente).val(),
        Vendedor: 0
    };
    $.ajax({
        url: "editCliente",
        type: "post",
        async: true,
        data: form_data,
        success: function(data) {
            if (data==1) {
                swal({
                    text:"Guardado con exito",
                    type:"success",
                    confirmButtonText:"Aceptar",
                    confirmButtonColor:"#1E824C"
                }).then(function(){
                    location.reload();
                });
            }else if(data==false) {
                mensaje('No se puede actualizar el registro', 'error');
            }
        }
    });   
}

function eliminar_registro(idCliente) {
    swal({
        text: "¿Esta seguro que quiere eliminar este registro?",
        type: 'warning',
        showCloseButton: true,
        confirmButtonColor: '#f44336',
        confirmButtonText: 'ACEPTAR',
        showCancelButton: true,
        cancelButtonText: 'Cancelar',
    }).then(function() {
        var form_data = {
            Tipo:'D',
            ID_Cliente: idCliente
        };

        $.ajax({
            url: "editCliente",
            type: "post",
            async: true,
            data: form_data,
            success: function(data) {
                if(data==1) {
                    swal({
                        text: "Se elimino el registro del cliente",
                        type: "success",
                        confirmButtonText: "CERRAR",
                    }).then(
                        function() { location.reload(); }
                    )
                }                
            }
        });
    })
}

function cancelarEdicion(id) {
    $(".input-edit-"+id).attr("readonly","readonly");
    $( ".input-edit-"+id).removeClass( "edit" ).addClass("no-edit");

    $("#opciones2-"+id).hide();
    $("#opciones1-"+id).show();
}

$('#tblCliente').on('draw.dt', function () {
    $('.dropdown-button').dropdown();
} );

</script>