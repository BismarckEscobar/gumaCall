
<header class="demo-header mdl-layout__header ">
    <div class="row center ColorHeader"><span class=" title">N° 0503 - PROMOCIÓN RAMOS OCTUBRE 2017</span>
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
                            <input value="01/08/2017" id="icon_DateInit" type="text" class="center validate">
                            <label for="icon_DateInit" class="left">FECHA DE INICIO</label>
                        </div>
                        <div class="input-field col s3">
                            <input value="15/08/2017" id="icon_DateEnd" type="text" class="center validate">
                            <label for="icon_DateInit" class="left">FECHA FINAL</label>
                        </div>
                        <div class="input-field col s3">
                            <input id="icon_DateEnd" value="C$ 100,00" type="text" class=" right validate">
                            <label for="icon_DateInit" class="left">META ESTIMADAL</label>
                        </div>
                        <div class="input-field col s3">
                            <input id="icon_DateEnd" value="C$ 3,000" type="text" class="right validate">
                            <label for="icon_DateInit class="left"">REAL</label>
                        </div>
                    </div>
                </div>
                <div class="card hoverable" >
                    <div class="card-content">
                        <span class="card-title left">MENSAJE</span><br><br><br>
                        <div class="row" style="text-align: left">
                            <p>
                                Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.

                                Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.

                                Morbi in sem quis dui placerat ornare. Pellentesque odio nisi, euismod in, pharetra a, ultricies in, diam. Sed arcu. Cras consequat.

                                Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card hoverable">
                <div class="card-content">
                        <span class="card-title center">00350 - FARMACIA NUESTRA SEÑORA DE LA LUZ</span><br><br><br>
                    <div class="row">
                        <div class="input-field col s3">
                            <input value="22553689" id="icon_DateInit" type="text" class="center validate">
                            <label for="icon_DateInit" class="left">TELEFONO 1</label>
                        </div>
                        <div class="input-field col s3">
                            <input value="22553689" id="icon_DateEnd" type="text" class="center validate">
                            <label for="icon_DateInit" class="left">TELEFONO 2</label>
                        </div>
                        <div class="input-field col s2">
                            <input id="icon_DateEnd" value="22553689" type="text" class=" right validate">
                            <label for="icon_DateInit" class="left">TELEFONO 3</label>
                        </div>
                        <div class="input-field col s2">
                            <input id="icon_DateEnd" value="C$ 3,000" type="text" class="right validate">
                            <label for="icon_DateInit" class="left"">META</label>
                        </div>
                        <div class="input-field col s2">
                            <input id="icon_DateEnd" value="C$ 3,000" type="text" class="right validate">
                            <label for="icon_DateInit" class="left"">REAL</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card hoverable ">
                <div class="card-content">
                    <div class="row valign-wrapper">
                        <div class="col s6" >
                            <a href="#" id="cModal" class="BtnBlue waves-effect btn modal-trigger">INICIAR</a>
                        </div>
                        <div class="col s6 " >
                               <label class="sKronos center-align">00:00:00:00</label>
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
                                    <th>CANTIDAD</th>
                                </tr>
                                </thead>
                                <tbody class="center">
                                <?php
                                for($i=0;$i<=1;$i++){
                                    echo "<tr>
                                            <td>10118022 </td>
                                            <td>ANASTROSOL 1 MG TAB RECUBIERTA 28/CAJA (NAPROD)</td>
                                            <td>2</td>
                                        </tr>";
                                }
                                ?>

                                </tbody>
                            </table>
                        </div>
                        <div id="tb2">
                            <div class="row">
                                <div class="input-field col s6">
                                    <input class="left" value="DE LA ALCALDIA 1C AL SUR, CHONTALES" id="icon_DateInit" type="text" class="center validate">
                                    <label for="icon_DIR" class="left">DIRECCION</label>
                                </div>

                                <div class="input-field col s6">
                                    <input id="icon_RUC" class="left" value="1262108420000Q" type="text" class=" right validate">
                                    <label for="icon_RUC" class="left">RUC</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s3">
                                    <input value="C$ 2,000" id="icon_DateInit" type="text" class="right validate">
                                    <label for="icon_CREDITO" class="left">CREDITO</label>
                                </div>
                                <div class="input-field col s3">
                                    <input value="C$ 0.00" id="icon_DateEnd" type="text" class="right validate">
                                    <label for="icon_SALDO" class="left">SALDO</label>
                                </div>
                                <div class="input-field col s6">
                                    <input id="icon_DISPONIBLE" value="C$ 2,000" type="text" class=" right validate">
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
<div id="outCall" class="modal">
    <div class="modal-content"><br>
        <div class="row center">
            <span class="titulosModales">RESULTADO DE LLAMADA</span>
        </div>
        <form id="formNuevoUsuario" action="<?PHP echo base_url('index.php/agregarUsuario');?>" method="post" name="formNuevoUsuario">
            <div class="row">
                <div class="row">
                    <div class="input-field offset-l1 col s12 m12 l10 ">
                        <select class="chosen-select browser-default" name="tipoUsuario" id="tipoUsuario">
                            <option value="" disabled selected><span>SELECCIONAR UN RESULTADO</span></option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field offset-l1 col s12 m12 l10 ">
                        <input id="last_name" type="text" class="validate">
                        <label for="last_name">MONTO VENDIDO</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field offset-l1 col s12 m12 l10 ">
                        <textarea id="textarea1" class="materialize-textarea"></textarea>
                        <label for="textarea1">COMENTARIOS</label>
                </div>
            </div>
        </form><br><br><br>
        <div class="row center">
            <a id="guardarUsuario" class="BtnBlue waves-effect btn modal-trigger">OK</a>
            <a id="cancelarProceso" class="modal-action modal-close BtnBlue waves-effect btn modal-trigger">CANCELAR</a>
        </div>
    </div>
</div>
</div>
</div>