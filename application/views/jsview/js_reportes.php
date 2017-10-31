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

    $("#tblGeneral").DataTable({
        "paging":   false,
        "ordering": false,
        "info":     false,
        "lengthMenu": false,
        "language": {
            "zeroRecords": "NO HAY RESULTADOS"
        }
    });

    $("#tblRegLllamadas").DataTable({
        "paging":   false,
        "ordering": false,
        "info":     false,
        "lengthMenu": false,
        "language": {
            "zeroRecords": "NO HAY RESULTADOS"
        }
    });

    $(function() {
        $("ul li").each(function(){
            if($(this).attr("id") == 'reportes')
            $(this).addClass("urlActual");            
         })
    });

    var pathname = window.location.pathname;
    if (pathname.match(/tipoRpt*/)) {
        $("#menu ul li").each(function(){
            pos = $(this).attr("id");
            if ($(this).attr("id")==pos && $(this).attr("id") != 'acercaDe') {
                $("#"+pos+" a").attr("href", "../"+pos+"");
            }
        })
    }

    if (pathname.match(/rptagentes*/)) {
        $('#filtroPorFechas').show();
        $('#reportes2').hide();
    }else if (pathname.match(/rptclientes*/)) {
        cargaCampania();
        cargaCliente();
        $('#filtroPorCamp').show();
        $('#reportes2').hide();
    }else if (pathname.match(/rptLlamadas*/)) {
        cargaCampania();
        cargaCliente();
        $('#reportes2').hide();
        $('#filtroPorFechas').show();
        $('#filtroPorCamp').show();
        $('#filtroPorCliente').show();
    }else if (pathname.match(/rptcampania*/)) {
        $('#reportes2').hide();
        $('.mayuscula-bold').hide();
    }else if (pathname.match(/RegLlmdRealizadas*/)) {
        $('#reportes1').hide();
        $('#reportes2').show();
        $('#filtroPorFechas').show();
        $('#generarRpts1').hide();
        $('#generarRpts2').show();
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

function cargaCliente() {
    $.ajax({
        url: "../filtrarPorCliente",
        type: 'post',
        async: true,
        success: function(data) {
            $('#cliente').empty();
            $("#cliente").append('<option value="">Seleccionar todo</option>');
            $.each(JSON.parse(data), function(i, item) {
                $("#cliente").append('<option value="' + item['value'] + '">' + item['desc'] + '</option>');
            });
            $('#cliente').trigger("chosen:updated");
        }
    }); 
}

function cargaCampania() { 
    $.ajax({
        url: "../filtrarPorCamp",
        type: 'post',
        async: true,
        success: function(data) {
            $('#campania').empty();
            $("#campania").append('<option value="">Selecionar todo</option>');
            $.each(JSON.parse(data), function(i, item) {
                $("#campania").append('<option value="' + item['value'] + '">' + item['desc'] + '</option>');
            });
            $('#campania').trigger("chosen:updated");
        }
    }); 
}

$('#generarRpt').click(function() {
    var pathname = window.location.pathname;
    var valor = $('#selectRpt').val();    

    if ($('#selectRpt').val()==null) {
        mensaje("Seleccione un valor para generar el reporte", "error");
    }else {
        if (pathname.match(/rptcampania/)) {
            limpiarControles(1);
            generarReporte(valor, 1);
            $('#val').val(1);
            $("#rptCampaniaModal").openModal();
        }else if (pathname.match(/rptagentes/)) {
            limpiarControles(2);
            generarReporte(valor, 2);     
            $('#val').val(2);
            $("#rptAgenteModal").openModal();
        }else if (pathname.match(/rptclientes/)) {
            limpiarControles(3);
            generarReporte(valor, 3);
            $('#val').val(3);
            $("#rptClienteModal").openModal();
        }else if (pathname.match(/rptLlamadas/)) {
            limpiarControles(4);
            generarReporte(valor, 4);
            $('#val').val(4);
            $("#rptLlamadasModal").openModal();
        }
    }
})

$('#generarRpt2').click(function() {
    if ($('#desde').val()=="" && $('#hasta').val()=="") {
        mensaje("Tiene que seleccionar un rango de fechas", "error");
    }else {
        identificador = $('#selectRpt2').val();
        generarReporte(identificador, 5);
        $('#val').val(5);
        $("#rptRgtLlamadas").openModal();
    }
});

function generarReporte(identificador, tipoReporte) {
    var dataReporte  = new Array(); var d1=''; var d2=''; var nc=''; var cl='';
    
    if ($('#desde').val()=="" && $('#hasta').val()=="") {
        d1= moment(new Date('2017-01-01')).format('YYYY-MM-DD 00:00:00');
        d2= moment(new Date()).format('YYYY-MM-DD 23:59:59');
    }else {
        d1 = moment($('#desde').val()).format('YYYY-MM-DD 00:00:00');
        d2 = moment($('#hasta').val()).format('YYYY-MM-DD 23:59:59');
    }

    if (tipoReporte==1) {
        dataReporte[0] = identificador +","+ tipoReporte;
    }else if (tipoReporte==2) {
        dataReporte[0] = identificador +","+ tipoReporte +","+ d1 +","+ d2;
    }else if (tipoReporte==3) {
        nc = $('#campania').val();
        dataReporte[0] = identificador +","+ tipoReporte +","+ d1 +","+ d2 + "," + nc;
    }else if (tipoReporte==4) {
        nc = $('#campania').val();
        cl = $('#cliente').val();
        dataReporte[0] = identificador +","+ tipoReporte +","+ d1 +","+ d2 + "," + nc + "," + cl;
    }else if (tipoReporte==5) {
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
            if (data.length!=0) {
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
                            "bPaginate": true,
                            "paging": true,
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
                        $.each(item['array_1'], function(i, item) {
                            $('#idTemporal').val(item['IdUser']);
                            $('#nombreUsuario').text(item['nombre']);
                            $('#usuario').text(item['usuario']);
                            $('#HC').text(moment(item['tiempoON'], ["h:mm:ss"]).format("HH:mm:ss"));
                            $('#TP').text(moment(item['tiempoPAUSA'], ["h:mm:ss"]).format("HH:mm:ss"));
                            $('#TT').text(moment(item['tiempoTotal'], ["h:mm:ss"]).format("HH:mm:ss"));
                        });
                        $('#tblDetalleConexion').DataTable({                     
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
                                { "data": "FechaInicio", render: function (data) {
                                    data = moment(data).format('DD/MM/YYYY h:mm A');
                                    return data;
                                } },
                                { "data": "FechaFinal", render: function (data) {
                                    data = moment(data).format('DD/MM/YYYY h:mm A');
                                    return data;
                                } },
                                { "data": "Tiempo_Total" },
                                { "data": "Tipo" }
                            ]
                        });

                    }else if (tipoReporte==3) {
                        $.each(JSON.parse(data), function(i, item) { 
                            $('#nombreCliente').text(item['nombre']);
                            $('#direccion').text(item['direccion']);
                            $('#idTemporal').val(item['idCliente']);
                        });
                        
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
                            "columnDefs": [
                                {
                                    "targets": [ 4, 5,6,7,8,9 ],
                                    "visible": false
                                }
                            ],
                            columns: [
                                { "data": "campania" },
                                { "data": "monto", render: $.fn.dataTable.render.number( ',', '.', 2 )},
                                { "data": "meta", render: $.fn.dataTable.render.number( ',', '.', 2 )},
                                { "data": "unidad" },
                                { "data": "nombre" },
                                { "data": "direccion" },
                                { "data": "telefono1" },
                                { "data": "telefono2" },
                                { "data": "Telefono3" },
                                { "data": "idCliente" },
                                { "data": "agente" },
                                { "data": "cantllamadas" }
                            ]
                        });
                    }else if (tipoReporte==4) {
                        $('#tblGeneral').DataTable({              
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
                                { "data": "idCliente", },
                                { "data": "nombre" },
                                { "data": "recuperado", render: $.fn.dataTable.render.number( ',', '.', 2 )},
                                { "data": "real1", render: $.fn.dataTable.render.number( ',', '.', 2 )},
                                { "data": "cantLlamadas" }
                            ]
                        });
                    }else if (tipoReporte==5) {
                        $('#pgr').show();
                        var monto=0;
                        $('#tltLlamadas').text('');
                        $('#tltLlamadasPlt').text('');                        
                        $('#tltMinutosPlt').text('');
                        $('#tltMinutos').text('');
                        $('#tltReal').text('');

                        $.each(item['array_1'], function(i, item){
                            $('#tltMinutos').text(item['tt']);
                            monto=monto+parseFloat(item['Monto']);                                 
                        });

                        $('#tltLlamadas').text(item['array_1'].length);
                        $('#tltLlamadasPlt').text(item['array_2'].length);
                        $('#tltMinutosPlt').text(item['tiempoTotal']);
                        $('#tltReal').text(monto.toLocaleString("en-US"));
                        
                        $('#tblRegLllamadas').DataTable({
                            "destroy": true,
                            "data": item['array_1'],
                            "bFilter": true,
                            "scrollCollapse": true,
                            "info":    false,
                            "lengthMenu": [[5,10,20,30,-1], [5,10,20,30,"Todo"]],
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
                            },
                               "columnDefs": [
                                    {
                                        "targets": [ 0,8 ],
                                        "visible": false
                                    }
                                ],
                            columns: [
                                { "data": "IdUser" },
                                { "data": "EXT" },
                                { "data": "Nombre" },
                                { "data": "Fecha", render: function (data) {
                                    data = moment(data).format('DD/MM/YYYY');
                                    return data;
                                } },
                                { "data": "Hora", render: function (data) {
                                    data = moment(data, ["h:mm:ss"]).format("h:mm A");
                                    return data;
                                } },
                                { "data": "Num_CLI" },
                                { "data": "Duracion" },
                                { "data": "Monto", render: $.fn.dataTable.render.number( ',', '.', 2 ) },
                                { "data": "tt" }
                            ]
                        });

                        $('#tblRegLllamadasPlanta').DataTable({            
                            "destroy": true,
                            "data": item['array_2'],
                            "bFilter": true,
                            "scrollCollapse": true,
                            "info":    false,            
                            "lengthMenu": [[5,10,20,30,-1], [5,10,20,30,"Todo"]],
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
                            },
                               "columnDefs": [
                                    {
                                        "targets": [ 5 ],
                                        "visible": false
                                    }
                                ],
                            columns: [
                                { "data": "ORIGEN" },
                                { "data": "FECHA", render: function (data) {
                                    data = moment(data).format('DD/MM/YYYY');
                                    return data;
                                } },
                                { "data": "Hora", render: function (data) {
                                    data = moment(data, ["h:mm:ss"]).format("h:mm A");
                                    return data;
                                } },
                                { "data": "DESTINO" },
                                { "data": "DURACION" },
                                { "data": "TIPO" }
                            ]
                        });
                        $('#pgr').hide();
                    };
                });
            }else if (data.length===0) {
                limpiarControles(tipoReporte);
            }
        }
    });
}

function imprimirRpt() {
    var tipoRpt = $('#val').val();
    var val = $('#idTemporal').val();
    var d1="", d2="";

    if ($('#desde').val()=="" && $('#hasta').val()=="") {
        d1= moment(new Date('2017-01-01')).format('YYYY-MM-DD 00:00:00');
        d2= moment(new Date()).format('YYYY-MM-DD 23:59:59');
    }else {
        d1 = moment($('#desde').val()).format('YYYY-MM-DD 00:00:00');
        d2 = moment($('#hasta').val()).format('YYYY-MM-DD 23:59:59');
    }

    if (tipoRpt==1) {        
        window.open("../generarPDF?tipo=rptcampania&id="+val+" ", '_blank');
    }else if (tipoRpt==2) {
        window.open("../generarPDF?tipo=rptagentes&id="+val+"&f1="+d1+"&f2="+d2+" ", '_blank');
    }else if (tipoRpt==3) {
        nc = $('#campania').val();
        window.open("../generarPDF?tipo=rptclientes&id="+val+"&nc="+nc+" ", '_blank');
    }else if (tipoRpt==4) {
        ag = $('#selectRpt').val();
        nc = $('#campania').val();
        cl = $('#cliente').val();
        window.open("../generarPDF?tipo=rptllamadas&id="+ag+"&f1="+d1+"&f2="+d2+"&nc="+nc+"&cl="+cl+" ", '_blank');
    }else if (tipoRpt==5) {
        id=$('#selectRpt2').val()
        window.open("../generarPDF?tipo=rptregllamadas&id="+id+"&f1="+d1+"&f2="+d2+" ", '_blank');
    };
}

function limpiarControles(identificador) {
    if (identificador==1) {
        $('#idTemporal').val('');
        $('#tituloCampania').text('');
        $('#fechasCampania').text('');
        $('#monto').text('');
        $('#real').text('');
        $('#observacion').val('');
        $('#mensaje').val('');
        $('#totalLlamada').text('');
        $('#tiempoTotal').text('');
        $('#tiempoPromedio').text('');
        $('#unidades').text('');
         
        $('#tblClienteRpt').DataTable()
            .clear()
            .draw();
    }else if (identificador==2) {
        $('#idTemporal').val('');
        $('#nombreUsuario').text('');
        $('#usuario').text('');
        $('#HC').text('');
        $('#TP').text('');
        $('#TT').text('');
    }else if (identificador==3) {
        $('#nombreCliente').text('');
        $('#direccion').text('');
        $('#idTemporal').val('');

        $('#tblClientes').DataTable()            
            .clear()
            .draw();
    }else if (identificador==4) {
        $('#tblGeneral').DataTable()
        .clear()
        .draw();
    }else if (identificador==5) {
        $('#cantLlamadas').text(0);
        $('#tblRegLllamadas').DataTable()
        .clear()
        .draw();
    }
}
</script>