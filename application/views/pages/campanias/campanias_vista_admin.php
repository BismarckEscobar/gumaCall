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
        </div>
        <div class="row">
            <table id="tblcampaniasVA" class="TblData">
                <thead>
                <tr>
                    <th>Nº CAMPAÑA</th>
                    <th>ACTIVA</th>
                    <th>NOMBRE</th>
                    <th>FECHA INICIO</th>
                    <th>FECHA CIERRE</th>
                    <th>ESTADO</th>
                    <th>META</th>
                    <th>REAL</th>
                    <th>OBSERVACIONES</th>
                </tr>
                </thead>
                <tbody class="center">
                <?php 
                    if ($listaCampanias) {
                        foreach ($listaCampanias as $key) {
                            if ($key['Activo']==1) {
                                $chk="<input type='checkbox' checked='checked' class='filled-in' id='chkActivo".$key['ID_Campannas']."'>";
                            }else {
                                $chk="<input type='checkbox' class='filled-in' id='chkActivo".$key['ID_Campannas']."'>";
                            }

                            if ($key['Estado']==1) {
                                $estado='Activa';
                                $status="<li><a href='#!' onclick='cambiaEstadoCamp(".'"'.$key['ID_Campannas'].'"'.", 2)'>Inactivar</a></li>
                                         <li><a href='#!' onclick='cambiaEstadoCamp(".'"'.$key['ID_Campannas'].'"'.", 3)'>Aprobar</a></li>
                                         <li><a href='#!' onclick='cambiaEstadoCamp(".'"'.$key['ID_Campannas'].'"'.", 4)'>Procesar</a></li>";
                            }elseif ($key['Estado']==2) {
                                $estado='Inactiva';
                                $status="<li><a href='#!' onclick='cambiaEstadoCamp(".'"'.$key['ID_Campannas'].'"'.", 1)'>Activar</a></li>
                                         <li><a href='#!' onclick='cambiaEstadoCamp(".'"'.$key['ID_Campannas'].'"'.", 3)'>Aprobar</a></li>
                                         <li><a href='#!' onclick='cambiaEstadoCamp(".'"'.$key['ID_Campannas'].'"'.", 4)'>Procesar</a></li>";
                            }elseif ($key['Estado']==3) {
                                $estado='Aprobadada';
                                $status="<li><a href='#!' onclick='cambiaEstadoCamp(".'"'.$key['ID_Campannas'].'"'.", 1)'>Activar</a></li>
                                         <li><a href='#!' onclick='cambiaEstadoCamp(".'"'.$key['ID_Campannas'].'"'.", 2)'>Inactivar</a></li>
                                         <li><a href='#!' onclick='cambiaEstadoCamp(".'"'.$key['ID_Campannas'].'"'.", 4)'>Procesar</a></li>";
                            }elseif ($key['Estado']==4) {
                                $estado='Procesando';
                                $status="<li><a href='#!' onclick='cambiaEstadoCamp(".'"'.$key['ID_Campannas'].'"'.", 1)'>Activar</a></li>
                                         <li><a href='#!' onclick='cambiaEstadoCamp(".'"'.$key['ID_Campannas'].'"'.", 2)'>Inactivar</a></li>
                                         <li><a href='#!' onclick='cambiaEstadoCamp(".'"'.$key['ID_Campannas'].'"'.", 3)'>Aprobar</a></li>";
                            }
                            echo"
                            <tr>
                                <td><a href='detallesVA/".$key['ID_Campannas']."'>".$key['ID_Campannas']."</a> </td>
                                <td>".$chk."
                                    <label for='chkActivo".$key['ID_Campannas']."'></label>
                                </td>
                            <td>
                                <span>".$key['Nombre']."</span>
                            </td>
                            <td>
                                <span>".date('d-m-Y', strtotime($key['Fecha_Inicio']))."</span>
                            </td>
                            <td>
                                <span>".date('d-m-Y', strtotime($key['Fecha_Cierre']))."</span>
                            </td>
                            <td>
                              <a class='dropdown-button' href='#' data-activates='dropdown1".$key['ID_Campannas']."'>".$estado."</a>
                              <ul id='dropdown1".$key['ID_Campannas']."' class='dropdown-content ul-dr'>
                                ".$status."
                              </ul>
                            </td>
                            <td>
                                <span>C$ ".number_format($key['Meta'],2)."</span>
                            </td>
                            <td>
                                <span>C$ ".number_format($key['monto'],2)."</span>
                            </td>
                            <td>
                                <span>".$key['Observaciones']."</span>
                            </td>
                            </tr>";
                        }
                    }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</main>