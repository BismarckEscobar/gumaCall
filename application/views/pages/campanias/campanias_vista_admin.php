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
        <div class="noMargen row TextColor center"><div class="col s12 m8 l12 offset-m1">LISTADO DE CAMPAÑAS</div></div>
        <div class="noMargen Buscar row column">
            <div id="agregarUsuario" class="col offset-s10 s10 right">
                <a href="crearCampania" class="BtnBlue waves-effect btn modal-trigger"><i class="material-icons left">add</i>CREAR CAMPAÑA</a>
            </div>
        </div><br><br>
        <div class="row">
            <div id="tableCampaniasVA">
            <table id="tblcampaniasVA" class="TblData">
                <thead>
                <tr>
                    <th>Nº CAMPAÑA</th>                    
                    <th>NOMBRE</th>
                    <th>FECHA INICIO</th>
                    <th>FECHA CIERRE</th>                    
                    <th>META</th>
                    <th>REAL</th>
                    <th>OBSERVACIONES</th>
                    <th>ACTIVA</th>
                    <th style="display:none">ESTADO1</th>
                    <th>Opciones</th>                  
                </tr>
                </thead>
                <tfoot style="display:none">
                    <tr>
                        <th>Nº CAMPAÑA</th>
                        <th>NOMBRE</th>
                    </tr>
                </tfoot>
                <tbody class="center">
                <?php 
                    if ($listaCampanias) {
                        foreach ($listaCampanias as $key) {
                            if ($key['Estado']==2) {
                                $class='tachado';
                                $chk="<input type='checkbox' class='filled-in' id='chkActivo".$key['ID_Campannas']."'>";
                            }elseif ($key['Estado']!=2) {
                                $class='noTachado';
                                $chk="<input type='checkbox' checked='checked' class='filled-in' id='chkActivo".$key['ID_Campannas']."'>";                                
                            }

                            if ($key['Estado']==1) {
                                $estado='Activa';

                            }elseif ($key['Estado']==2) {
                                $estado='Inactiva';

                            }elseif ($key['Estado']==3) {
                                $estado='Aprobada';

                            }elseif ($key['Estado']==4) {
                                $estado='Procesando';

                            }

                            echo"
                            <tr>
                                <td class='".$class."'><a href='detallesVA/".$key['ID_Campannas']."'>".$key['ID_Campannas']."</a> </td>
                                <td class='".$class."'>".$key['Nombre']."</td>
                                <td class='".$class."'>
                                    <span>".date('d-m-Y', strtotime($key['Fecha_Inicio']))."</span>
                                </td>
                                <td class='".$class."'>
                                    <span>".date('d-m-Y', strtotime($key['Fecha_Cierre']))."</span>
                                </td>
                                <td class='".$class."'>
                                    <span>C$ ".number_format($key['Meta'],2)."</span>
                                </td>
                                <td class='".$class."'>
                                    <span>C$ ".number_format($key['monto'],2)."</span>
                                </td>
                                <td class='".$class."'>
                                    <span>".$key['Observaciones']."</span>
                                </td>
                                <td>".$chk."
                                    <label for='chkActivo".$key['ID_Campannas']."'></label>
                                </td>
                                <td style='display:none'>".$estado."</td>
                                <td>
                                    <div id='numcamp".$key['ID_Campannas']."'>
                                        <a onclick='editarCampania(".'"'.$key['ID_Campannas'].'"'.")' href='#' class='btn-floating red darken-1'><i class='small material-icons'>create</i></a>
                                    </div>                                
                                </td>
                            </tr>";
                        }
                    }
                ?>
                </tbody>
            </table>
            </div>
        </div>
    </div>
</main>
<!--MODAL: EDITANDO CAMPAÑAS-->
<div id="modalEditarCamp" class="modal modal-fixed-footer">
    <div class="modal-content"><br>
        <div class="row center">            
            <span id="grupo" class="titulosModales">ADMINISTRAR CAMPAÑA</span>                       
        </div>
        <div class="row center">
            <div id="agente" class="col s12">
                <div class="row">  
                    <div class="col s12 m12 l12">                
                        <div class="row center">                            
                            <div class="row left">
                            <?php 
                                if ($listaCampanias) {
                                    foreach ($listaCampanias as $key) {
                                    if ($key['Estado']==1) {                                        
                                        $status="<li><a href='#!' onclick='cambiaEstadoCamp(".'"'.$key['ID_Campannas'].'"'.", 2)'>Inactivar</a></li>
                                                 <li><a href='#!' onclick='cambiaEstadoCamp(".'"'.$key['ID_Campannas'].'"'.", 3)'>Aprobar</a></li>
                                                 <li><a href='#!' onclick='cambiaEstadoCamp(".'"'.$key['ID_Campannas'].'"'.", 4)'>Procesar</a></li>";
                                    }elseif ($key['Estado']==2) {                                        
                                        $status="<li><a href='#!' onclick='cambiaEstadoCamp(".'"'.$key['ID_Campannas'].'"'.", 1)'>Activar</a></li>
                                                 <li><a href='#!' onclick='cambiaEstadoCamp(".'"'.$key['ID_Campannas'].'"'.", 3)'>Aprobar</a></li>
                                                 <li><a href='#!' onclick='cambiaEstadoCamp(".'"'.$key['ID_Campannas'].'"'.", 4)'>Procesar</a></li>";
                                    }elseif ($key['Estado']==3) {                                        
                                        $status="<li><a href='#!' onclick='cambiaEstadoCamp(".'"'.$key['ID_Campannas'].'"'.", 1)'>Activar</a></li>
                                                 <li><a href='#!' onclick='cambiaEstadoCamp(".'"'.$key['ID_Campannas'].'"'.", 2)'>Inactivar</a></li>
                                                 <li><a href='#!' onclick='cambiaEstadoCamp(".'"'.$key['ID_Campannas'].'"'.", 4)'>Procesar</a></li>";
                                    }elseif ($key['Estado']==4) {                                        
                                        $status="<li><a href='#!' onclick='cambiaEstadoCamp(".'"'.$key['ID_Campannas'].'"'.", 1)'>Activar</a></li>
                                                 <li><a href='#!' onclick='cambiaEstadoCamp(".'"'.$key['ID_Campannas'].'"'.", 2)'>Inactivar</a></li>
                                                 <li><a href='#!' onclick='cambiaEstadoCamp(".'"'.$key['ID_Campannas'].'"'.", 3)'>Aprobar</a></li>";
                                    }
                                    }
                                    echo "<a class='dropdown-button btn-floating  blue darken-3' href='#' data-activates='dropdown1".$key['ID_Campannas']."'><i class='small material-icons'>list</i></a>
                                    <ul id='dropdown1".$key['ID_Campannas']."' class='dropdown-content ul-dr'>
                                    ".$status."
                                    </ul>"; 
                                }
                            ?>
                            </div>
                            <table id="tblAdmAgentes" class="TblData">
                                <thead>
                                    <tr>                                
                                        <th class="th-campania">SELECCIONAR</th>
                                        <th>NOMBRE AGENTE</th>
                                    </tr>
                                </thead>
                                <tbody class="center">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div id="cliente" class="col s12"></div>
        </div>
    </div>
    <div class="modal-footer">        
        <div id="center" class="fixed-action-btn">
            <div>
                <a class="BtnCancelar modal-action modal-close waves-effect btn modal-trigger">CANCELAR
                </a>&nbsp;&nbsp;
                <a class="BtnBlue waves-effect btn modal-trigger">GUARDAR
                </a>
            </div>
        </div>
    </div>
</div>