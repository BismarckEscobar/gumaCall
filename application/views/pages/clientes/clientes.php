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
        <div class="noMargen row TextColor center"><div class="col s12 m8 l12 offset-m1">LISTADO DE CLIENTES</div></div>
        <div class="noMargen Buscar row column">
            <div id="agregarClientes" class="col offset-s2 s2 right">
                <a href="#modalCargaCliente" class="BtnBlue waves-effect btn modal-trigger">NUEVO CLIENTE</a>
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
<!--MODAL: INGRESO NUEVO USUARIO-->
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