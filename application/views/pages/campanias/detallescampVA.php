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
        <div class="row">
            <div class="col s12 m12">
                <div class="card">
                    <div class="card-content">
                    <?php 
                        if ($campaniaInfo) {
                            foreach ($campaniaInfo as $key) {
                            $tiempoPromedio;       

                            if ($key['tiempoPromedio']=='0') {
                                $tiempoPromedio = "00:00:00";
                            }elseif($key['tiempoPromedio']==0) {
                                $tiempoPromedio = $key['tiempoPromedio'];
                            }
                            echo'<div class="row">
                                    <div class="input-field col s12 m12">
                                        <input id="nombreCampania" type="text" class="validate select" value="'.$key['nombre'].'">
                                        <input id="numCampania" type="hidden" class="validate select" value="'.$key['ID_Campannas'].'">
                                    </div>
                                </div>
                                <div class="content-rows">
                                    <div class="content-rows-left">
                                        <div class="row">                                
                                            <div class="input-field col s6">
                                                <input value="'.date('Y-m-d', strtotime($key['fechaInicio'])).'" id="fechaInicioCamp" type="date" class="datepicker select">
                                                <label for="fechaInicioCamp" class="left">FECHA DE INICIO</label>
                                            </div>
                                            <div class="input-field col s6">
                                                <input value="'.number_format($key['meta'], 2).'" id="metaEstimadaCamp" type="text" class="validate textos-cifras select money">
                                                <label for="metaEstimadaCamp">META ESTIMADA C$</label>
                                            </div>
                                        </div>
                                        <div class="row">                                
                                            <div class="input-field col s6">
                                                <input value="'.date('Y-m-d', strtotime($key['fechaCierre'])).'" id="fechaCierreCamp" type="date" class="datepicker select">
                                                <label for="fechaCierreCamp">FECHA FINAL</label>
                                            </div>
                                            <div class="input-field col s6">
                                                <input readonly value="'.number_format($key['montoReal'], 2).'" id="montoRealCamp" type="text" class="validate textos-cifras">
                                                <label for="montoRealCamp">REAL C$</label>
                                            </div>
                                        </div> 
                                    </div>               
                                    <div class="content-rows-right">
                                        <div id="container-grafica"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s3 m3">
                                        <span class="totales">'.$key['totalLlamadas'].'</span><br>
                                        <span class="totales">TOTAL LLAMADAS</span>
                                    </div>
                                    <div class="col s3 m3">
                                        <span class="totales">'.$key['tiempoTotal'].'</span><br>
                                        <span class="totales">TIEMPO TOTAL</span>
                                    </div>
                                    <div class="col s3 m3">
                                        <span class="totales">'.date("H:i:s", strtotime($tiempoPromedio)).'</span><br>
                                        <span class="totales">TIEMPO PROMEDIO</span>
                                    </div>
                                    <div class="col s3 m3">
                                        <span class="totales">'.intval($key['unidad']).'</span><br>
                                        <span class="totales">UNIDADES</span>
                                    </div>  
                                </div><br><br>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <textarea id="editObservacion" class="text-area select">'.str_replace("-", ",", $key['observacion']).'</textarea>
                                        <label for="editObservacion">OBSERVACIONES</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <textarea id="editMensaje" class="text-area select">'.str_replace("-", ",", $key['mensaje']).'</textarea>
                                        <label for="editMensaje">MENSAJE</label>
                                    </div>
                                </div>';
                            }
                        }
                    ?>
                    </div>
                </div><br> <!--<span class="totales">'.$campaniaInfo[0]['tiempoPromedio'].'</span><br>-->
                <div class="row">
                    <div id="table-detalleCliente">
                        <table id="tblDetalleCliente" class="TblData">
                            <thead>
                            <tr>
                                <th>CODIGO</th>
                                <th>NOMBRE</th>
                                <th>ESTIMADO</th>
                                <th>REAL</th>
                                <th>OBSERVACIONES</th>
                            </tr>
                            </thead>
                            <tbody class="center">
                            <?php 
                                if ($clientes) {
                                    $montoReal = 0;
                                    foreach ($clientes as $key) {
                                        if ($key['montoReal']=="") {
                                            $montoReal=0;
                                        }else {
                                            $montoReal=$key['montoReal'];
                                        }
                                        echo '
                                        <tr>
                                            <td><span>'.$key['ID_Cliente'].'</span></td>
                                            <td><span>'.$key['Nombre'].'</span></td>
                                            <td><span>C$ '.number_format($key['Meta'], 2).'</span></td>
                                            <td><span>C$ '.number_format($montoReal, 2).'</span></td>
                                            <td><span>-</span></td>
                                        </tr>
                                        ';
                                    }
                                }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>