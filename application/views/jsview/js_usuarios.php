<script>
$(document).ready(function() {
    desactivarUsuarioFB();
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
                if(data!="false") {
                $.each(JSON.parse(data), function(i, item){
                    desactivarUsuarioFB(item['Usuario']);                    
                });
                swal({
                    title: "Actualizando Usuario...",
                    text: "Espere por favor",
                    timer: 2000,
                    showConfirmButton:false,
                    html:'<br>'+'<div class="preloader-wrapper active">'+
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
                        location.reload();
                    }
                )
                }                
            }
        });
    })
}

function desactivarUsuarioFB(usuario){
    var cont=1;
    firebase.database().ref("USUARIOS").once('value', function(snapshot) {
        snapshot.forEach(function(childSnapshot) {
            var childKey = childSnapshot.key;
            if (childKey==usuario) {
                firebase.database().ref("/USUARIOS/"+childKey).remove();
                return;
            }
            cont++;
        });
    });
}
</script>