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
                <div class="noMargen row TextColor center"><div class="col s12 m12">GENERAR REPORTE</div></div><br><br><br>
                <input type="hidden" id="val">
                <div class="row center">
                    <div class="col s12 m12">
                        <div style="width:50%; margin: 0 auto;">
                            <select name="selectRpt" id="selectRpt" class="chosen-select browser-default">
                                <option value="" disabled selected>SELECCIONE UN VALOR</option>
                                <?php 
                                if ($dataRpt) {
                                    foreach ($dataRpt as $key) {
                                        echo '<option value="'.$key['value'].'">'.$key['desc'].'</option> ';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div><br><br>
                <div class="row center">
                    <center>
                        <a class="BtnBlue waves-effect btn modal-trigger" id="generarRpt" href="#rptCampaniaModal">GENERAR
                        </a>                                    
                    </center>
                </div>
            </div>
        </div>        
    </div>
</main>
<!--MODAL: REPORTE DE CAMPAÑA-->
<div id="rptCampaniaModal" class="modal">
    <div class="modal-content"><br>
        <div class="row">
            <div class="col s12 m12">
                <div class="noMargen Buscar row column">
                    <div class="col offset-s2 s2 right">
                        <a href="#" onclick="imprimirRptCamp()" class="modal-trigger"><i class="material-icons" style="color:#0d47a1; font-size: 30px">print</i></a>&nbsp;&nbsp;
                        <a href="#" class="modal-action modal-close"><i class="material-icons" style="color:red; font-size: 30px">clear</i></a>
                    </div>
                </div><br>
                <input type="hidden" id="numCampania2">
                <div class="row center">
                    <span id="tituloCampania" class="titulosModales"></span>
                </div>
                <div class="row center">
                    <p style="font-family:robotoregular" id="fechasCampania"></p>
                </div>
                <div class="row center">                                
                    <div class="col s6"><span class="mayuscula" id="monto"></span></div>
                    <div class="col s6"><span class="mayuscula" id="real"></span></div>                                
                </div><br><br>
                <div class="row center">
                    <div class="col s3 m3">
                        <span id="totalLlamada" class="totales">0</span><br>
                        <span class="totales">TOTAL LLAMADAS</span>
                    </div>
                    <div class="col s3 m3">
                        <span id="tiempoTotal" class="totales">0</span><br>
                        <span class="totales">TIEMPO TOTAL</span>
                    </div>
                    <div class="col s3 m3">
                        <span id="tiempoPromedio" class="totales">0</span><br>
                        <span class="totales">TIEMPO PROMEDIO</span>
                    </div>
                    <div class="col s3 m3">
                        <span id="unidades" class="totales">0</span><br>
                        <span class="totales">UNIDADES</span>
                    </div>  
                </div>
                <div class="row center">
                    <div class="input-field col s12">
                      <textarea readonly id="mensaje" class="text-area"></textarea>
                    </div>
                </div>
                <div class="row center">
                    <div class="input-field col s12">
                      <textarea readonly id="observacion" class="text-area"></textarea>
                    </div>
                </div><br><br>
                <div class="row">
                    <div id="table-detalleCliente">
                        <table id="tblClienteRpt" class="TblData">
                            <thead>
                            <tr>
                                <th>ID CLIENTE</th>
                                <th>NOMBRE</th>
                                <th>ESTIMADO</th>
                                <th>REAL</th>
                            </tr>
                            </thead>
                            <tbody class="center">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>        
    </div>
</div>
<!--MODAL: REPORTE DE USUARIO-->
<div id="rptAgenteModal" class="modal">
    <div class="modal-content"><br>
        <div class="row">
            <div class="col s12 m12">
                <div class="noMargen Buscar row column">
                    <div class="col offset-s2 s2 right">
                        <a href="#" onclick="imprimirRptAgente()" class="modal-trigger"><i class="material-icons" style="color:#0d47a1; font-size: 30px">print</i></a>&nbsp;&nbsp;
                        <a href="#" class="modal-action modal-close"><i class="material-icons" style="color:red; font-size: 30px">clear</i></a>
                    </div>
                </div><br>
                <input type="hidden" id="idAgente">
                <div class="row center">
                    <span class="titulosModales">NOMBRE: </span>
                    <span id="nombreUsuario" class="titulosModales"></span>
                </div>
                <div class="row center">
                    <span class="titulosModales">USUARIO: </span>
                    <span id="usuario" class="titulosModales"></span>
                </div><br><br>
                <div class="row center">
                    <div class="col s4 m4">
                        <span id="HC" class="totales">0</span><br>
                        <span class="totales">HORAS CONECTADO</span>
                    </div>
                    <div class="col s4 m4">
                        <span id="TP" class="totales">0</span><br>
                        <span class="totales">TIEMPOS PAUSA</span>
                    </div>
                    <div class="col s4 m4">
                        <span id="TT" class="totales">0</span><br>
                        <span class="totales">TIEMPO TOTAL</span>
                    </div> 
                </div>
            </div>
        </div>        
    </div>
</div>
