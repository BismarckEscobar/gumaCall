<?php
$ID =(!$My_camp_Header[0]['ID_Campannas']) ? 0 :$My_camp_Header[0]['ID_Campannas'];
$Nombre =(!$My_camp_Header[0]['Nombre']) ? 0 :$My_camp_Header[0]['Nombre'];
$Monto =(!$My_camp_Header[0]['MONTO_REAL']) ? 0 :$My_camp_Header[0]['MONTO_REAL'];
$Fecha_Inicio =(!$My_camp_Header[0]['Fecha_Inicio']) ? 0 :$My_camp_Header[0]['Fecha_Inicio'];
$Fecha_Cierre =(!$My_camp_Header[0]['Fecha_Cierre']) ? 0 :$My_camp_Header[0]['Fecha_Cierre'];

$Meta =(!$My_camp_Header[0]['Meta']) ? 0 :$My_camp_Header[0]['Meta'];
$Fecha_Inicio = date_create($Fecha_Inicio);
$Fecha_Cierre = date_create($Fecha_Cierre);
?>
<header class="demo-header mdl-layout__header ">
    <div class="row center ColorHeader"><span class="title-w">CAMPAÑAS DETALLES</span>
        <div class="container_reloj">
            <div class="clock">
                <ul class="ul_r">
                    <li id="hours"></li>
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
            <div class="col s12 m12">
                <div class="card">
                    <div class="card-content">
                        <span id="span1" class="card-title left">N° <?php echo $ID;?> </span><span class="card-title left"> - </span>
                        <span id="span2" class="card-title left"><?php echo $Nombre;?></span><br><br><br><br>
                        <div class="row">
                            <form class="col s12">
                                <div class="row">
                                    <div class="input-field col s3">
                                        <label  class="left">FECHA DE INICIO</label>
                                        <input disabled value="<?php echo date_format($Fecha_Inicio,"Y/m/d");?>" id="icon_DateInit" type="text" class="center validate">

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
                    </div>
                </div>
            </div>
        </div>



        <div class="row" id="monitoreo1">
            <table id="tbl_camp_cliente" class="TblData">
                <thead>
                <tr>
                    <th>CODIGO</th>
                    <th>NOMBRE</th>
                    <th>TELEFONO</th>
                    <th>META</th>
                    <th>REAL</th>
                    <th>MONTO RECUPERADO</th>
                </tr>
                </thead>
                <tbody class="center">
                <?php

                    if (!$ClixVend){

                    }else{
                        foreach ($ClixVend as $Lst){

                            echo '<tr>
                                    <td><a id="Numcamp" onclick="getInfoCliente('."'".$Lst['ID_Campannas']."'".",'".$Lst['ID_Cliente']."'".')" href="#">'.$Lst['ID_Cliente'].'</a></td>
                                    <td>'.$Lst['Nombre'].'</td>
                                    <td>'.$Lst['Telefono1'].'</td>
                                    <td>C$ '.number_format($Lst['Meta'],2).'</td>
                                    <td>C$ '.number_format($Lst['Real'],2).'</td>
                                    <td>'.number_format($Lst['Real'], 2).'</td>       
                                 </tr>';
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
        <h2 class="center sKronos"  id="ttPausa">00:00:00</h2>
    </div>
</div>
<!--MODAL: INGRESO NUEVO USUARIO-->
<div id="modalNuevoUsuario" class="modal">
    <div class="modal-content"><br>
        <div class="row center">
            <span class="titulosModales">INFORMACIÓN DEL USUARIO</span>
        </div>
        <form id="formNuevoUsuario" action="<?PHP echo base_url('index.php/agregarUsuario');?>" method="post" name="formNuevoUsuario">
            <div class="row">
                <div class="input-field offset-l1 col s12 m12 l6">
                    <input name="nombreUsuario" id="nombreUsuario" type="text" class="validate mayuscula">
                    <label for="nombreUsuario">Nombre completo</label>
                </div>
                <div class="input-field col s12 m12 l4">
                    <input name="usuario" id="usuario" type="text" class="validate mayuscula">
                    <label for="usuario">Nombre usuario</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field offset-l1 col s12 m6 l5">
                    <input name="contrasenia" id="contrasenia" type="text" class="validate mayuscula">
                    <label for="contrasenia">Contraseña</label>
                </div>
                <div class="input-field col s12 m6 l5">
                    <input name="rpContrasenia" id="rpContrasenia" type="text" class="validate mayuscula">
                    <label for="rpContrasenia">Repita la contraseña</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field offset-l1 col s12 m12 l10 ">
                    <select class="chosen-select browser-default" name="tipoUsuario" id="tipoUsuario">
                        <option value="" disabled selected><span>Permisos</span></option>
                        <?php
                        if ($roles) {
                            foreach ($roles as $key) {
                                echo "
					                    <option value=".$key['tipo']."><span>".$key['descripcion']."</span></option>
					                    ";
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
        </form><br><br><br>
        <div class="row center">
            <a id="guardarUsuario" class="BtnBlue waves-effect btn modal-trigger">GUARDAR</a>
            <a id="cancelarProceso" class="modal-action modal-close BtnBlue waves-effect btn modal-trigger">CANCELAR</a>
        </div>
    </div>
</div>