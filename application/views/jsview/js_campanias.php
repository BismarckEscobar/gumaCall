<script>
    $(document).ready(function() {
        $("#USN,#USI").hide();

        var frm_Kronos =$("#Kronos");

        localStorage.setItem("uNombre", $("#USI").text());
        localStorage.setItem("uId", $("#USN").text());

        if (localStorage.getItem("EnLinea")=== "true"){
            firebase.database().ref("USUARIOS").child(localStorage.getItem("uNombre")).update({
                EnLinea : 1
            });
        }

        /*INICIO DE CRONOMETRO DE LLAMADA*/
        var Kronos_Run = null;
        $("#btn-comenzar").click(function(){
            var tiempo = {hora: 0,minuto: 0,segundo: 0,centesimas:0};
            if ( $(this).text() == 'INICIAR' ){
                $(this).text('FINALIZAR'); 
                    Kronos_Run = setInterval(function(){
                    tiempo.centesimas++;
                     if(tiempo.centesimas >= 100){
                        tiempo.centesimas = 0;
                        tiempo.segundo++;
                    } 
                    if(tiempo.segundo >= 60){
                        tiempo.segundo = 0;
                        tiempo.minuto++;
                    }      

                    if(tiempo.minuto >= 60){
                        tiempo.minuto = 0;
                        tiempo.hora++;
                    }
                    Hrs = tiempo.hora < 10 ? '0' + tiempo.hora : tiempo.hora;
                    Min = tiempo.minuto < 10 ? '0' + tiempo.minuto : tiempo.minuto;
                    Seg = tiempo.segundo < 10 ? '0' + tiempo.segundo : tiempo.segundo;
                    Cen = tiempo.centesimas < 10 ? '0' + tiempo.centesimas : tiempo.centesimas

                   frm_Kronos.text(Hrs+":"+Min+":"+Seg+":"+Cen);

             },10);
            }else{
                $(this).text('INICIAR');
                clearInterval(Kronos_Run);               
                $('#outCall').openModal({
                    dismissible:false
                });

            }
        });
        /*FIN DE CRONOMETRO DE LLAMADA*/
        /*INICIO DE GUARDADO DE LLAMADA*/
        $("#id_Guardar_llamada").click(function(){ 
            var Frm_Datos = {
                TPF: $("#frm_TPF").val(),
                Monto:  $("#frm_Monto").val(),
                Coment:  $("#frm_comentario").val(),
                TimeInCall:frm_Kronos.text()
            };

            $.ajax({
                url: "Guardar_llamada",
                type: "post",
                async:true,
                data: Frm_Datos,
                success:
                    function(WTF){
                        if(WTF > 0){
                            swal({
                                title: 'Informacion Guardada',
                                timer: 2000
                            }).then(
                                function () {},
                                // handling the promise rejection
                                function (dismiss) {
                                    window.location.href = "detalles";
                                }
                            )

                        }else{
                            swal({
                                title: 'Ooopp!!',
                                text: "Algo salio mal, Contacte al Administrado.",
                                type: 'warning',
                                showCancelButton: false
                            });
                        }
                    }
            });
        });
        /*FIN DE CRONOMETRO DE LLAMADA*/


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
            Camp:"PROMOCION RAMOS ADOSTO 2017"
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


    function Cal_Date(DateInit,DateNow){
        return(moment.utc(moment(DateNow,"DD-MM-YYYY HH:mm:ss").diff(moment(DateInit,"DD-MM-YYYY HH:mm:ss"))).format("HH:mm:ss"));
    }


    });
    function Death() {
        clearInterval(control);
        clearInterval(intFirebase);
        localStorage.setItem("EnLinea", true);
        Close_Eyes_Of_God(localStorage.getItem("uNombre"));
        $('#ttCall').text("00:00:00");
        window.location.href = "salir"
    }
    function Close_Eyes_Of_God(id) {
        firebase.database().ref("USUARIOS").child(id).update({
            EnLinea : 0,
            FechaInicio: localStorage.getItem("FechaInicio"),
            FechaFin: getDate(),
            ttTrabajo:$('#ttCall').text()

        });
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

    /*INICIO DE LOS DETALLES DE LA CAMPAÑA*/
    function getDetalles(id){
        window.location.href = "detalles/"+id


    };
    /*FINDE LOS DETALLES DE LA CAMPAÑA*/



</script>