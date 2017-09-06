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
                if (parseInt(childData.isConect)==0){
                    color = "red";
                    estado="RETOMAR";
                }else{
                    color = "green";
                    estado="PAUSAR";
                }
                $("#monitoreo").append('' +
                    '<div class="col s12 m3">'+
                    '<div class="card hoverable '+color+'">'+
                    '<div class="card-content white-text">' +
                    '<span class="card-title">AGENTE: </span>'+
                    '<h1 class="center">'+childKey+'</h1>'+
                    '</div>'+
                    '<div class="card-action">'+
                    "<a class='waves-effect waves-light btn' onclick='updateEyes("+'"'+childKey+'"'+")'>"+estado+"</a>"+
                    '<div>'+
                    '</div>'+
                    '</div>');
                sac++;

            });
        });
    }
    function updateEyes(ID){

        swal({
            title: '¿Desea pausar a este Agente?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si',
            cancelButtonText: 'No'
        }).then(function () {
            firebase.database().ref("USUARIOS").child(ID).update({isConect : 0});
            window.location.href = "Monitoreo";
        })

    }

</script>