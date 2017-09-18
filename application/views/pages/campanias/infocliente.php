<?php

$ID =(!$My_camp_Header[0]['ID_Campannas']) ? 0 :$My_camp_Header[0]['ID_Campannas'];
$Nombre =(!$My_camp_Header[0]['Nombre']) ? 0 :$My_camp_Header[0]['Nombre'];
$Monto =(!$My_camp_Header[0]['MONTO_REAL']) ? 0 :$My_camp_Header[0]['MONTO_REAL'];
$Fecha_Inicio =(!$My_camp_Header[0]['Fecha_Inicio']) ? 0 :$My_camp_Header[0]['Fecha_Inicio'];
$Fecha_Cierre =(!$My_camp_Header[0]['Fecha_Cierre']) ? 0 :$My_camp_Header[0]['Fecha_Cierre'];
$Mensaje =(!$My_camp_Header[0]['Mensaje']) ? 0 :$My_camp_Header[0]['Mensaje'];
$Meta =(!$My_camp_Header[0]['Meta']) ? 0 :$My_camp_Header[0]['Meta'];

$Real_Cliente =(!$My_camp_Clientes[0]['Real']) ? 0 :$My_camp_Clientes[0]['Real'];
$Meta_Cliente =(!$My_camp_Clientes[0]['Meta']) ? 0 :$My_camp_Clientes[0]['Meta'];
$T1 =(!$My_camp_Clientes[0]['Telefono1']) ? 0 :$My_camp_Clientes[0]['Telefono1'];
$T2 =(!$My_camp_Clientes[0]['Telefono2']) ? 0 :$My_camp_Clientes[0]['Telefono2'];
$T3 =(!$My_camp_Clientes[0]['Telefono3']) ? 0 :$My_camp_Clientes[0]['Telefono2'];
$UID =(!$My_camp_Clientes[0]['ID_Cliente']) ? 0 :$My_camp_Clientes[0]['ID_Cliente'];
$UNA =(!$My_camp_Clientes[0]['Nombre']) ? 0 :$My_camp_Clientes[0]['Nombre'];
?>
<header class="demo-header mdl-layout__header ">
    <div class="row center ColorHeader"><span class=" title">N° <span id="spCamp"><?php echo $ID ?></span> - <?php echo $Nombre ?></span>
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



        <div class="row">
            <div class="col s12 m12" >
                <div class="card hoverable " ><br>
                    <div class="row">
                        <div class="input-field col s3">
                            <input value="<?php echo $Fecha_Inicio;?>" id="icon_DateInit" type="text" class="center validate">
                            <label for="icon_DateInit" class="left">FECHA DE INICIO</label>
                        </div>
                        <div class="input-field col s3">
                            <input value="<?php echo $Fecha_Cierre;?>" id="icon_DateEnd" type="text" class="center validate">
                            <label for="icon_DateInit" class="left">FECHA CIERRE</label>
                        </div>
                        <div class="input-field col s3">
                            <input id="icon_DateEnd" value="C$ <?php echo number_format($Meta,2);?>" type="text" class=" center validate">
                            <label for="icon_DateInit" class="left">META ESTIMADA</label>
                        </div>
                        <div class="input-field col s3">
                            <input id="icon_DateEnd" value="C$ <?php echo number_format($Monto,2);?>" type="text" class="center validate">
                            <label for="icon_DateInit" class="left">REAL</label>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="card hoverable" >
                    <div class="card-content">
                        <span class="card-title left">MENSAJE</span><br><br><br>
                        <div class="row" style="text-align: left">
                            <p>
                                <?php echo $Mensaje?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card hoverable">
                <div class="card-content">
                        <span class="card-title center"><span id="clienteLlamado"><?php echo $UID ?></span> - <?php echo $UNA ?></span><br><br><br>
                    <div class="row">
                        <div class="input-field col s3">
                            <input value="<?php echo $T1?>" id="icon_DateInit" type="text" class="center validate">
                            <label for="icon_DateInit" class="left">TELEFONO 1</label>
                        </div>
                        <div class="input-field col s3">
                            <input value="<?php echo $T3?>" id="icon_DateEnd" type="text" class="center validate">
                            <label for="icon_DateInit" class="left">TELEFONO 2</label>
                        </div>
                        <div class="input-field col s2">
                            <input id="icon_DateEnd" value="<?php echo $T3?>" type="text" class=" right validate">
                            <label for="icon_DateInit" class="left">TELEFONO 3</label>
                        </div>
                        <div class="input-field col s2">
                            <input id="icon_DateEnd" value="C$ <?php echo number_format($Meta_Cliente,2);?>" type="text" class="right validate">
                            <label for="icon_DateInit" class="left"">META</label>
                        </div>
                        <div class="input-field col s2">
                            <input id="icon_DateEnd" value="C$ <?php echo number_format($Real_Cliente,2);?>" type="text" class="right validate">
                            <label for="icon_DateInit" class="left"">REAL</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card hoverable ">
                <div class="card-content">
                    <div class="row valign-wrapper">
                        <div class="col s6" >
                            <a href="#" id="btn-comenzar" class="BtnBlue waves-effect btn modal-trigger">INICIAR</a>
                        </div>
                        <div class="col s6 " >
                               <label id="Kronos" class="sKronos center-align">00:00:00:00</label>
                        </div>

                    </div>
                </div>
            </div>
                <div class="card">
                    <div class="card-tabs">
                        <ul class="tabs tabs-fixed-width">
                            <li class="tab"><a class="active" href="#tb1">HISTORIAL DE COMPRAS</a></li>
                            <li class="tab"><a  href="#tb2">DATOS CLIENTES</a></li>
                        </ul>
                    </div>
                    <div class="card-content grey lighten-4">
                        <div id="tb1">
                            <table id="tbl_camp_cliente" class="TblData">
                                <thead>
                                <tr>
                                    <th>ARTICULO</th>
                                    <th>DESCRIPCION</th>
                                    <th>FECHA</th>
                                    <th>CANTIDAD</th>
                                </tr>
                                </thead>
                                <tbody class="center">
                                <?php

                                if(!$query){
                                }else{
                                    $i=0;
                                    foreach ($query as $Hst){
                                        echo "<tr>
                                            <td>".$query[$i]["ARTICULO"]."</td>
                                            <td>".$query[$i]["DESCRIPCION"]."</td>
                                            <td>".$query[$i]["FECHA"]."</td>
                                            <td>".$query[$i]["CANTIDAD"]."</td>
                                        </tr>";
                                        $i++;

                                    }

                                }
                                ?>

                                </tbody>
                            </table>
                        </div>
                        <div id="tb2">
                            <div class="row">
                                <div class="input-field col s6">
                                    <input class="left" value="<?php echo $query2[0]['DIRECCION'];?>" id="icon_DateInit" type="text" class="center validate">
                                    <label for="icon_DIR" class="left">DIRECCION</label>
                                </div>

                                <div class="input-field col s6">
                                    <input id="icon_RUC" class="left" value="<?php echo $query2[0]['RUC']?>" type="text" class=" right validate">
                                    <label for="icon_RUC" class="left">RUC</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s3">
                                    <input value="C$ <?php echo number_format($query2[0]['CREDITO'],2);?>" id="icon_DateInit" type="text" class="right validate">
                                    <label for="icon_CREDITO" class="left">CREDITO</label>
                                </div>
                                <div class="input-field col s3">
                                    <input value="C$ <?php echo number_format($query2[0]['SALDO'],2);?>" id="icon_DateEnd" type="text" class="right validate">
                                    <label for="icon_SALDO" class="left">SALDO</label>
                                </div>
                                <div class="input-field col s6">
                                    <input id="icon_DISPONIBLE" value="C$ <?php echo number_format($query2[0]['DISPONIBLE'],2);?>" type="text" class=" right validate">
                                    <label for="icon_DISPONIBLE" class="left">DISPONIBLE</label>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    </div>
</main>
<div id="mTiempoFuera" class="modal">
    <div class="modal-content">
        <h2 class="center sKronos"  id="ttPausa">00:00:00</h2>
    </div>
</div>
<div id="outCall" class="modal">
    <div class="modal-content"><br>
        <div class="row center">
            <span class="titulosModales">RESULTADO DE LLAMADA</span>
        </div>
        <form id="formNuevoUsuario" action="<?PHP echo base_url('index.php/agregarUsuario');?>" method="post" name="formNuevoUsuario">
            <div class="row">
                <div class="row">
                    <div class="input-field offset-l1 col s12 m12 l10 ">
                        <select class="chosen-select browser-default" id="frm_TPF">
                            <option value="" disabled selected><span>SELECCIONAR UN RESULTADO</span></option>
                            <?php
                                if(!$lst_TPF){}
                                else{
                                        foreach($lst_TPF as $lst){
                                            echo '<option value="'.$lst['ID_TPF'].'">'.$lst['Tipificacion'].'</option>';                                
                                    }
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field offset-l1 col s12 m12 l10 ">
                        <input id="frm_Monto" type="text" class="validate">
                        <label for="frm_Monto">MONTO VENDIDO</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field offset-l1 col s12 m12 l10 ">
                        <textarea id="frm_comentario" class="materialize-textarea"></textarea>
                        <label for="frm_comentario">COMENTARIOS</label>
                </div>
            </div>
        </form><br><br><br>
        <div class="row center">
            <a id="id_Guardar_llamada" class="BtnBlue waves-effect btn modal-trigger">OK</a>
            <a id="cancelarProceso" class="modal-action modal-close BtnBlue waves-effect btn modal-trigger">CANCELAR</a>
        </div>
    </div>
</div>
</div>
</div>