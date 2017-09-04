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
    var idGlobal;
    $("#guardarGrupo").click(function(){
        if ($('#nombreGrupo').val()=="") {
            mensaje("DIGITE UN NOMBRE VALIDO","error");$('#nombreGrupo').focus();return false;
        }else if ($("#agente").val()==null) {
            mensaje("SELECCIONE UN RESPONSABLE DE GRUPO","error");$('#agente').focus();return false;
        }else{
            document.getElementById("nuevoGrupoModal").submit();
        }
    });
</script>