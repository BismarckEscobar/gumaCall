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
        <div class="noMargen row TextColor center"><div class="col s12 m8 l12 offset-m1">LISTADO DE CLIENTES</div></div><br>
        <div class="row">
            <div class="col s12">
                <div style="text-align: right;">
                    <a id="aClientInd" href="#modalCargaCliente" class="BtnBlue waves-effect btn modal-trigger">GUARDAR UNO</a>
                    <a id="aClientExcel" href="#modalCargaCliente" class="BtnBlue waves-effect btn modal-trigger">CARGAR EXCEL</a>
                </div>
            </div>
        </div><br>
        <div class="row" id="table-cliente">
            <table id="tblCliente" class="TblData">
                <thead>
                    <tr>
                        <th>CÓDIGO</th>
                        <th>RUC</th>
                        <th>NOMBRE</th>
                        <th>TELEFONO 1</th>
                        <th>TELEFONO 2</th>
                        <th>TELEFONO 3</th>                        
                        <th>DIRECCIÓN</th>
                    </tr>
                </thead>
                <tbody class="center">
                    <?php
                    if ($clientes) {
                        foreach ($clientes as $key) {
                            echo "
                            <tr>
                                <td><span>".$key['ID_Cliente']."</span></td>
                                <td><span>".$key['RUC']."</span></td>
                                <td><span>".$key['Nombre']."</span></td>
                                <td><span>".$key['Telefono1']."</span></td>
                                <td><span>".$key['Telefono2']."</span></td>
                                <td><span>".$key['Telefono3']."</span></td>                                
                                <td><span>".$key['Direccion']."</span></td>
                            </tr>
                            ";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</main>
<!--MODAL: INGRESO NUEVO USUARIO VIA EXCEL-->
<div id="modalCargaCliente" class="modal">
    <div class="modal-content"><br>
        <div class="row center">
            <span class="titulosModales">CARGADOR DE CLIENTE</span>
        </div><br><br>
        <form id="formCargaCliente" enctype="multipart/form-data" action="<?PHP echo base_url('index.php/agregarClientes');?>" method="post" name="formCargaCliente">
            <div class="row">
                <div class="file-field input-field">
                    <div class="BtnBlue waves-effect btn modal-trigger">
                        <span>ARCHIVO</span>
                    <input type="file" id="dataCliente" name="dataCliente">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>
                </div>
            </div>
        </form><br><br><br>
        <div class="row center">
            <a id="guardarClientes" class="BtnBlue waves-effect btn modal-trigger">GUARDAR</a>
            <a id="cancelarProceso" class="modal-action modal-close BtnCancelar waves-effect btn modal-trigger">CANCELAR</a>
        </div>
    </div>
</div>
<!--MODAL: INGRESO NUEVO USUARIO INDIVIDUAL-->
<div id="modalCargaClienteInd" class="modal">
    <div class="modal-content"><br>
        <div class="row center">
            <span class="titulosModales">agregar cliente</span>
        </div>
            <div class="noMargen row">
                <div class="input-field col s12 m12 l6">
                    <input name="codCliente" id="codCliente" type="text" class="validate mayuscula">
                    <label for="codCliente">COD. CLIENTE</label>
                </div>
                <div class="input-field col s12 m12 l6">
                    <input name="rucCliente" id="rucCliente" type="text" class="validate mayuscula">
                    <label for="rucCliente">RUC</label>
                </div>
            </div><br>
            <div class="row">
                <div class="input-field col s12 m6 l12">
                    <input name="nombreCliente" id="nombreCliente" type="text" class="validate">
                    <label for="nombreCliente">NOMBRE COMPLETO</label>
                </div>
            </div>
            <div class="row">                
                <div class="input-field col s12">
                  <textarea id="direccionCliente" placeholder="DIRECCIÓN" class="text-area"></textarea>
                </div>                
            </div>
            <div class="row">
                <div class="input-field col s4 m4">
                    <input name="telf1" id="telf1" type="text" class="validate">
                    <label for="telf1">TELEFONO 1</label>
                </div>
                <div class="input-field col s4 m4">
                    <input name="telf2" id="telf2" type="text" class="validate">
                    <label for="telf2">TELEFONO 2</label>
                </div>
                <div class="input-field col s4 m4">
                    <input name="telf3" id="telf3" type="text" class="validate">
                    <label for="telf3">TELEFONO 3</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s4 m4">
                    <select name="selectRuta" id="selectRuta" class="chosen-select browser-default">
                        <option value="" disabled selected>RUTA</option>
                        <?php 
                        if ($rutas) {
                            foreach ($rutas as $key) {
                                echo '<option value="'.$key['value'].'">'.$key['desc'].'</option> ';
                            }
                        }
                        ?>
                    </select>
                </div>
            </div><br><br><br>
        <div class="row center">
            <a id="guardarUnCl" class="BtnBlue waves-effect btn modal-trigger">GUARDAR</a>
            <a id="cancelarProceso" class="modal-action modal-close BtnCancelar waves-effect btn modal-trigger">CANCELAR</a>
        </div>
    </div>
</div>