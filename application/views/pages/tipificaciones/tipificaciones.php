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
<!--  CONTENIDO PRINCIPAL -->
<main class="mdl-layout__content mdl-color--grey-100">
    <div class="contenedor">        
        <div class="noMargen row TextColor center"><div class="col s12 m8 l12 offset-m1">TIPIFICACIONES</div></div><br><br>
        <div class="row center">
            <i class="material-icons prefix">search</i>
            <input style="width:50%" type="text" id="filtrarTipificaciones" placeholder=" BUSCAR TIPIFICACIÓN">
        </div>    
        <div class="noMargen Buscar row column">
            <div class="right">
                <a href="#nuevaTipificacion" id="agregarTipi" class="BtnBlue waves-effect btn modal-trigger">NUEVA TIPIFICACION</a>
            </div>
        </div>            
        <div class="row" id="tipificaciones">
            <table id="tblTipificaciones" class="TblData">
                <thead>
                    <tr>
                        <th>ID TIPIFICACIÓN</th>
                        <th>NOMBRE</th>
                        <th>FECHA CREACIÓN</th>
                        <th>OPCIONES</th>
                    </tr>
                </thead>
            <tbody class="center">
                <?php
                    if ($tipificaciones) {
                        foreach ($tipificaciones as $key) {
                            $estado = 0;
                            if ($key['Activa']==1) {
                                $estado = "<td><a onclick='editarTipificacion(".$key['ID_TPF'].", 0)' href='#editarTipi' class='btn-floating blue'><i class='small material-icons'>done</i></a></td>";
                            }else {
                                $estado = "<td><a onclick='editarTipificacion(".$key['ID_TPF'].", 1)' href='#editarTipi' class='btn-floating red'><i class='small material-icons'>clear</i></a></td>";
                            }
                            echo "
                            <tr>
                                <td>".$key['ID_TPF']."</td>
                                <td>".$key['Tipificacion']."</td>
                                <td>".date('d/m/Y', strtotime($key["Fecha_TPF"]))."</td>
                                ".$estado."
                            </tr>";
                        }
                    }
                ?>
            </tbody>
            </table>
        </div>
    </div>
</main>
<!-- MODAL: NUEVA TIPIFICACION-->
<div id="nuevaTipificacion" class="modal">
    <div class="modal-content"><br>
        <div class="row">
            <div class="col s12 m12">
                <div class="row center">
                    <span id="titulM" class="titulosModales">NUEVO TIPIFICACIÓN</span>
                </div>
                <form id="formNuevaTipi" action="<?PHP echo base_url('index.php/nuevaTipificacion');?>" method="post" name="formNuevaTipi">
                    <div class="row">
                        <div class="input-field col s12 m12">
                          <input id="nombreTipificacion" name="nombreTipificacion" type="text" class="validate mayuscula">
                          <label for="nombreTipificacion">NOMBRE TIPIFICACIÓN</label>
                        </div>                                
                    </div>           
                </form><br><br>
                <div class="row center">
                    <a id="guardarTipificacion" class="BtnBlue waves-effect btn modal-trigger">GUARDAR</a>&nbsp;&nbsp;
                    <a id="cancelarProceso" class="modal-action modal-close BtnCancelar waves-effect btn modal-trigger">CANCELAR</a>
                </div>
            </div>
        </div>
    </div>
</div>