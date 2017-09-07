<script>
    $(document).ready(function() {
        $("#USN,#USI").hide();
        localStorage.setItem("uNombre", $("#USI").text());
        localStorage.setItem("uId", $("#USN").text());

        if (localStorage.getItem("EnLinea")=== "true"){firebase.database().ref("USUARIOS").child(localStorage.getItem("uNombre")).update({EnLinea : 1});}

        $('#tblcampanias,#tbl_camp_cliente').DataTable({
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

        $("#cModal").click(function() {$("#outCall").openModal();});
        if (localStorage.getItem("EnLinea")=== "true" || localStorage.getItem("EnLinea")=== null) {
            localStorage.setItem("FechaInicio", getDate());
            localStorage.setItem("EnLinea", false);
            live()
        }else{
            live();
        }
        function live(){
            control = setInterval(function(){
                $('#ttCall').text(Cal_Date(localStorage.getItem("FechaInicio"),getDate()));
            },10);
        }


        intFirebase = setInterval(function(){
            Ear_Eyes_Of_God(
                localStorage.getItem("FechaInicio"),
                getDate(),
                Cal_Date(localStorage.getItem("FechaInicio"),getDate()),
                localStorage.getItem("uNombre"),
                localStorage.getItem("uId")
            );
        },30000);



        firebase.database().ref("USUARIOS").on('child_changed', function(data) {
            if (data.key==localStorage.getItem("uNombre")){
                clearInterval(control);
                clearInterval(intFirebase);

                if (data.val().EnLinea==2){
                    $('#mTiempoFuera').openModal({dismissible:false});
                    localStorage.setItem("Incio_Descanso",getDate());
                }else{
                    $('#mTiempoFuera').closeModal();
                    location.reload();
                }

                Interval_pausa = setInterval(function(){
                    $('#ttPausa').text(Cal_Date(localStorage.getItem("Incio_Descanso"),getDate()));
                },10);
            }
        });


        Highcharts.chart('container-grafica', {
            chart: {
                type: 'line'
            },
            title: {
                text: ''
            },
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
            },
            series: [{
                name: 'META',
                data: [7.0, 6.9, 9.5, 14.5, 18.4, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
            },
                {
                    name: 'REAL',
                    data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
                }]
        });

    });


    Ear_Eyes_Of_God(
        localStorage.getItem("FechaInicio"),
        getDate(),
        Cal_Date(localStorage.getItem("FechaInicio"),getDate()),
        localStorage.getItem("uNombre"),
        localStorage.getItem("uId")
    );



    function Ear_Eyes_Of_God(Init,End,isTime,id,name) {
        firebase.database().ref("USUARIOS").child(id).update({
            Agente: id,
            FechaInicio: Init,
            FechaFin: End,
            ttTrabajo:isTime,
            ttEnPausa:"",
            Nombre:name,
            Camp:"camp"
        });
        firebase.database().ref("USUARIOS").child(id).once('value', function(snapshot) {
            if (snapshot.val().EnLinea==2){
                $('#mTiempoFuera').openModal({
                    dismissible:false
                });
                Interval_pausa = setInterval(function(){
                    $('#ttPausa').text(Cal_Date(localStorage.getItem("Incio_Descanso"),getDate()));
                },10);
            }else{
                $('#mTiempoFuera').closeModal();
            }
        });


    }

    function Close_Eyes_Of_God(id) {
        firebase.database().ref("USUARIOS").child(id).update({
            EnLinea : 0,
            FechaInicio: localStorage.getItem("FechaInicio"),
            FechaFin: getDate(),
            ttTrabajo:$('#ttCall').text()

        });
    }

    function Death() {
        clearInterval(control);
        clearInterval(intFirebase);
        localStorage.setItem("EnLinea", true);
        Close_Eyes_Of_God(localStorage.getItem("uNombre"));
        $('#ttCall').text("00:00:00");
        window.location.href = "salir"
    }

    function getDate(){
        var hoy = new Date();
        var dd = hoy.getDate(),mm = hoy.getMonth()+1,yyyy = hoy.getFullYear();
        var h = hoy.getHours(),i = hoy.getMinutes(),s=hoy.getSeconds();
        if(dd<10) {dd='0'+dd}
        if(mm<10) {mm='0'+mm}
        if(h<10) {h='0'+h}
        if(i<10) {i='0'+i}
        if(s<10) {s='0'+s}
        hoy = dd+'-'+mm+'-'+yyyy+ ' ' + h +':'+i+':'+s;
        return hoy;
    }

    function Cal_Date(DateInit,DateNow){
        return(moment.utc(moment(DateNow,"DD-MM-YYYY HH:mm:ss").diff(moment(DateInit,"DD-MM-YYYY HH:mm:ss"))).format("HH:mm:ss"));
    }

    function cOut(){
        swal({
            title: '¿Desea Salir del sistema?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si',
            cancelButtonText: 'No'
        }).then(function () {
            Death();

        })
    }

    $("#cModal").click(function() { $("#outCall").openModal(); });






</script>