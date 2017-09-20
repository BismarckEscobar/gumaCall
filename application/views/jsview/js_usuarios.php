<script>
$(document).ready(function() {
    
    $(function() {
        $("ul li").each(function(){
            if($(this).attr("id") == 'usuarios')
            $(this).addClass("urlActual");
         })
    });
    $("#agregarUsuario").click(function() { $("#modalNuevoUsuario").openModal(); });
    
    $('#tblUsuario').DataTable({
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

$("#guardarUsuario").click(function(){
    if ($("#contrasenia").val()=="" || $("#rpContrasenia").val()=="" || $("#nombreUsuario").val()=="" || $("#tipoUsuario").val()==null) {
        mensaje("Todos los campos son obligatorios","error");$('#nombreUsuario').focus();return false;
    }else if ($('#rpContrasenia').val() != $('#contrasenia').val()) {
        mensaje("Las contraseñas no coinciden","error");$('#contrasenia').focus();return false;
    }else if ($('#contrasenia').val().length < 5) {
        mensaje("La contraseña debe ser mas larga por seguridad","error");$('#contrasenia').focus();return false;
    }else {
        document.getElementById("formNuevoUsuario").submit();
    }
});

function bajaUsuario(idUsuario, valor) {
    swal({
        text: "¿Esta seguro de querer cambiar el estado de este usuario?",
        type: 'warning',
        showCloseButton: true,
        confirmButtonColor: '#f44336',
        confirmButtonText: 'ACEPTAR',
        showCancelButton: true,
        cancelButtonText: 'Cancelar',
    }).then(function() {
        $.ajax({
            url: "cambiarEstado/" + idUsuario + "/" + valor,
            type: "post",
            async: true,
            success: function(data) {
                console.log(data);
                if(data=="true") {
                    swal({
                        title: "Actualizado con éxito",
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
</script>