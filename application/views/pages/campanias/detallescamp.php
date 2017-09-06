
<header class="demo-header mdl-layout__header ">
    <div class="row center ColorHeader"><span class=" title">campaña detalles</span>
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
                        <span class="card-title left">N° 0503 - PROMOCIÓN RAMOS OCTUBRE 2017</span><br><br><br><br>
                        <div class="row">
                            <form class="col s12">
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
                                        <input id="icon_DateEnd" value="C$ 100,00" type="text" class=" center validate">
                                        <label for="icon_DateInit" class="left">META ESTIMADAL</label>
                                    </div>
                                    <div class="input-field col s3">
                                        <input id="icon_DateEnd" value="C$ 3,000" type="text" class="center validate">
                                        <label for="icon_DateInit" class="left">REAL</label>
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
                </tr>
                </thead>
                <tbody class="center">
                <?php
                for($i=0;$i<=5;$i++){
                    echo "<tr>
                    <td><a href='cliente'>00276</a></td>
                    <td>FARMACIA MASSIEL</td>
                    <td>22557545</td>
                    <td>C$ 7,000</td>
                    <td>C$ 3,000</td>
                </tr>";
                }
                ?>

                </tbody>
            </table>
        </div>
    </div>
</main>
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
</div>
</div>