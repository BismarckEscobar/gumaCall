<header class="demo-header mdl-layout__header ">
    <div class="row center ColorHeader"><span class=" title">GRUPOS<i class="material-icons right">view_quilt</i></span></div>
</header>
<!--  CONTENIDO PRINCIPAL -->
<main class="mdl-layout__content mdl-color--grey-100">
<div class="contenedor">        
    <div class="noMargen row TextColor center"><div class="col s12 m8 l12 offset-m1">GRUPOS</div></div>    
    <div class="noMargen Buscar row column">
        <div class="col offset-s2 s2 right">
            <a href="#nuevoGrupoModal" id="agregarNuevo" class="BtnBlue waves-effect btn modal-trigger">CREAR</a>
        </div>
    </div>            
    <div class="row" id="monitoreo1">
        <table id="tblGrupos" class="TblData">
            <thead>
                <tr>
                    <th>ID GRUPO</th>
                    <th>NOMBRE</th>
                    <th>RESPONSABLE</th>
                    <th>FECHA CREACIÓN</th>
                    <th>ACCIÓN</th>
                </tr>
            </thead>
            <tbody class="center">
            </tbody>
        </table>
    </div>
</div>
</main>  
<!-- MODAL: NUEVO GRUPO-->
<div id="nuevoGrupoModal" class="modal">
    <div class="modal-content"><br>
        <div class="row center">
            <span id="titulM" class="titulosModales">NUEVO GRUPO</span>
        </div>
        <form id="formNuevoGrupo" action="<?PHP echo base_url('index.php/nuevoGrupo');?>" method="post" name="formNuevoGrupo">
            <div class="row">
                <div class="input-field offset-l1 col s12 m12 l5">
                    <input name="nombreGrupo" id="nombreGrupo" type="text" class="validate mayuscula">
                    <label for="nombreGrupo">Nombre completo</label>
                </div>
                <div class="input-field col s12 m12 l5">
                    <select class="chosen-select browser-default" name="agente" id="agente">
                        <option value="" disabled selected><span>Responsable</span></option>
                        <?php 
                            if ($agentes) {
                                foreach ($agentes as $key) {
                                    echo "
                                        <option value=".$key['IdUser']."><span>".$key['Nombre']." / ".$key['Usuario']."</span></option>
                                        ";
                                }   
                            }
                        ?>
                    </select>
                </div>
            </div>
        </form><br><br>
        <div class="row center">
            <a id="guardarGrupo" class="BtnBlue waves-effect btn modal-trigger">GUARDAR</a>
            <a id="cancelarProceso" class="modal-action modal-close BtnBlue waves-effect btn modal-trigger">CANCELAR</a>
        </div>
    </div>
</div>


<!-- Modal #1 de detalles-->
<div id="modalEdit" class="modal">
    <div class="modal-content">
            <div class="right row noMargen">
                <a href="#!" class=" BtnClose modal-action modal-close noHover">
                    <i class="material-icons">highlight_off</i>
                </a>
            </div>
            <div class="row center">
                <span id="titul" class="Mcolor">EDICION</span>
            </div>
                <div class="row">
                    <div class="col s5 m5 l5">
                        <div class="row center"><p>VENDEDORES NO AGREGADOS</p></div>
                        <div class="row center">
                            <table id="tbl1" class=" TblDatos">
                                <thead>
                                    <tr>
                                        <th>ID USUARIO</th>
                                        <th>RUTA</th>
                                        <th>NOMBRE</th>
                                    </tr>
                                </thead>
                                <tbody class="center">
                                </tbody>
                            </table>
                            <div id="loadTabla1" style="display:none" class="preloader-wrapper big active">
                                <div class="spinner-layer spinner-blue-only">
                                    <div class="circle-clipper left"><div class="circle"></div></div>
                                    <div class="gap-patch"><div class="circle"></div></div>
                                    <div class="circle-clipper right"><div class="circle"></div></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col s2 m2 l2">
                        <br><br><br><br>
                        <div class="row center">
                            <a id="addRight" class="redondo waves-effect waves-light btn"><i class="material-icons center">chevron_right</i></a>
                        </div>
                        <div class="row center">
                            <a id="addLeft" class="redondo waves-effect waves-light btn"><i class="material-icons center">chevron_left</i></a>
                        </div>

                    </div>
                    <div class="col s5 m5 l5">
                        <div class="row center"><p>VENDEDORES AGREGADOS</p></div>
                        <div class="row center">
                            <table id="tbl2" class=" TblDatos">
                                <thead>
                                    <tr>
                                        <th>ID USUARIO</th>
                                        <th>RUTA</th>
                                        <th>NOMBRE</th>
                                    </tr>
                                </thead>
                                <tbody class="center">
                                </tbody>
                            </table>
                            <div id="loadTabla" style="display:none" class="preloader-wrapper big active">
                                <div class="spinner-layer spinner-blue-only">
                                    <div class="circle-clipper left"><div class="circle"></div></div>
                                    <div class="gap-patch"><div class="circle"></div></div>
                                    <div class="circle-clipper right"><div class="circle"></div></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="row center">
                <a id="guardarEdicion" class="redondo waves-effect waves-light btn">GUARDAR</a>
                <div id="loadDetalle2" style="display:none" class="preloader-wrapper big active">
                    <div class="spinner-layer spinner-blue-only">
                        <div class="circle-clipper left"><div class="circle"></div></div>
                        <div class="gap-patch"><div class="circle"></div></div>
                        <div class="circle-clipper right"><div class="circle"></div></div>
                    </div>
                </div>
            </div>
    </div>
</div>
