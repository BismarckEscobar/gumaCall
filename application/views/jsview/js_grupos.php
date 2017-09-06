<script>
$(document).ready(function() {
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
    $("#agregarNuevo").click(function() { $("#nuevoGrupoModal").openModal(); });

});
$("#editarGrupo").click(function(){
    if ($('#nombreGrupoBD').val()=="") {
        mensaje("DIGITE UN NOMBRE VALIDO","error");$('#nombreGrupoBD').focus();return false;
    }else if ($("#agenteBD").val()==null) {
        mensaje("SELECCIONE UN RESPONSABLE DE GRUPO","error");$('#agenteBD').focus();return false;
    }else if ($('#grupoEstadoBD').is(':checked')){
        $('#grupoEstadoBD').val(1);
    }else{
        $('#grupoEstadoBD').val(0);        
        //document.getElementById("formEditarGrupo").submit();
    }
    alert($('#grupoEstadoBD').val());
});

$("#guardarGrupo").click(function(){
    if ($('#nombreGrupo').val()=="") {
        mensaje("DIGITE UN NOMBRE VALIDO","error");$('#nombreGrupo').focus();return false;
    }else if ($("#agente").val()==null) {
        mensaje("SELECCIONE UN RESPONSABLE DE GRUPO","error");$('#agente').focus();return false;
    }else{
        document.getElementById("formNuevoGrupo").submit();
    }
});

function editarGrupo(idGrupo) {
    var estado="";
    $.ajax({
        url: "buscarGrupo/" + idGrupo,
        type: "post",
        async: true,
        success: function(data) {
            console.log(data);
            $.each(JSON.parse(data), function(i, item) {
                $('#nombreGrupoBD').val(item['NombreGrupo']),
                $('#agenteBD').val(item['IdResponsable']),
                $('#idGrupoBD1').val(item['IdGrupo']),
                estado=item['Estado']
            });
            if(estado == 1)         
                $("#grupoEstadoBD").prop('checked', true);
            else 
                $("#grupoEstadoBD").prop('checked', false);            
        }

    });
    $("#editarGrupoModal").openModal(); 
}
</script>