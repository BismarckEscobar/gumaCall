var activo = false;
$(document).ready(function() {
    $('select').material_select();
    $(function() {
        var pgurl = window.location.href.substr(window.location.href.lastIndexOf("/")+1);
        $("ul a li").each(function(){
            if($(this).attr("href") == pgurl || $(this).attr("href") == '' || $(this).attr("href")+"#" == pgurl)
            $(this).addClass("urlActual");
         })
    });

    $(".nav li a").each(function() {
        if(this.href.trim() == window.location){
            $(this).parent().addClass("active");
            activo = true;
        }
    });
    if(!activo){
        $('.nav li a:first').addClass("active");
    }
} );


function mensaje (mensaje,clase) {
    var $toastContent = $('<span class="center">'+mensaje+'</span>');
    if (clase == 'error'){
        return Materialize.toast($toastContent, 3500,'rounded error');
    }
    return  Materialize.toast($toastContent, 3500,'rounded');    
}