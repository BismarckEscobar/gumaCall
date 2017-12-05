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
        }
    });      
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
            url: "guardarUnCl",
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
                    mensaje('El código de cliente ingresado ya existe', 'error');
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
</script>