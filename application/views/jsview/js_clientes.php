<script>
$(document).ready(function() {
    $(function() {
        $("ul li").each(function(){
            if($(this).attr("id") == 'clientes')
            $(this).addClass("urlActual");
         })
    });

    $("#agregarClientes").click(function() {$("#modalCargaCliente").openModal();});

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
        }
    
});
</script>