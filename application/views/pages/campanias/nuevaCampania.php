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
                        <form id="formNuevaCampania" enctype="multipart/form-data" action="<?PHP echo base_url('index.php/guardarClienteCampania');?>" method="post" name="formNuevaCampania">
                            <div class="row">
                                <div class="input-field col s12 m12">
                                  <input id="idUser" type="hidden" value="<?php echo $this->session->userdata('id');?>" class="validate mayuscula">
                                </div>                                
                            </div>
                            <div class="row">
                                <div class="input-field col s12 m12">
                                  <?php echo '<input readonly id="codigoCampania" type="text" name="codigoCampania" class="validate mayuscula" value="'.$ultNoCampania.'">' ?>                                  
                                  <label for="codigoCampania">N° DE CAMPAÑA</label>
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
                            </div><br>
                            <div class="row">
                                <div class="file-field input-field">
                                    <div class="BtnBlue waves-effect btn modal-trigger">
                                        <span>ARCHIVO</span>
                                        <input type="file" id="dataExcel" name="dataExcel">
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" type="text" placeholder="SELECCIONE UN DOCUMENTO EXCEL">
                                    </div>
                                </div>
                            </div><br><br>
                            <div class="row">
                                <div class="col s7">
                                    <div class="card">
                                        <div class="card-content">
                                              <span class="mayuscula-bold">OBSERVACIONES Y MENSAJES</span><br><br>
                                              <textarea id="observacionesCamp" placeholder="OBSERVACIONES" class="text-area"></textarea>
                                              <br><br><textarea id="mensajeCamp" placeholder="MENSAJE" class="text-area"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s5">
                                    <div class="card">
                                        <div class="card-content">
                                            <span class="mayuscula-bold">SElECCIONE LOS AGENTES</span><br><br>
                                            <table id="tblAgentes" class="TblData">
                                                <thead>
                                                    <tr>
                                                        <th style="display:none;">IdUsuario</th>
                                                        <th>SELECCIONAR</th>
                                                        <th style="text-align:left;">AGENTE SAC</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                    if ($agentes) {
                                                        foreach ($agentes as $key) {
                                                            echo '
                                                            <tr>
                                                                <td style="display:none;">'.$key['IdUser'].'</td>
                                                                <td style="width:10px">                                                    
                                                                    <input type="checkbox" class="filled-in" name="chkUser'.$key['IdUser'].'" id="chkUser'.$key['IdUser'].'" value="'.$key['IdUser'].'"/>
                                                                    <label for="chkUser'.$key['IdUser'].'"></label>
                                                                </td>
                                                                <td style="text-align: left;">
                                                                    <span>'.$key['Usuario'].'</span>
                                                                </td>
                                                            </tr>';
                                                        }
                                                    }
                                                ?>                            
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <center><h1 class="mayuscula-bold">AGREGAR ARTICULOS</h1></center>
                                <div class="row center" style="display: flex; align-items: center;">
                                    <div class="col s6" >                                        
                                        <input type="text" id="filtrarArticulo" placeholder=" BUSCAR ARTICULO">
                                    </div>
                                    <div class="col s2">
                                        <select id="select1">                                            
                                            <option value="5">5</option>
                                            <option value="10">10</option>
                                            <option value="20">20</option>
                                            <option value="-1">Todos</option>
                                        </select>                                    
                                    </div>
                                    <div class="col s4" >                                    
                                        <input type="checkbox" class="filled-in" id="selectAll" />
                                        <label for="selectAll">Seleccionar todos</label>                                 
                                    </div>
                                </div>
                                <br>
                                <div class="col s12">
                                    <table id="tblArticulos" class="TblData">
                                        <thead>
                                            <tr>
                                                <th>SELECCIONAR</th>
                                                <th style="text-align:left;">CÓDIGO</th>
                                                <th style="text-align:left;">NOMBRE DEL ARTICULO</th>
                                                <th style="text-align:left;">LABORATORIO</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            if ($catalogoArticulos) {
                                                foreach ($catalogoArticulos as $key) {
                                                    echo '
                                                    <tr>
                                                        <td style="width:10px">                                        
                                                            <input type="checkbox" onchange="seleccionandoChk(this)" class="filled-in" name="chkArt'.$key['ARTICULO'].'" id="chkArt'.$key['ARTICULO'].'" value="'.$key['ARTICULO'].'"/>
                                                            <label for="chkArt'.$key['ARTICULO'].'" class="enabled1"></label>
                                                        </td>
                                                        <td style="text-align: center;">
                                                            <span>'.$key['ARTICULO'].'</span>
                                                        </td>
                                                        <td style="text-align: left;">
                                                            <span>'.$key['DESCRIPCION'].'</span>
                                                        </td>
                                                        <td style="text-align: left;">
                                                            <span>'.$key['LABORATORIO'].'</span>
                                                        </td>
                                                    </tr>';
                                                }
                                            }
                                        ?>                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </form>      
                    </div><br>
                <div class="row center">
                    <a id="guardarCampania" class="BtnBlue waves-effect btn modal-trigger">GUARDAR</a>
                    <a id="cancelarProceso" href="campaniasVA" class="modal-action modal-close BtnCancelar waves-effect btn modal-trigger">CANCELAR</a>
                </div><br>
                </div>
            </div>
        </div>
    </div>
</main>