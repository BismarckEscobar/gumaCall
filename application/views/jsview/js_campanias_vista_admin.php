<script>
	$(document).ready(function() {
		$('#tblcampaniasVA').DataTable({
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
                    console.log(data);
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

    function graficas() {
        Highcharts.chart('container-grafica', {
            chart: {
                type: 'line'
            },
            title: {
                text: ''
            },
            xAxis: {
                //categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
            },
            series: [{
                name: 'META',
                data: [7.0, 6.9, 9.5, 14.5, 18.4, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
                }, {
                name: 'REAL',
                data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
                }]
        });     
    }
</script>