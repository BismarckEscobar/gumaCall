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
    <div class="noMargen row TextColor center"><div class="col s12 m8 l12 offset-m1">GRUPOS DE USUARIOS</div></div>    
    <div class="noMargen Buscar row column">
        <div class="col offset-s2 s2 right">
            <a href="#nuevoGrupoModal" id="agregarNuevo" class="BtnBlue waves-effect btn modal-trigger">nuevo grupo</a>
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
                <?php
                    if ($grupos) {
                        foreach ($grupos as $key) {
                            echo "
                            <tr>
                                <td>".$key['IdGrupo']."</td>
                                <td>".$key['NombreGrupo']."</td>
                                <td>".$key['Usuario']."</td>
                                <td>".date('d-m-Y', strtotime($key["FechaCreada"]))."</td>
                                <td><a onclick='editarGrupo(".$key['IdGrupo'].")' href='#editarGrupoModal' class='btn-floating blue'><i class='small material-icons'>create</i></a></td>
                            </tr>";
                        }
                    }

                ?>
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
        <form id="formNuevoGrupo" action="<?PHP echo base_url('index.php/gestionarGrupo');?>" method="post" name="formNuevoGrupo">
            <input name="idGrupo" id="idGrupo" value="0" type="hidden">
            <div class="row">
                <div class="input-field offset-l1 col s12 m12 l10">
                    <input name="nombreGrupo" id="nombreGrupo" type="text" class="validate mayuscula" placeholder="INGRESE UN NOMBRE">
                    <label for="nombreGrupo">NOMBRE</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field offset-l1 col s12 m12 l10">
                    <select class="chosen-select browser-default" name="agente" id="agente">
                        <option value="" disabled selected><span>SELECCIONAR RESPONSABLE DEL GRUPO</span></option>
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
            <div class="row">
                <div class="input-field offset-l1 col s12 m12 l10">
                    <input type="hidden" id="grupoEstado" name="grupoEstado" value="1" />
                </div>                
            </div>
        </form><br><br>
        <div class="row center">
            <a id="guardarGrupo" class="BtnBlue waves-effect btn modal-trigger">GUARDAR</a>&nbsp;&nbsp;
            <a id="cancelarProceso" class="modal-action modal-close BtnCancelar waves-effect btn modal-trigger">CANCELAR</a>
        </div>
    </div>
</div>
<!-- MODAL: EDITAR GRUPO-->
<div id="editarGrupoModal" class="modal">
    <div class="modal-content"><br>
        <div class="row center">
            <span id="titulM" class="titulosModales">GRUPO: grupo ventas</span>
        </div><br>
        <div class="card">
            <div class="card-content">
                <div class="row center">
                    <span class="title">Editar grupo</span>
                </div>
                <form id="formEditarGrupo" action="<?PHP echo base_url('index.php/gestionarGrupo');?>" method="post" name="formEditarGrupo">
                    <input type="hidden" id="idGrupoBD1" name="idGrupoBD">
                    <div class="row">
                        <div class="input-field col s4 m4">
                            <input name="nombreGrupoBD" id="nombreGrupoBD" type="text" placeholder="INGRESE UN NOMBRE">
                            <label for="nombreGrupoBD">NOMBRE</label>
                        </div>
                        <div class="input-field col s5 m5">
                            <select class="chosen-select browser-default" name="agenteBD" id="agenteBD">
                                <option value="" disabled selected><span>SELECCIONAR RESPONSABLE DEL GRUPO</span></option>
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
                        <div class="input-field col s3 m3 center">
                            <input type="checkbox" id="grupoEstadoBD" name="grupoEstadoBD" value=""/>
                            <label for="grupoEstadoBD">Activo</label>
                        </div>                        
                    </div>
                </form>
                <div class="row right">
                    <a id="editarGrupo" class="BtnBlue waves-effect btn modal-trigger">actualizar</a>
                </div><br><br>
            </div>
        </div><br>
        <div class="row">
            <div class="row center">
                <span class="titulosModales">administrar grupo</span>
            </div>            
            <div class="col s5 m5 l5">                
                <div class="row center">
                    <div><span class="titulos-tablas-sup">VENDEDORES NO AGREGADOS</span></div>
                    <table id="tblVNA" class="TblData">
                        <thead>
                            <tr>
                                <th>UID</th>
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
                <div class="row center">
                    <div><span class="titulos-tablas-sup">VENDEDORES AGREGADOS</span></div>
                    <table id="tblVA" class="TblData">
                        <thead>
                            <tr>
                                <th>UID</th>
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
            <a id="editarGrupo" class="BtnBlue waves-effect btn modal-trigger">GUARDAR</a>&nbsp;&nbsp;
            <a id="cancelarProceso" class="modal-action modal-close BtnCancelar waves-effect btn modal-trigger">CANCELAR</a>
        </div>
    </div>
</div>
