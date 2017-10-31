<header class="demo-header mdl-layout__header ">
    <div class="row center ColorHeader">
        <div class="container_reloj">
            <div class="clock">
                <ul class="ul_r">
                    <li id="hours"></li>
                    <li id="point">:</li>
                    <li id="min"></li>
                    <li id="type"></li>
                </ul>
            </div>
        </div>
    </div>
</header>

<main class="mdl-layout__content mdl-color--grey-100">
    <div class="contenedor">

        <span id="USI"><?php echo $this->session->userdata('UserN');?></span>
        <span id="USN"><?php echo $this->session->userdata('UserName');?></span>
        <div class="noMargen row TextColor center"><div class="col s12 m8 l12 offset-m1">MIS CAMPAÑAS ASIGNADAS</div></div>
        <div class="row" id="monitoreo1">
            <table id="tblcampanias" class="TblData">
                <thead>
                <tr>
                    <th>Nº CAMPAÑA</th>
                    <th>FECHA INCIO</th>
                    <th>FECHA CIERRE</th>
                    <th>NOMBRE</th>
                    <th>META</th>
                    <th>REAL</th>
                    <th>OBSERVACIóN</th>
                </tr>
                </thead>
                <tbody class="center">
                <?php
                if(!$My_camp){}
                else{
                    foreach($My_camp as $lst){
                        echo '
                        <tr>
                            <td><a href="#" onclick="getDetalles('."'".$lst['ID_Campannas']."'".')">'.$lst['ID_Campannas'].'</a></td>
                            <td>'.$lst['Fecha_Inicio'].'</td>
                            <td>'.$lst['Fecha_Cierre'].'</td>
                            <td>'.$lst['Nombre'].'</td>
                            <td>C$: '.number_format($lst['Meta'],2).'</td>
                            <td>C$: '.number_format($lst['Real'],2).'</td>
                            <td>'.$lst['Observaciones'].'</td>
                        </tr>
                        ';
                    }
                }
                ?>


                </tbody>
            </table>
        </div>
    </div>
</main>

<div id="mTiempoFuera" class="modal">
    <div class="modal-content">
        <center><img src="<?php echo base_url(); ?>assets/img/icono_reloj.gif" style="width: 150px"></center><br>
        <center><h2 class='titulosModales'>en PAUSA</h2></center>
        <h2 class="center sKronos" id="ttPausa">00:00:00</h2>
    </div>
</div>