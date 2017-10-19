<script>
$(document).ready(function() {
    $('.datepicker').pickadate({
        labelMonthNext: 'Mes siguiente',
        labelMonthPrev: 'Mes anterior',
        labelMonthSelect: 'Selecciona un mes',
        labelYearSelect: 'Selecciona un año',
        monthsFull: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        monthsShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
        weekdaysFull: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
        weekdaysShort: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],
        weekdaysLetter: ['D', 'L', 'M', 'X', 'J', 'V', 'S'],
        today: 'Hoy',
        clear: 'Limpiar',
        close: 'Cerrar',
        format: 'yyyy-mm-dd',
        closeOnSelect: false
    });

    $('#tblTiempos').DataTable({
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

    if (pathname.match(/rptagentes*/)) {
        $('#filtroPorFechas').show();
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
    }else if (pathname.match(/rptclientes/)) {
        generarReporte(valor, 3);
        $('#val').val(3);
        $("#rptClienteModal").openModal();
    }
})

function generarReporte(identificador, tipoReporte) {
    var dataReporte  = new Array(); var d1=''; var d2='';
    if (tipoReporte==1) {         
        dataReporte[0] = identificador +","+ tipoReporte +","+ d1 +","+ d2;
    }else if (tipoReporte==2) {
        if ($('#desde').val()=="" && $('#hasta').val()=="") {
            d1= moment('2017-10-17 00:00:00').format('YYYY-MM-DD HH:mm:ss');
            d2= moment('2017-10-17 24:00:00').format('YYYY-MM-DD HH:mm:ss');
        }else {
            d1 = moment($('#desde').val()).format('YYYY-MM-DD HH:mm:ss');
            d2 = moment($('#hasta').val()).format('YYYY-MM-DD HH:mm:ss');
        }
        dataReporte[0] = identificador +","+ tipoReporte +","+ d1 +","+ d2;
    }else if (tipoReporte==3) {
        dataReporte[0] = identificador +","+ tipoReporte +","+ d1 +","+ d2;
    }
        
    var form_data = {
        data: dataReporte
    };

    $.ajax({
        url: "../generarRep",
        type: 'post',
        async: true,
        data: form_data,
        success: function(data) {
            $.each(JSON.parse(data), function(i, item) {
                if (tipoReporte==1) {
                    $.each(item['array_1'], function(i, item) {
                        $('#idTemporal').val(item['ID_Campannas']);
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
                            { "data": "Meta", render: $.fn.dataTable.render.number( ',', '.', 2 )},
                            { "data": "montoReal", render: $.fn.dataTable.render.number( ',', '.', 2 ) }
                        ]
                    });
                }else if (tipoReporte==2) {
                    $('#idTemporal').val(item['IdUser']);
                    $('#nombreUsuario').text(item['nombre']);
                    $('#usuario').text(item['usuario']);
                    $('#HC').text(moment(item['tiempoON'], ["h:mm:ss"]).format("HH:mm:ss"));
                    $('#TP').text(moment(item['tiempoPAUSA'], ["h:mm:ss"]).format("HH:mm:ss"));
                    $('#TT').text(moment(item['tiempoTotal'], ["h:mm:ss"]).format("HH:mm:ss"));
                }else if (tipoReporte==3) {
                    $('#nombreCliente').text(item['nombre']);
                    $('#direccion').text(item['direccion']);
                    
                    $('#tblClientes').DataTable({                       
                        "destroy": true,
                        "data": JSON.parse(data),
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
                            { "data": "campania" },
                            { "data": "monto" },
                            { "data": "unidad" },
                            { "data": "meta", render: $.fn.dataTable.render.number( ',', '.', 2 )},
                            { "data": "nombre" },
                            { "data": "direccion" },
                            { "data": "telefono1" },
                            { "data": "telefono2" },
                            { "data": "Telefono3" },
                            { "data": "idCliente" },
                            { "data": "agente" }
                        ]
                    });

                }
            });
        }
    });
}

function imprimirRpt() {
    
    var tipoRpt = $('#val').val();
    var val = $('#idTemporal').val();

    if (tipoRpt==1) {        
        window.open("../generarPDF?tipo=rptcampania&id="+val+" ", '_blank');
    }else if (tipoRpt==2) {
        var d1 = moment($('#desde').val()).format('YYYY-MM-DD');
        var d2 = moment($('#hasta').val()).format('YYYY-MM-DD');
        var url = 'reporte-agente='+d1+"="+d2;
        window.open("../generarPDF?tipo=rptagentes&id="+val+"&f1="+d1+"&f2="+d2+"", '_blank');
    }else if (tipoRpt==3) {

        window.open("../generarPDF?tipo=rptagentes&id="+val+"&f1="+d1+"&f2="+d2+"", '_blank');
    }
}


</script>