<script>
$(document).ready(function() {    

    $(function() {
        $("ul li").each(function(){
            if($(this).attr("id") == 'reportes')
            $(this).addClass("urlActual");
         })
    });
    var pathname = window.location.pathname;

    if (pathname.match(/tipoRpt.*/)) {
        $("#menu ul li").each(function(){
            var pos = $(this).attr("id");
            if ($(this).attr("id")==pos) {
                $("#"+pos+" a").attr("href", "../"+pos+"");
            }
        })
    }
    $('#tblReportes').DataTable({
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

$("#selectRpt").on('change', function(event) {
    var tipoReporte = $('#selectRpt').val();
    if (tipoReporte==1) {
        $('#reportesAgentes').fadeIn('slow');
    }else {
        $('#reportesAgentes').fadeOut('slow');
    }
});

function cargaData(opc) {
    $.ajax({
        url: "tipoRpt/" + opc,
        type: 'post',
        async: true,
        success: function(data) {
            $('#selectRpt').empty();
            $.each(JSON.parse(data), function(i, item) {
                $("#selectRpt").append('<option value="' + item['value'] + '">' + item['desc'] + '</option>');
            });
            $('#selectRpt').trigger("chosen:updated");
        }
    }); 
}

$('#generarRpt').click(function() {
    var pathname = window.location.pathname;
    var valor = $('#selectRpt').val();
    if (pathname.match(/rptcampania/)) {
        generarReporte(valor, 1);
        $('#val').val(1);
        $("#rptCampaniaModal").openModal();
    }else if (pathname.match(/rptagentes/)) {
        generarReporte(valor, 2);
        $('#val').val(2);
        $("#rptAgenteModal").openModal();
    }    
})

function generarReporte(identificador, tipoReporte) {
    $.ajax({
        url: "../generarRep/" + identificador + "/" +tipoReporte,
        type: 'post',
        async: true,
        success: function(data) {
            $.each(JSON.parse(data), function(i, item) {
                if (tipoReporte==1) {
                    $.each(item['array_1'], function(i, item) {
                        $('#numCampania2').val(item['ID_Campannas']);
                        $('#tituloCampania').text(item['ID_Campannas'] +' - '+item['nombre']);
                        $('#fechasCampania').text('Del '+moment(item['fechaInicio']).format('DD/MM/YYYY')+' al '+moment(item['fechaCierre']).format('DD/MM/YYYY'));
                        $('#monto').text('META: C$ '+ parseFloat(item['meta']).toLocaleString("en-US"));
                        $('#real').text('REAL: C$ '+ parseFloat(item['montoReal']).toLocaleString("en-US"));
                        $('#observacion').val(item['observacion']);
                        $('#mensaje').val(item['mensaje']);
                        $('#totalLlamada').text(parseInt(item['totalLlamadas']));
                        $('#tiempoTotal').text(item['tiempoTotal']);
                        $('#tiempoPromedio').text(moment(item['tiempoPromedio'], ["h:mm:ss"]).format("HH:mm:ss"));
                        $('#unidades').text(parseInt(item['unidad']));

                    });
                    $('#tblClienteRpt').DataTable({                       
                        "destroy": true,
                        "data": item['array_2'],
                        "info":    false,
                        "bPaginate": false,
                        "paging": false,
                        "ordering": false,
                        "pagingType": "full_numbers",
                        "emptyTable": "No hay datos disponibles en la tabla",
                        "language": {
                            "zeroRecords": "No hay datos disponibles"
                        },
                        columns: [
                            { "data": "ID_Cliente" },
                            { "data": "Nombre" },
                            { "data": "Meta" },
                            { "data": "montoReal" }
                        ]
                    });
                }else if (tipoReporte==2) {
                    $('#nombreUsuario').text(item['nombre']);
                    $('#usuario').text(item['usuario']);
                    $('#HC').text(moment(item['tiempoON'], ["h:mm:ss"]).format("HH:mm:ss"));
                    $('#TP').text(moment(item['tiempoPAUSA'], ["h:mm:ss"]).format("HH:mm:ss"));
                    $('#TT').text(moment(item['tiempoTotal'], ["h:mm:ss"]).format("HH:mm:ss"));
                };
            });
        }
    });
}

$("#CP").on('change', function(event) {
    if ($("#CP").prop('checked', true)) {
        cargaData(1);
        $('#val').val(1);
        $('#rptCampania').fadeOut();
        $('#rptAgentes').fadeOut();
    }
});
$("#AG").on('change', function(event) {
    if ($("#AG").prop('checked', true)) {
        cargaData(2);
        $('#val').val(2);
        $('#rptCampania').fadeOut();
        $('#rptAgentes').fadeOut();
    }
});
$("#CL").on('change', function(event) {
    if ($("#CL").prop('checked', true)) {
        cargaData(3);
        $('#val').val(3);
        $('#rptCampania').fadeOut();
        $('#rptAgentes').fadeOut();
    }
});

$('#ocultar').click(function () {  
    $('.mostrar').hide(150);
    $('.mostrar').hide("fast");
    $(this).hide();
    $('#mostrar').show();
});

$('#mostrar').click(function () { 
    $('.mostrar').show(150);
    $('.mostrar').show("fast");
    $(this).hide();
    $('#ocultar').show();
});

function imprimirRptCamp() {
    var tipoRpt = $('#val').val();
    if (tipoRpt==1) {
        var campania = $('#numCampania2').val();
        window.open('../generarPDF/reporte-campania/'+campania, '_blank');
    }
}


</script>