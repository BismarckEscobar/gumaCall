<?php

$ID =(!$My_camp_Header[0]['ID_Campannas']) ? 0 :$My_camp_Header[0]['ID_Campannas'];
$Nombre =(!$My_camp_Header[0]['Nombre']) ? 0 :$My_camp_Header[0]['Nombre'];
$Monto =(!$My_camp_Header[0]['MONTO_REAL']) ? 0 :$My_camp_Header[0]['MONTO_REAL'];
$Fecha_Inicio =(!$My_camp_Header[0]['Fecha_Inicio']) ? 0 :$My_camp_Header[0]['Fecha_Inicio'];
$Fecha_Cierre =(!$My_camp_Header[0]['Fecha_Cierre']) ? 0 :$My_camp_Header[0]['Fecha_Cierre'];
$Mensaje =(!$My_camp_Header[0]['Mensaje']) ? 0 :$My_camp_Header[0]['Mensaje'];
$Meta =(!$My_camp_Header[0]['Meta']) ? 0 :$My_camp_Header[0]['Meta'];


$Real_Cliente =(!$My_camp_Clientes1[0]['Real']) ? 0 :$My_camp_Clientes1[0]['Real'];
$Meta_Cliente =(!$My_camp_Clientes1[0]['Meta']) ? 0 :$My_camp_Clientes1[0]['Meta'];
$T1 =(!$My_camp_Clientes1[0]['Telefono1']) ? 0 :$My_camp_Clientes1[0]['Telefono1'];
$T2 =(!$My_camp_Clientes1[0]['Telefono2']) ? 0 :$My_camp_Clientes1[0]['Telefono2'];
$T3 =(!$My_camp_Clientes1[0]['Telefono3']) ? 0 :$My_camp_Clientes1[0]['Telefono2'];
$UID =(!$My_camp_Clientes1[0]['ID_Cliente']) ? 0 :$My_camp_Clientes1[0]['ID_Cliente'];
$UNA =(!$My_camp_Clientes1[0]['Nombre']) ? 0 :$My_camp_Clientes1[0]['Nombre'];



$Fecha_Inicio = date_create($Fecha_Inicio);
$Fecha_Cierre = date_create($Fecha_Cierre);
?>
<header class="demo-header mdl-layout__header ">
    <div class="row center ColorHeader"><span class="title-w">N° <span id="spCamp1"><?php echo $ID ?></span> - <span id="spCamp2"><?php echo $Nombre ?></span></span>
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
                            <label class="left">FECHA DE INICIO</label>
                            <input disabled  value="<?php echo date_format($Fecha_Inicio,"Y/m/d");?>" id="icon_DateInit" type="text" class="center validate" >

                        </div>
                        <div class="input-field col s3">
                            <label class="left">FECHA CIERRE</label>
                            <input disabled value="<?php echo date_format($Fecha_Cierre,"Y/m/d");?>" id="icon_DateEnd" type="text" class="center validate">

                        </div>
                        <div class="input-field col s3">
                            <label class="left">META ESTIMADA</label>
                            <input disabled id="icon_DateEnd" value="C$ <?php echo number_format($Meta,2);?>" type="text" class=" center validate">

                        </div>
                        <div class="input-field col s3">
                            <label class="left">REAL</label>
                            <input disabled id="icon_DateEnd" value="C$ <?php echo number_format($Monto,2);?>" type="text" class="center validate">
                        </div>
                    </div>
                    </form>
                </div>
                <div class="card hoverable" >
                    <div class="card-content">

                        <div class="row title-mensaje left"><span>MENSAJE:</span></div>
                        <div class="row" style="text-align: left">
                            <p class="textos">
                                <?php echo $Mensaje?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card hoverable">
                <div class="card-content">
                    <div class="row Titulo_frm_nombrecliente left">
                        <span id="clienteLlamado"><?php echo $UID ?></span> - <?php echo $UNA ?>
                    </div>

                    <div class="row" style="margin-top: 10px">
                        <div class="input-field col s3">
                            <label class="left">TELEFONO 1</label>
                            <input disabled value="<?php echo $T1?>" id="icon_DateInit" type="text" class="center validate">
                        </div>
                        <div class="input-field col s3">
                            <label class="left">TELEFONO 2</label>
                            <input disabled value="<?php echo $T3?>" id="icon_DateEnd" type="text" class="center validate">
                        </div>
                        <div class="input-field col s2">
                            <label class="left">TELEFONO 3</label>
                            <input disabled id="icon_DateEnd" value="<?php echo $T3?>" type="text" class=" right validate">
                        </div>
                        <div class="input-field col s2">
                            <label class="left"">META</label>
                            <input disabled id="icon_DateEnd" value="C$ <?php echo number_format($Meta_Cliente,2);?>" type="text" class="right validate">

                        </div>
                        <div class="input-field col s2">
                            <label class="left"">REAL</label>
                            <input disabled id="icon_DateEnd" value="C$ <?php echo number_format($Real_Cliente,2);?>" type="text" class="right validate">

                        </div>
                    </div>
                </div>
            </div>
            <div class="card hoverable ">
                <div class="card-content">
                    <div class="row valign-wrapper">
                        <div class="col s6" >
                            <a href="#" id="btn-comenzar" class="BtnKronos waves-effect btn modal-trigger">INICIAR</a>
                        </div>
                        <div class="col s6 " >
                               <label id="Kronos" class="sKronos center-align">00:00:00:00</label>
                        </div>

                    </div>
                </div>
            </div>
                <div class="card hoverable">
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
                                    <label class="left">DIRECCION</label>
                                    <input readonly class="left" value="<?php  (!$query2)? : print $query2[0]['DIRECCION']?>" id="icon_DateInit" type="text" class="center">
                                </div>

                                <div class="input-field col s6">
                                    <label class="left">RUC</label>
                                    <input readonly id="icon_RUC" class="left" value="<?php (!$query2) ? : print $query2[0]['RUC'] ?>" type="text" class=" right">
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s3">
                                    <label class="left">CREDITO</label>
                                    <input readonly value="C$ <?php (!$query2)?:print number_format($query2[0]['CREDITO'],2)?>" id="icon_DateInit" type="text" class="right">
                                </div>
                                <div class="input-field col s3">
                                    <label class="left">SALDO</label>
                                    <input readonly value="C$ <?php (!$query2)?:print number_format($query2[0]['SALDO'],2)?>" id="icon_DateEnd" type="text" class="right">
                                </div>
                                <div class="input-field col s6">
                                    <label class="left">DISPONIBLE</label>
                                    <input style="color: <?php echo $query2[0]['cDisp']?>" readonly id="icon_DISPONIBLE" value="C$ <?php (!$query2)?:print number_format($query2[0]['DISPONIBLE'],2)?>" type="text" class=" right">
                                </div>

                                <div class="input-field col s12 center" >
                                    <?php
                                        if ($query2[0]['MOROSO']=="S"){
                                            echo '<p class="color_moroso">MOROSO</p>';
                                        }
                                    ?>
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
        <center><img src="<?php echo base_url(); ?>assets/img/icono_reloj.gif" style="width: 150px"></center><br>
        <center><h2 class='titulosModales'>en PAUSA</h2></center>
        <h2 class="center sKronos"  id="ttPausa">00:00:00</h2>
    </div>
</div>
<div id="outCall" class="modal">
    <div class="modal-content"><br>
        <div class="row center">
            <span class="titulosModales">RESULTADO DE LLAMADA</span></span><br>
            <span class="reporte-title-3">DURACION: <span class="reporte-title-3" id="lblDuracion">00:00:00</span></span>
            <input id="fmr_ext" type="hidden" value="<?php echo $this->session->userdata('EXT');?>">            
        </div>
        <form id="formNuevoUsuario" action="<?PHP echo base_url('index.php/agregarUsuario');?>" method="post" name="formNuevoUsuario">
            <div class="row" >
                <div class="row" >
                    <div class="row" >
                        <div class="input-field offset-l1 col s12 m12 l10 " >
                            <input class="validate" id="frm_Numero" type="tel">
                            <p class="title-tipifacion">Número marcado</p>
                    </div>
                    <div class="input-field offset-l1 col s12 m12 l10 " ><br>
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
                </div><br>
                <div class="row" >                    
                    <div class="input-field offset-l1 col s6 m6 l5 " ><br>
                        <input id="frm_Monto" type="number" class="validate right">
                        <p class="title-tipifacion">Escriba el monto C$</p>
                    </div>
                     <div class="input-field col s6 m6 l5 " ><br>
                        <input id="frm_Unidad" type="number" class="validate right">
                        <p class="title-tipifacion">Escriba cant. unidades</p>
                    </div>
                </div><br>
                <div class="row center" >
                    <div class="col s12 m12"><label id="aComment"><i class="material-icons prefix">comment</i> AGREGAR COMENTARIO</label></div>
                    <div class="input-field offset-l1 col s12 m12 l10" id="addComment" style="display: none;">
                        <textarea id="frm_comentario" class="text-area" placeholder="COMENTARIOS"></textarea>
                </div>
                </div>
        </form><br><br>
        <div class="row center">
            <a id="id_Guardar_llamada" class="BtnBlue waves-effect btn modal-trigger">OK</a>
            <a id="cancelarProceso" class="modal-action modal-close BtnCancelar waves-effect btn modal-trigger">CANCELAR</a>
        </div>
    </div>
</div>
</div>
</div>
