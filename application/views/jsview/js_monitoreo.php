<script>
    $(document).ready(function() {
        Eyes();
    });
    function Eyes(){
        var sac=1;
        firebase.database().ref("USUARIOS").once('value', function(snapshot) {
            snapshot.forEach(function(childSnapshot) {
                var childKey = childSnapshot.key;
                var childData = childSnapshot.val();



                switch(childData.EnLinea)
                {
                    case 2:
                        color = "red";
                        estado="RETOMAR";
                        EsPausa=1;
                        break;
                    case 1:
                        color = "green";
                        estado="PAUSAR";
                        EsPausa=2;
                        break;
                    case 0:
                        color = "grey";
                        estado="-";
                        EsPausa=0;
                        EsPausa=0;
                        break;
                }

                if (childData.EnLinea===0) {
                    btn = "";
                }else{
                    btn = "<a class='waves-effect waves-light btn' onclick='updateEyes("+'"'+childKey+'"'+','+EsPausa+")'>"+estado+"</a>";
                }


                $("#monitoreo").append('' +
                    '<div class="col s12 m3">'+
                    '<div class="card hoverable '+color+'">'+
                    '<div class="card-content white-text">' +
                    '<span class="card-title">AGENTE: </span>'+
                    '<h1 class="center">'+childKey+'</h1>'+
                    '</div>'+
                    '<div class="card-action">'+btn+'<div>'+
                    '</div>'+
                    '</div>');
                sac++;

            });
        });
    }
    function updateEyes(ID,Estado){

        swal({
            title: '¿Desea pausar a este Agente?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si',
            cancelButtonText: 'No'
        }).then(function () {
            firebase.database().ref("USUARIOS").child(ID).update({EnLinea : Estado});
            window.location.href = "Monitoreo";
        })

    }

</script>