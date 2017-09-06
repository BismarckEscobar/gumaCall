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
                        <form id="formNuevoUsuario" action="<?PHP echo base_url('index.php/agregarUsuario');?>" method="post" name="formNuevoUsuario">
                            <div class="row">
                                <div class="input-field col s12 m12">
                                  <input id="codigoCampania" type="text" class="validate mayuscula">
                                  <label for="codigoCampania"></label>
                                </div>                                
                            </div>
                            <div class="row">
                                <div class="input-field col s12 m12">
                                  <input id="nombreCampania" type="text" class="validate mayuscula">
                                  <label for="nombreCampania">NOMBRE DE LA CAMPAÑA</label>
                                </div>                                
                            </div>
                            <div class="row">
                                <div class="input-field col s4 m4">
                                    <input type="date" name="fechaInicioCampania" id="fechaInicioCampania" class="datepicker">
                                    <label for="fechaInicioCampania">FECHA DE INICIO</label>
                                </div>
                                <div class="input-field col s4 m4">
                                    <input type="date" name="fechaFinalCampania" id="fechaFinalCampania" class="datepicker">
                                    <label for="fechaFinalCampania">FECHA FINAL</label>
                                </div>
                                <div class="input-field col s4 m4">
                                    <input type="text" name="metaEstimada" id="metaEstimada" class="validate mayuscula textos-cifras">
                                    <label for="metaEstimada">META ESTIMADA</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="file-field input-field">
                                    <div class="BtnBlue waves-effect btn modal-trigger">
                                        <span>ARCHIVO</span>
                                    <input type="file">
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                  <textarea id="textarea1" class="materialize-textarea"></textarea>
                                  <label for="textarea1">OBSERVACIONES</label>
                                </div>
                            </div>
                        </form>      
                    </div>
                </div>
                <div class="row">
                    <table id="tblAgentes" class="TblData">
                        <thead>
                            <tr>
                                <th>SELECCIONAR</th>
                                <th style="text-align:left;">NOMBRE AGENTE SAC</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="width:10px"> 
                                    <input type="checkbox" class="filled-in" id="chk1" checked="checked" />
                                    <label for="chk1"></label>
                                </td>
                                <td style="text-align: left;"><span>AGENTE SAC 1</span></td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" class="filled-in" id="chk2" checked="checked" />
                                    <label for="chk2"></label>
                                </td>
                                <td style="text-align: left;"><span>AGENTE SAC 2</span></td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" class="filled-in" id="chk3" checked="checked" />
                                    <label for="chk3"></label>
                                </td>
                                <td style="text-align: left;"><span>AGENTE SAC 3</span></td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" class="filled-in" id="chk4" checked="checked" />
                                    <label for="chk4"></label>
                                </td>
                                <td style="text-align: left;"><span>AGENTE SAC 4</span></td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" class="filled-in" id="chk5" checked="checked" />
                                    <label for="chk5"></label>
                                </td>
                                <td style="text-align: left;"><span>AGENTE SAC 5</span></td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" class="filled-in" id="chk6" checked="checked" />
                                    <label for="chk6"></label>
                                </td>
                                <td style="text-align: left;"><span>AGENTE SAC 6</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="row center">
                    <a id="guardarUsuario" class="BtnBlue waves-effect btn modal-trigger">GUARDAR</a>
                    <a id="cancelarProceso" href="campaniasVA" class="modal-action modal-close BtnCancelar waves-effect btn modal-trigger">CANCELAR</a>
                </div><br><br> 
            </div>
        </div>
    </div>
</main>