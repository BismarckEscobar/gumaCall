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
                <input type="hidden" id="idTemporal">
                <input type="hidden" id="val">
                <div id="reportes1" class="row center">
                    <div class="col s12 m12">
                        <div style="width:50%; margin: 0 auto;">
                            <select name="selectRpt" id="selectRpt" class="chosen-select browser-default">
                                <option value="" disabled selected>SELECCIONE</option>
                                <?php 
                                if ($dataRpt) {
                                    foreach ($dataRpt as $key) {
                                        echo '<option value="'.$key['value'].'">'.$key['desc'].'</option> ';
                                    }
                                }
                                ?>
                            </select><br>
                        </div>
                    </div>
                </div>
                <div id="reportes2" class="row center">
                    <div class="col s12 m12">
                        <div style="width:50%; margin: 0 auto;">
                            <select name="selectRpt2" id="selectRpt2" class="chosen-select browser-default">
                                <option value="1T0OD1O0S" selected>SELECCIONAR TODOS</option>
                                <?php 
                                if ($dataRpt) {
                                    foreach ($dataRpt as $key) {
                                        echo '<option value="'.$key['value'].'">'.$key['desc'].'</option> ';
                                    }
                                }
                                ?>
                            </select><br>
                        </div>
                    </div>
                </div><br><br><br>
                <span class="mayuscula-bold">FILTRAR POR LOS SIGUIENTES VALORES</span><br><br>
                <div id="filtroPorCliente" class="row center" style="display:none">
                    <div class="col s12 m12">
                        <div style="width:50%; margin: 0 auto;">
                            <select name="cliente" id="cliente" class="chosen-select browser-default">
                            </select>
                        </div>
                    </div>
                </div><br>
                <div id="filtroPorCamp" class="row center" style="display:none">
                    <div class="col s12 m12">
                        <div style="width:50%; margin: 0 auto;">
                            <select name="campania" id="campania" class="chosen-select browser-default">
                            </select>
                        </div>
                    </div>
                </div>
                <div id="filtroPorFechas" class="row center" style="display:none">
                    <div class="col s12 m12"><br>
                        <div style="width:50%; margin: 0 auto;">
                            <div class="input-field col s6">
                                <label for="desde">Desde</label>
                                <input type="text" name="" id="desde" class="datepicker">
                            </div>  
                            <div class="input-field col s6">
                                <label for="hasta">Hasta</label>
                                <input type="text" name="" id="hasta" class="datepicker" >
                            </div>
                        </div>
                    </div>
                </div><br>
                <div id="generarRpts1" class="row center">
                    <center>
                        <a class="BtnBlue waves-effect btn modal-trigger" id="generarRpt" href="#rptCampaniaModal">GENERAR
                        </a>                                    
                    </center>
                </div>
                <div id="generarRpts2" style="display:none" class="row center">
                    <center>
                        <a class="BtnBlue waves-effect btn modal-trigger" id="generarRpt2" href="#rptCampaniaModal">GENERAR
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
                        <a href="#" onclick="imprimirRpt()" class="modal-trigger"><i class="material-icons" style="color:#0d47a1; font-size: 30px">print</i></a>&nbsp;&nbsp;
                        <a href="#" class="modal-action modal-close"><i class="material-icons" style="color:red; font-size: 30px">clear</i></a>
                    </div>
                </div><br>                
                <div class="row center">
                    <span id="tituloCampania" class="titulosModales"></span>
                </div>
                <div class="row center">
                    <p style="font-family:robotoregular" id="fechasCampania"></p>
                </div>
                <div class="row center">                                
                    <div class="col s6"><span class="reporte-title-1" id="monto"></span></div>
                    <div class="col s6"><span class="reporte-title-1" id="real"></span></div>                                
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
                                <th>ESTIMADO C$</th>
                                <th>REAL C$</th>
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
                        <a href="#" onclick="imprimirRpt()" class="modal-trigger"><i class="material-icons" style="color:#0d47a1; font-size: 30px">print</i></a>&nbsp;&nbsp;
                        <a href="#" class="modal-action modal-close"><i class="material-icons" style="color:red; font-size: 30px">clear</i></a>
                    </div>
                </div><br>
                <input type="hidden" id="idAgente">
                <div class="row center">
                    <span class="reporte-title">NOMBRE:</span>
                    <span id="nombreUsuario" class="reporte-title"></span>
                </div>
                <div class="row center">
                    <span class="reporte-title">USUARIO: </span>
                    <span id="usuario" class="reporte-title"></span>
                </div><br>

                <div class="row center">
                    <span class="reporte-title-1">TIEMPOS TOTALES</span>
                    <table id="tblTiempos" class="TblData">
                        <thead>
                            <tr>
                                <th>HORAS CONECTADO</th>
                                <th>TIEMPOS PAUSA</th>
                                <th>TIEMPO TOTAL</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><span id="HC" class="totales">0</span></td>
                                <td><span id="TP" class="totales">0</span></td>
                                <td><span id="TT" class="totales">0</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div><br><br>
                <div class="row center">
                    <span class="reporte-title-1">DETALLES CONEXIóN</span>
                    <table id="tblDetalleConexion" class="TblData">
                        <thead>
                            <tr>
                                <th>INICIO</th>
                                <th>FINALIZO</th>
                                <th>TIEMPO</th>
                                <th>TIPO</th>
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
<!--MODAL: REPORTE DE CLIENTE-->
<div id="rptClienteModal" class="modal">
    <div class="modal-content"><br>
        <div class="row">
            <div class="col s12 m12">
                <div class="noMargen Buscar row column">
                    <div class="col offset-s2 s2 right">
                        <a href="#" onclick="imprimirRpt()" class="modal-trigger"><i class="material-icons" style="color:#0d47a1; font-size: 30px">print</i></a>&nbsp;&nbsp;
                        <a href="#" class="modal-action modal-close"><i class="material-icons" style="color:red; font-size: 30px">clear</i></a>
                    </div>
                </div><br>
                <input type="hidden" id="idAgente">
                <div class="row right">
                    <span class="reporte-title">NOMBRE: </span>
                    <span id="nombreCliente" class="reporte-title"></span>
                </div>
                <div class="row right">
                    <span class="reporte-title">DIRECCION: </span>
                    <span id="direccion" class="reporte-title"></span>
                </div><br><br>
                <div class="row center">
                    <table id="tblClientes" class="TblData">
                        <thead>
                            <tr>
                                <th>CAMPAÑA</th>
                                <th>REAL C$</th>
                                <th>META C$</th>
                                <th>UNIDADES</th>
                                <th>AGENTE</th>
                                <th>CANT. LLAMADAS</th>
                                <th>NÚMERO CAMPAÑA</th>
                                <th>MONTO REAL C$</th>
                                <th>META C$</th>
                                <th>UNIDADES</th>
                                <th>AGENTE</th>
                                <th>CANT. LLAMADAS</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>        
    </div>
</div>
<!--MODAL: REPORTE GENERAL-->
<div id="rptLlamadasModal" class="modal">
    <div class="modal-content"><br>
        <div class="row">
            <div class="col s12 m12">
                <div class="noMargen Buscar row column">
                    <div class="col offset-s2 s2 right">
                        <a href="#" onclick="imprimirRpt()" class="modal-trigger"><i class="material-icons" style="color:#0d47a1; font-size: 30px">print</i></a>&nbsp;&nbsp;
                        <a href="#" class="modal-action modal-close"><i class="material-icons" style="color:red; font-size: 30px">clear</i></a>
                    </div>
                </div><br>
                <div class="row center">
                    <span class="reporte-title-1">REPORTE GENERAL</span><br><br><br>
                    <table id="tblGeneral" class="TblData">
                        <thead>
                            <tr>
                                <th>CAMPAÑA</th>
                                <th>ID CLIENTE</th>                                
                                <th>NOMBRE</th>
                                <th>RECUPERADO C$</th>
                                <th>REAL C$</th>
                                <th>CANT. LLAMADAS</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>        
    </div>
</div>
<!--MODAL: REPORTE REGISTRO LLAMDAS-->
<div id="rptRgtLlamadas" class="modal">
    <div class="modal-content"><br>
        <div class="row">
            <div class="col s12 m12">
                <div class="noMargen Buscar row column">
                    <div class="col offset-s2 s2 right">
                        <a href="#" onclick="imprimirRpt()" class="modal-trigger"><i class="material-icons" style="color:#0d47a1; font-size: 30px">print</i></a>&nbsp;&nbsp;
                        <a href="#" class="modal-action modal-close"><i class="material-icons" style="color:red; font-size: 30px">clear</i></a>
                    </div>
                </div><br>
                <div class="row center">
                    <span class="reporte-title-1">LLAMADAS POR CAMPAÑA</span><br><br>
                    <div class="row">
                        <div class="col s12 m12">
                            <p class="mayuscula-bold">Apartir del: <span id="rptdesde"></span> hasta: <span id="rpthasta"></span></p>
                        </div>
                    </div>
                    <div class="progress" style="display:none;" id="pgr">
                        <div class="indeterminate"></div>
                    </div>
                    <div class="row center">
                        <div class="col s4">
                            <span class="reporte-title-2">TOTAL LLAMADAS: </span>
                            <span id="tltLlamadas" class="reporte-title-2"></span>
                        </div>
                        <div class="col s4">
                            <span class="reporte-title-2">TOTAL MINUTOS: </span>
                            <span id="tltMinutos" class="reporte-title-2"></span>
                        </div>
                        <div class="col s4">
                            <span class="reporte-title-2">TOTAL REAL C$: </span>
                            <span id="tltReal" class="reporte-title-2"></span>
                        </div>
                    </div>
                    <div id="tblRegLllamadas1">
                        <table id="tblRegLllamadas" class="TblData">
                            <thead>
                                <tr>
                                    <th>ID USUARIO</th>
                                    <th>EXTENSION</th>
                                    <th>NOMBRE</th>
                                    <th>FECHA</th>
                                    <th>HORA</th>                    
                                    <th>NUMERO MARCADO</th>                                
                                    <th>DURACION</th>
                                    <th>REAL C$</th>
                                    <th>tt</th>
                                </tr>
                            </thead>
                            <tbody class="center">
                            </tbody>
                        </table>                        
                    </div>
                </div><br><br><br>
                
                <div class="row center">
                    <span class="reporte-title-1">LLAMADAS POR PLANTA</span><br><br>   
                    <div class="row center">
                        <div class="col s4">
                            <span class="reporte-title-2">TOTAL LLAMADAS: </span>
                            <span id="tltLlamadasPlt" class="reporte-title-2"></span>
                        </div>
                        <div class="col s4">
                            <span class="reporte-title-2">TOTAL MINUTOS: </span>
                            <span id="tltMinutosPlt" class="reporte-title-2"></span>
                        </div>
                        <div class="col s4">
                        </div>
                    </div>
                    <div id="tblRegLllamadasPlanta1">
                        <table id="tblRegLllamadasPlanta" class="TblData">
                            <thead>
                                <tr>
                                    <th>EXTENSIÓN</th>
                                    <th>FECHA</th>
                                    <th>HORA</th>
                                    <th>NÚMERO MARCADO</th>                    
                                    <th>DURACIÓN</th>                                
                                    <th>TIPO</th>
                                </tr>
                            </thead>
                            <tbody class="center">
                            </tbody>
                        </table> 
                    </div>
                </div><br><br><br>
            </div>
        </div>        
    </div>
</div>
<!--MODAL: REPORTE TIPIFICACIONES-->
<div id="rptTipificaciones" class="modal">
    <div class="modal-content"><br>
        <div class="row">
            <div class="col s12 m12">
                <div class="noMargen Buscar row column">
                    <div class="col offset-s2 s2 right">
                        <a href="#" onclick="imprimirRpt()" class="modal-trigger"><i class="material-icons" style="color:#0d47a1; font-size: 30px">print</i></a>&nbsp;&nbsp;
                        <a href="#" class="modal-action modal-close"><i class="material-icons" style="color:red; font-size: 30px">clear</i></a>
                    </div>
                </div><br>
                <div class="row center">
                    <span class="reporte-title-1">TIPIFICACIONES POR CAMPAÑA</span><br><br>
                    <div class="row">
                        <div class="col s12 m12">
                            <p class="mayuscula-bold">Apartir del: <span id="rptdesde1"></span> hasta: <span id="rpthasta1"></span></p>
                        </div>
                    </div>
                    <div class="progress" style="display:none;" id="pgr">
                        <div class="indeterminate"></div>
                    </div>
                    <div id="tblTipificaciones1">
                        <table id="tblTipificaciones" class="TblData">
                            <thead>
                                <tr>
                                    <th>TIPIFICACIÓN</th>
                                    <th>CANTIDAD</th>
                                </tr>
                            </thead>
                            <tbody class="center">
                            </tbody>
                        </table>                        
                    </div>
                </div><br><br><br>
            </div>
        </div>        
    </div>
</div>
<!--MODAL: REPORTE DE ARTICULOS-->
<div id="rptArticulos" class="modal">
    <div class="modal-content"><br>
        <div class="row">
            <div class="col s12 m12">
                <div class="noMargen Buscar row column">
                    <div class="col offset-s2 s2 right">
                        <a href="#" onclick="imprimirRpt()" class="modal-trigger"><i class="material-icons" style="color:#0d47a1; font-size: 30px">print</i></a>&nbsp;&nbsp;
                        <a href="#" class="modal-action modal-close"><i class="material-icons" style="color:red; font-size: 30px">clear</i></a>
                    </div>
                </div><br>
                <div class="row center">
                    <span class="reporte-title-1">ARTICULOS POR CAMPAÑA</span><br><br>
                    <div class="row">
                        <div class="col s12 m12">
                            <p class="mayuscula-bold">Apartir del: <span id="rptdesde2"></span> hasta: <span id="rpthasta2"></span></p>
                        </div>
                    </div>
                    <div class="progress" style="display:none;" id="pgr">
                        <div class="indeterminate"></div>
                    </div>
                    <div id="tblArticulos1">
                        <table id="tblArticulos" class="TblData">
                            <thead>
                                <tr>
                                    <th>ARTICULO</th>
                                    <th>DESCRIPCION</th>
                                    <th>CANT. VECES VENDIDO</th>
                                </tr>
                            </thead>
                            <tbody class="center">
                            </tbody>
                        </table>                        
                    </div>
                </div><br><br><br>
            </div>
        </div>        
    </div>
</div>


