var activo = false;
$(document).ready(function() {
$('.datepicker').pickadate({ 
        selectMonths: true,selectYears: 15,format: 'dd-mm-yyyy',
        monthsFull: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        monthsShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
        weekdaysFull: ['D', 'L', 'M', 'M', 'J', 'V', 'S'],weekdaysShort: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],
        showMonthsShort: undefined,showWeekdaysFull: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],today: 'Hoy',
        clear: 'BORRAR',close: 'CERRAR' });
    
    $('select').material_select();

    //funcion para agregar el active en el menu, segun la pagina en la que se encuentre el usuario
    $(function() {
        var pgurl = window.location.href.substr(window.location.href.lastIndexOf("/")+1);
        $("ul a li").each(function(){
            if($(this).attr("href") == pgurl || $(this).attr("href") == '' || $(this).attr("href")+"#" == pgurl)
            $(this).addClass("urlActual");
         })
    });
    //Agregar clase Activo a items del Menú
    $(".nav li a").each(function() {
        if(this.href.trim() == window.location){
            $(this).parent().addClass("active");
            activo = true;
        }
    });
    if(!activo){
        $('.nav li a:first').addClass("active");
    }
} );//Fin Document Ready


function mensaje (mensaje,clase) {
    var $toastContent = $('<span class="center">'+mensaje+'</span>');
    if (clase == 'error'){
        return Materialize.toast($toastContent, 3500,'rounded error');
    }
    return  Materialize.toast($toastContent, 3500,'rounded');    
}