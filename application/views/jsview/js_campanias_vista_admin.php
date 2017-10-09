<script>
	$(document).ready(function() {
    
    $('ul.tabs').tabs();
    
    $('.date').mask('00/00/0000');

    $('#tblcampaniasVA').DataTable( {
        initComplete: function () {
            this.api().columns().every( function () {                      
                var column = this;
                var select = $('<select id="column'+column[0]+'"><option value="">TODOS</option></select>')
                    .appendTo( $('#tableCampaniasVA .dataTables_wrapper .dataTables_filter' ))

                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()                            
                        );                       
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                        } )                
                    column.data().unique().sort().each( function ( d, j ) {
                              
                    select.append( '<option value="'+d+'">'+d+'</option>' );
                } );
                
            } );

        }, 
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
    } );

    var pathname = window.location.pathname;
    if (pathname.match(/detallesVA.*/)) {
        $("#menu ul li").each(function(){
            var pos = $(this).attr("id");
            if ($(this).attr("id")==pos) {
                $("#"+pos+" a").attr("href", "../"+pos+"");
            }
        })

        var numCampaniaGlobal = $('#numCampania').val();

        var grafica = {

            chart: {
                type: 'line',
                renderTo: 'container-grafica'
            },
            title: {
                text: 'META - REAL'
            },
            subtitle: {
                text: ''
            },
            xAxis: {
                title: {
                    text: ''
                },
                categories: [],
                type: 'datetime',
                dateTimeLabelFormats: {
                    day: '%e of %b'
                }
            },
            yAxis: {
                title: {
                    text: ''
                }                
            },
            tooltip: {
                crosshairs: true,
                shared: true
            },
            plotOptions: {
                spline: {
                    marker: {
                        radius: 4,
                        lineColor: '#666666',
                        lineWidth: 1
                    }
                }
            /*line: {
                dataLabels: {
                    enabled: true
                },
                enableMouseTracking: false
            }*/

            },
            series: [],
        };
        $.getJSON("../metaReal/"+numCampaniaGlobal, function(json) {
            var newseries;

            $.each(json, function (i, item) {
                newseries = {};
                newseries.showInLegend = true;
                newseries.data = item['Data'];
                newseries.name = item['Tipo'];              
                
                grafica.series.push(newseries);
            });
           var chart = new Highcharts.Chart(grafica);
        });

        $.getJSON("../diasGrafica/"+numCampaniaGlobal, function(json) {
            grafica.xAxis.categories = json.name;
            
            var chart = new Highcharts.Chart(grafica);
        });
    }
        $(function() {
            $("ul li").each(function(){
                if($(this).attr("id") == 'campaniasVA')
                $(this).addClass("urlActual");
             })
        });

        //INICIALIZANDO TABLA CLIENTES
        $('#tblDetalleCliente').DataTable({
            "scrollCollapse": true,
            "info":    false,
            "lengthMenu": [[10,20,30,-1], [10,20,30,"Todo"]],
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

	/*CONFIGURACION DE DATEPICKER*/
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
	    format: 'yyyy-mm-dd'
	});

    $('#guardarCampania').click(function() {
        var val = validarControles();
        if (val!=false) {
            /*VARIABLES AGENTES*/
            var tabla = $('#tblAgentes').DataTable();
            var agentesSeleccionados = new Array();
            var pos = 0;

            /*VARIABLES OTROS PARAMETROS*/
            var campania = new Array();
            var ID_Campannas = $('#codigoCampania').val();
            var Nombre = $('#nombreCampania').val();
            var Fecha_Inicio = $('#fechaInicioCampania').val();
            var Fecha_Cierre = $('#fechaFinalCampania').val();
            var Meta = $('#metaEstimada').val();
            var Observaciones = $('#observacionesCamp').val();
            var Mensaje = $('#mensajeCamp').val();
            var ID_Usuario = $('#idUser').val();

            tabla.rows().eq(0).each(function(index) {
                var row = tabla.row(index);
                var data = row.data();
                var idUsuario = data[0];

                if ($('#chkUser'+data[0]).is(':checked')) {            
                    agentesSeleccionados[pos] = ID_Campannas + "," + data[0];
                    pos++;
                }
            });

            campania[0] = ID_Campannas+","+Nombre+","+Fecha_Inicio+","+Fecha_Cierre+","+Meta+","+Observaciones+","+Mensaje+","+ID_Usuario;


            form_data = {
                dataCampania:campania,
                agentes:agentesSeleccionados
            }

            $.ajax({
                url: "guardarDataCampania",
                type: 'post',
                async: true,
                data: form_data,
                success: function(data) {
                    if (data=="true") {
                        $('#formNuevaCampania').submit();
                    }
                }
            }); 
        }            
    });

    function validarControles() {   
        
        var val=true; var cont=0;
        if ($('#codigoCampania').val()=="" || $('#nombreCampania').val()=="" || $('#fechaInicioCampania').val()=="" || $('#fechaFinalCampania').val()=="" || $('#metaEstimada').val()=="" || $('#observacionesCamp').val()=="" || $('#mensajeCamp').val()=="") {  
            mensaje("Todavia no ha rellenado todos los campos","error");
            val=false;
        }else if ($('#dataExcel').val()=="") {
            mensaje("No ha cargado ningun archivo excel","error");
            val=false;
        }
        var tabla = $('#tblAgentes').DataTable();
        tabla.rows().eq(0).each(function(index) {
            var row = tabla.row(index);
            var data = row.data();
            var idUsuario = data[0];

            if ($('#chkUser'+data[0]).is(':checked')) {            
                cont++;
            }
        });

        if (cont==0) {
            mensaje("No ha selecciono ningun agente", "error");
            val=false;
        };
        return val;
    }

function cambiaEstadoCamp(numCampania, nuevoEstado) {
    swal({
        text: "¿Esta seguro de querer cambiar el estado de la campaña?",
        type: 'warning',
        showCloseButton: true,
        confirmButtonColor: '#f44336',
        confirmButtonText: 'ACEPTAR',
        showCancelButton: true,
        cancelButtonText: 'Cancelar',
    }).then(function() {
        $.ajax({
            url: "cambiarEstadoCamp/" + numCampania + "/" + nuevoEstado,
            type: "post",
            async: true,
            success: function(data) {
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

/*RECIBIENDO EVENTO FOCUS*/
$("#metaEstimadaCamp").focus(function(){
    $('#metaEstimadaCamp').mask('000,000,000.00', {reverse: true});
});

/*EDITAR CONTROLES CON ONCHANGE*/
$(document).on('change', '.select', function(){ 
    var nuevaData = new Array();
    var numCampania = $('#numCampania').val();
    var tipoModificacion = 0;
    var valor = '';
    var idControl = $(this).attr('id');
    var valorControl = $(this).val();

    if (idControl=='metaEstimadaCamp') {
        valor = valorControl.replace(/,/g, "");
        tipoModificacion = 3;
    }else if (idControl=='nombreCampania') {
        valor = $('#nombreCampania').val();
        tipoModificacion = 1;
    }else if (idControl=='fechaInicioCamp') {
        valor = $('#fechaInicioCamp').val();
        tipoModificacion = 2;
    }else if (idControl=='fechaCierreCamp') {
        valor = $('#fechaCierreCamp').val();
        tipoModificacion = 4;
    }else if (idControl=='editObservacion') {
        valor = $('#editObservacion').val();
        tipoModificacion = 5;
    }else if (idControl=='editMensaje') {
        valor = $('#editMensaje').val();
        tipoModificacion = 6;
    }

    nuevaData[0] = numCampania+","+valor+","+tipoModificacion;

    form_data = {
        campaniaModificacion:nuevaData
    }
    $.ajax({
        url: "../editarCampaniaVA",
        type: 'post',
        async: true,
        data: form_data,
        success: function(res) {
            if(res=="true") {
                mensaje("Actualizado con éxito", "");
            }
        }
    });    
})

function cargarTablaAgentes(idCampania) {
    $('#tblAdmAgentes').DataTable({
        ajax: "cargaAgentesCampania/" + idCampania,
        "destroy": true,
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
            { "data": "ACTIVO" },
            { "data": "NOMBRE" }
        ]
    });
}

function cargarTablaClientes(idCampania) {
    $('#tblAdmClientes').DataTable({
        ajax: "cargaClientesCampania/" + idCampania,     
        "destroy": true,
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
            { "data": "ACTIVO" },
            { "data": "NOMBRE" }
        ]
    });
}


function editarCampania(idCampania) {
    var control = 'numcamp'+idCampania;
    cargarTablaClientes(idCampania);
    cargarTablaAgentes(idCampania);
    $('#'+control).click(function() { $("#modalEditarCamp").openModal(); });
}


</script>