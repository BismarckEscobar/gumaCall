<script>
$(document).ready(function() {
    $(function() {
        $("ul li").each(function(){
            if($(this).attr("id") == 'tipificaciones')
            $(this).addClass("urlActual");
         })
    });

    $("#agregarTipi").click(function() {$("#nuevaTipificacion").openModal();});

    $('#tblTipificaciones').DataTable({
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

$('#guardarTipificacion').click(function() {
    if ($('#nombreTipificacion').val()=="") {
        mensaje('Escriba un nombre para la tipificación', 'error');
    }else {
        $('#formNuevaTipi').submit();
    }   
});

$('#filtrarTipificaciones').on('keyup', function() {
    var table = $('#tblTipificaciones').DataTable();
    table.search(this.value).draw();
});

function editarTipificacion(idTipificacion, estado) {
    swal({
        text: "¿Esta seguro de querer cambiar el estado de esta tipificación?",
        type: 'warning',
        showCloseButton: true,
        confirmButtonColor: '#f44336',
        confirmButtonText: 'ACEPTAR',
        showCancelButton: true,
        cancelButtonText: 'Cancelar',
    }).then(function() {
        $.ajax({
            url: "cambiarEstadoTipi/" + idTipificacion + "/" + estado,
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