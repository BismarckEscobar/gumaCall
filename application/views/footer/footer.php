
<div id="footer-f">
    <?php echo "Copyright © GCIT ".date("Y")." Todos los Derechos Reservados."?>
</div>
<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="<?PHP echo base_url();?>assets/js/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="<?PHP echo base_url();?>assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?PHP echo base_url();?>assets/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="<?PHP echo base_url();?>assets/js/extensions/dataTables.colVis.min.js"></script>
<script type="text/javascript" src="<?PHP echo base_url();?>assets/js/extensions/dataTables.tableTools.min.js"></script>
<script type="text/javascript" charset="utf8" src="<?PHP echo base_url();?>assets/js/sweetalert2.min.js"></script>
<script type="text/javascript" src="<?PHP echo base_url();?>assets/js/jquery.mask.min.js" > </script>

<script src="<?PHP echo base_url();?>assets/js/JS.js"></script>
<script src="<?PHP echo base_url();?>assets/js/material.min.js"></script>
<script src="<?PHP echo base_url();?>assets/js/materialize.js"></script>

<script src="<?PHP echo base_url(); ?>assets/js/moment.min.js"></script>

<script src="<?PHP echo base_url();?>assets/js/chosen.jquery.js"></script>

<!-- Calendar Script -->
<script type="text/javascript" src="<?PHP echo base_url();?>assets/plugins/fullcalendar/moment.min.js"></script>
<script type="text/javascript" src="<?PHP echo base_url();?>assets/plugins/fullcalendar/js/fullcalendar.min.js"></script>
<script type="text/javascript" src = "<?PHP echo base_url();?>assets/plugins/fullcalendar/js/lang/es.js" > </script>

<!--Graficas script-->
<script src="<?PHP echo base_url();?>assets/js/highcharts.js"></script>
<script src="<?PHP echo base_url();?>assets/js/highcharts-3d.js"></script>
<script src="<?PHP echo base_url();?>assets/js/exporting.js"></script>

<!--LIB FIREBASE-->
<script src="<?PHP echo base_url();?>assets/js/firebase.js"></script>
<script>
    // Initialize Firebase
    var config = {
        apiKey: "AIzaSyDnuE40zAu7qF0M65kouPjbCjzFZVNhqvg",
        authDomain: "gumacall-ded24.firebaseapp.com",
        databaseURL: "https://gumacall-ded24.firebaseio.com",
        projectId: "gumacall-ded24",
        storageBucket: "",
        messagingSenderId: "129396558794"
    };
    firebase.initializeApp(config);
</script>
<!--Script para el reloj superior-->
<script src="<?PHP echo base_url();?>assets/js/reloj.js"></script>

<script>
    $('.datepicker1').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 15, // Creates a dropdown of 15 years to control year
        format: 'dd-mm-yyyy',// Formats dateformat:dd/mm/yyyy
        monthsFull: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        monthsShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
        weekdaysFull: ['DO','LU','MA','MI','JU','VI','SA'],
        weekdaysShort: ['D', 'L', 'M', 'M', 'J', 'V', 'S'],
        //showMonthsShort: true,
        showWeekdaysFull: true,
        today: 'Hoy',
        clear: 'Borrar',
        close: 'Cerrar'
    });
    
    var config = {
        '.chosen-select': {}
    }
    for (var selector in config) {
        $(selector).chosen(config[selector]);
    }

    function ModalInfo()
    {
        $("#modalAbout").openModal();
    }
</script>
</body>
</html>