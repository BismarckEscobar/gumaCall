var activo = false;
$(document).ready(function() {
    $('select').material_select();

    var pathname = window.location.pathname;
    if (pathname.match(/detallesVA.*/)) {
        var pgurl = 'campaniasVA';
        $("ul li").each(function(){
            if($(this).attr("id") == pgurl)
                $(this).addClass("urlActual");
                $("ul li a").attr("href", "../campaniasVA");
         })
        graficas();  
    };

    $(".nav li a").each(function() {
        if(this.href.trim() == window.location){
            $(this).parent().addClass("active");
            activo = true;
        }
    });
    if(!activo){
        $('.nav li a:first').addClass("active");
    }
    /*FORMATO PARA TABLAS SIN PAGINACION*/
    $("#tblAgentes, #tblDetalleCamp").DataTable({
        "ordering": true,
        "info": false,
        "bPaginate": false,
        "bfilter": false,
        "pagingType": "full_numbers",
        "aaSorting": [
            [0, "asc"]
        ],
        "lengthMenu": [
            [20, 10, -1],
            [20, 30, "Todo"]
        ],
        "language": {
            "zeroRecords": "NO HAY RESULTADOS",
            "paginate": {
                "first":      "Primera",
                "last":       "Última ",
                "next":       "Siguiente",
                "previous":   "Anterior"
            }
        }
    });
});

$('.dropdown-button').click(function() {
    $(this).dropdown();
});

/*FUNCION PARA MENSAJE DE CONFIRMACIONES*/
function mensaje (mensaje,clase) {
    var $toastContent = $('<span class="center">'+mensaje+'</span>');
    if (clase == 'error'){
        return Materialize.toast($toastContent, 3500,'rounded error');
    }
    return  Materialize.toast($toastContent, 3500,'rounded');    
}